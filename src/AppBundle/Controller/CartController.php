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
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    /**
     * @ParamConverter("product", class="AppBundle:Product")
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function addAction(Request $request, Product $product)
    {
        $quantity = $request->query->get('quantity', 1);
        if ($quantity < 1) return new Response('Quantitée négative ou de 0', '400');

        $session = $request->getSession();
        $products = $session->get('products', []);
        $found = false;

        $promotion = $product->getPromotion() == null ? null : $product->getPromotion();
        foreach ($products as $key => $value){
            if ($product->getId() === $value['product']->getId()){
                $products[$key]['quantity'] += $quantity;
                $found = true;
            }
        }
        if ($found == false){
            array_push($products, ['product' => $product, 'quantity' => $quantity, 'promotion' => $promotion]);
        }
        $session->set('products', $products);

        return new Response();
    }

    /**
     * @param Request $request
     * @return int|Response
     */
    public function listAction(Request $request)
    {
        $products = $request->getSession()->get('products', []);
        $total = 0;

        if ($request->isXmlHttpRequest()) {
            $count = 0;
            foreach ($products as $product) {
                $count += $product['quantity'];
            }
            return new Response($count);
        }

        foreach ($products as $list){
            /** @var Product $product */
            $product = $list['product'];
            $total += ($product->getPriceHt() * $list['quantity']);
            if ($product->getPromotion() !== null){
                $total -= ($product->getPromotion()->getTaux() / 100) * $total;
            }
            $total = number_format($total, 2);
        }

        return $this->render('AppBundle:Cart:list.html.twig', [
            'products' => $products,
            'total' => $total
        ]);
    }
}