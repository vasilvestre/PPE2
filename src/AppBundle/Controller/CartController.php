<?php
/**
 * Created by PhpStorm.
 * User: vsilvestre
 * Date: 18/11/16
 * Time: 17:03
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Order;
use AppBundle\Entity\OrderItems;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    /**
     * @ParamConverter("product", class="AppBundle:Product")
     * @param Product $product
     * @return Response
     */
    public function addAction(Product $product)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
//        Vérification de la présence d'une commande, sinon création
        if (empty($user->getOrders()->toArray())) {
            $lastOrder = new Order();
            $em->persist($lastOrder);
        } else {
            $orders = $user->getOrders()->toArray();
            $lastOrder = end($orders);
        }

        $firstEntry = 1;
//                Si un produit est dans la commande, on augmente la quantité uniquement
        if (!$this->getDoctrine()->getRepository('AppBundle:OrderItems')->find($product) == null) {
            $firstEntry = 0;
            $orderItem = $this->getDoctrine()->getRepository('AppBundle:OrderItems')->find($product);
            $orderItem->upQuantity();
            $orderItem->setPrice($product->getPriceHt());
        } else {
            $orderItem = new OrderItems();
            $orderItem->setProduct($product);
            $orderItem->setQuantity(1);
            $orderItem->setPrice($product->getPriceHt());
        }

        var_dump($orderItem);

        if ($firstEntry == 1) {
            $lastOrder->addFirstOrderItems($orderItem);
            $lastOrder->setDateCreation(new \DateTime('now'));
        } else {
            $lastOrder->addOrderItems($orderItem);
        }

//        On affecte à l'utilisateur la commande
        $user->addOrder($lastOrder);

        $em->persist($lastOrder);
        $em->persist($user);
//        On flush le persist du $lastOrder, étant définit en Persist:cascase dans l'entité, l'objet aussi
        $em->flush();

        return new Response('Saved new order with id ' . $lastOrder->getId());

    }
}