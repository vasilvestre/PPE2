<?php
/**
 * Created by PhpStorm.
 * User: vsilvestre
 * Date: 18/11/16
 * Time: 17:03
 */

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Entity\Order;
use AppBundle\Entity\OrderItems;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Product;
use Symfony\Component\BrowserKit\Request;
use AppBundle\Entity\User;

class CartController extends Controller
{
    /**
     * @param $product
     * @internal param $id
     */
    public function addAction($product){
        $user = $this->getUser();
        if($user->getOrders() == null){
            $order = new Order();
            $orderItems = new OrderItems();
        }else{
            $order = $user->getOrders();
        }
        $orderItems = new OrderItems();
        $orderItems->setProduct($product);
        $order->addOrderItems($orderItems);
        $em = $this->getDoctrine()->getEntityManager();
        $em->flush();

        return ;
    }
}