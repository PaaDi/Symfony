<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModalitesPaiementController extends AbstractController
{
    /**
     * @Route("/modalites/paiement", name="modalites_paiement")
     */
    public function index(): Response
    {
        return $this->render('modalites_paiement/index.html.twig', [
            'controller_name' => 'ModalitesPaiementController',
        ]);
    }
}
