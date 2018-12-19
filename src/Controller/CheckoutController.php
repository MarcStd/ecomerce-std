<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    /**
     * @Route("/checkout", name="checkout")
     * @param CartService $cartService
     * @return Response
     */
    public function index(CartService $cartService)
    {

        $res = $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);

        $cartService->addToCart();

        $response= $cartService->getCardResponse();
        $response = $response->setContent($res->getContent());
        return $response;
    }
}
