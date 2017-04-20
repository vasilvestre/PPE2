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
        dump($productsPromo2);
        dump($productsPromo1);
        return $this->render('@App/Shop/promotions.html.twig',[
            'productsPromo1' => $productsPromo1,
            'productPromo2' => $productsPromo2
        ]);
    }
}
