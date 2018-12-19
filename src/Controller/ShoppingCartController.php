<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShoppingCartController extends AbstractController
{
    /**
     * @Route("/cart/add", name="shopping_cart_add")
     */
    public function addToCart()
    {

        return $this->redirect($this->generateUrl('products'));
    }
}
