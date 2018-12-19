<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;

class ProductsController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     * @param SessionInterface $session
     * @return Response
     */
    public function index(SessionInterface $session)
    {
        $repo = $this->getDoctrine()->getRepository(Product::class);
        $products = $repo->findAll();
        $session->set(rand(), 'bar');

        return $this->render('products/index.html.twig', [
            'products' => $products
        ]);
    }
}
