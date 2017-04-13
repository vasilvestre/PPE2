<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class ShopController extends Controller
{
    public function shopAction(Request $request)
    {
        $category = $request->query->get('category');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Product');

        if (null !== $category){
            $products = $repository->findByCategorie(['name' => $category]);
        }else{
            $products = $repository->findAll();
        }

        return $this->render('@App/Shop/index.html.twig', [
            'products' => $products
        ]);
    }
}
