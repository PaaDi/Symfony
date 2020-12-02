<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class GestionDevisController extends AbstractController
{
    /**
     * @Route("/gestiondevis/", name="gestion_devis")
     */
    public function index()
    {
        return $this->render('gestion_devis/dashboard.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("Tout", "Projets", "Chantiers", "Devis", "Clients"),
            'tachesRapides' => array('Appeler someCompagny, urgent!'
            , 'Erreur dans le devis #454'
            , 'Virer Paul, quel relou'
            , 'MAJ coordonnées Mr. Brabantia')
        ]);
    }


    /**
     * @Route("/testRoute/", name="projet_encours")
     */

    public function select_page()
    {
        return $this->render('gestion_devis/projet_encours.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés","Clients")
        ]);
    }

}




