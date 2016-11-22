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
    public function addAction(Product $product){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if($user->getOrders() == null){
            $lastOrder = new Order();
            $em->persist($lastOrder);
        }else{
            $orders = $user->getOrders();
            $lastOrder = end($orders);
        }
//        check if order items exist for existent product
        $orderItems = new OrderItems();
        $orderItems->setProduct($product);
        $lastOrder->addOrderItems($orderItems);
        $lastOrder->setDateCreation(new \DateTime('now'));
        $em->flush();

        return new Response('Saved new order with id '.$lastOrder->getId()) ;
    }
}