<?php

namespace AppBundle\Controller;


use AppBundle\Filter\ProductFilterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findBy([], [], 8);
        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:index.html.twig', [
            'products' => $products
        ]);
    }

    public function shopAction(Request $request)
    {
        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();

        return $this->render('@App/Shop/index.html.twig', [
            'products' => $products
        ]);
    }

    public function promotionAction(Request $request){
        $promotions = $this->getDoctrine()->getRepository('AppBundle:Promotion')->findAll();


        return $this->render('@App/Shop/promotions.html.twig',[
            'promotions' => $promotions
        ]);
    }
}
