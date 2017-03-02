<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class PromotionController extends Controller
{
    public function promotionAction(Request $request){
        $promotions = $this->getDoctrine()->getRepository('AppBundle:Promotion')->findAll();


        return $this->render('@App/Shop/promotions.html.twig',[
            'promotions' => $promotions
        ]);
    }
}
