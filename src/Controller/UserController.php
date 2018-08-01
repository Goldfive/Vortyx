<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Flex\Response;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return new Response('boe', 200);
       /* return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);*/
    }
}
