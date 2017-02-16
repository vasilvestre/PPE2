<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class ShopController extends Controller
{
    public function shopAction(Request $request)
    {
        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();

        return $this->render('@App/Shop/index.html.twig', [
            'products' => $products
        ]);
    }
}
