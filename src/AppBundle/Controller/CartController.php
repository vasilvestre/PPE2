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

//        Création d'un objet de commande vide
        $orderItem = null;
//        Obtention des objets dans la commande
        $orderItems = $lastOrder->getOrderItems()->toArray();
//        S'il n'existe pas encore de produit, on en crée un
        if (!empty($orderItems)) {
            //            On parcourt les objets
            foreach ($orderItems as $orderItem) {
//                Si un objet existe, on en rajoute un
                if ($orderItem == $product) {
                    $orderItem = $this->getDoctrine()->getRepository('AppBundle:OrderItems')->find($product);
                    $orderItem->setQuantity(1 + $orderItem->getQuantity());
                    $orderItem->setPrice($product->getPriceHt());
                } else {
//                    Sinon, on le crée
                    $orderItem = new OrderItems();
                    $orderItem->addProduct($product);
                    $orderItem->setQuantity(1);
                    $orderItem->setPrice($product->getPriceHt());
                }
            }

        } elseif ($orderItem == null) {
            $orderItem = new OrderItems();
            $orderItem->addProduct($product);
            $orderItem->setQuantity(1);
            $orderItem->setPrice($product->getPriceHt());
        } else {
            var_dump('IDIOT');
            die;
        }
//        On ajoute l'objet a la commande et on définit sa date de création
        $lastOrder->addOrderItems($orderItem);
        $lastOrder->setDateCreation(new \DateTime('now'));

//        On affecte à l'utilisateur la commande
        $user->addOrder($lastOrder);

        $em->persist($lastOrder);
        $em->persist($user);
//        On flush le persist du $lastOrder, étant définit en Persist:cascase dans l'entité, l'objet aussi
        $em->flush();

        return new Response('Saved new order with id ' . $lastOrder->getId());
    }
}