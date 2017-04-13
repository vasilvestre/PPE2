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

        $key = array_search($product, array_column($products, 'product'));
        $key === false
            ? array_push($products, ['product' => $product, 'quantity' => $quantity])
            : $products[$key]['quantity'] += $quantity;

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

        if ($request->isXmlHttpRequest()) {
            $count = 0;
            foreach ($products as $product) {
                $count += $product['quantity'];
            }
            return new Response($count);
        }
        return $this->render('AppBundle:Cart:list.html.twig');
    }
}