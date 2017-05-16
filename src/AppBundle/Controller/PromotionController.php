<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class PromotionController extends Controller
{
    public function promotionAction(Request $request){
        $products = [];
        $productsPromo1 = $this->getDoctrine()->getRepository('AppBundle:Product')->findByPromotion('1');
        $productsPromo2 = $this->getDoctrine()->getRepository('AppBundle:Product')->findByPromotion('2');

        foreach ($productsPromo1 as $product){
            array_push($products, $product);
        }

        foreach ($productsPromo2 as $product){
            array_push($products, $product);
        }
        return $this->render('@App/Shop/index.html.twig',[
            'products' => $products,
        ]);
    }
}
