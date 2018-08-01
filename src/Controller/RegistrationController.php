<?php

// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        //Build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        //Handle the submit (POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            //Encode password
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setName('henkie');                  
            
            //Save user in the database;
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            //Todo: mail sent

            return $this->redirectToRoute('home');
        }
        return $this->render('registration/register.html.twig', array('form' => $form->createView()));
    }
}
