<?php

namespace App\Controller;

use App\Entity\Login;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class APIbaseController extends AbstractController
{
    /**
     * @Route("/API/base/addUser", name="api_base/addUser")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new Login();

        $user->setNom("Admin");
        $user->setPrenom("");
        $user->setEmail("");
        $user->setUsername("admin");
        $user->setPassword("");
        $user->setIdrole(1);

        $entityManager->persist($user);

        $entityManager->flush();
        return $this->render('api_base/index.html.twig', [
            'controller_name' => 'APIbaseController',
        ]);
    }
}
