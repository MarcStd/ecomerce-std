<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 19.12.2018
 * Time: 22:27
 */

namespace App\Service;


use App\Entity\Product;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class CartService
{

    /** @var Response */
    private $response;

    private $cookieName = 'card_id';

    private $doctrine;

    public function __construct(ManagerRegistry $doctrine, RequestStack $request)
    {
        $this->doctrine = $doctrine;
        $this->response = new Response();
        if (!$request->getCurrentRequest()->cookies->has($this->cookieName)){
            $c = new Cookie($this->cookieName, rand());
            $this->response->headers->setCookie($c);
        }
    }

    function addToCart(){
        $repo = $this->doctrine->getRepository(Product::class);
        return $repo->findAll();
    }

    function getCardResponse(){
        return $this->response;
    }
}