<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class PromotionController extends Controller
{
    public function promotionAction(Request $request){
        $promotions = $this->getDoctrine()->getRepository('AppBundle:Promotion')->findall();
        $productsPromo1 = $this->getDoctrine()->getRepository('AppBundle:Product')->findByPromotion('1');
        $productsPromo2= $this->getDoctrine()->getRepository('AppBundle:Product')->findByPromotion('2');

        $products = [];
        array_push($products, $productsPromo2);
        array_push($products, $productsPromo1);
        return $this->render('@App/Shop/index.html.twig',[
            'products' => $products[0],
        ]);
    }
}
