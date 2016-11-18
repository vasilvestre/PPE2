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
        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function shopAction(Request $request)
    {
        $form = $this->get('form.factory')->create(ProductFilterType::class);

        if ($request->query->has($form->getName())) {
            $form->submit($request->query->get($form->getName()));

            $filterBuilder = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Product')
                ->createQueryBuilder('e');

            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);

            var_dump($filterBuilder->getDQL());
        }

        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();

        return $this->render('@App/Shop/index.html.twig', [
            'form' => $form->createView(),
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
