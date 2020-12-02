<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationModuleController extends AbstractController
{
    /**
     * @Route("/creation/module", name="creation_module")
     */
    public function index(): Response
    {
        return $this->render('creation_module/index.html.twig', [
            'controller_name' => 'CreationModuleController',
        ]);
    }
}
