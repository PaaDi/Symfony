<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class GestionDevisController extends AbstractController
{
    /**
     * @Route("/gestiondevis", name="gestion_devis")
     */
    public function index()
    {
        return $this->render('gestion_devis/dashboard.html.twig', [
            'headerRechercheOptions' => array("Tout", "Projets", "Chantiers", "Devis", "Clients"),
            'tachesRapides' => array('Appeler someCompagny, urgent!'
            , 'Erreur dans le devis #454'
            , 'Virer Paul, quel relou'
            , 'MAJ coordonnées Mr. Brabantia')
        ]);
    }


    /**
     * @Route("/gestiondevis/projets/enCours/", name="enCours")
     */

    public function toEnCoursProjets()
    {
        return $this->render('gestion_devis/projets/enCours.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }

    /**
     * @Route("/gestiondevis/projets/archives/", name="archives")
     */

    public function toArchivesProjets()
    {
        return $this->render('gestion_devis/projets/archives.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }

    /**
     * @Route("/gestiondevis/projets/creerNouveau/", name="creerNouveau")
     */

    public function toCreerNouveauProjets()
    {
        return $this->render('gestion_devis/projets/creerNouveau.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }


    /**
     * @Route("/gestiondevis/chantiers/enCoursUsername/", name="enCoursUsername")
     */

    public function toEnCoursUsername()
    {
        return $this->render('gestion_devis/chantiers/enCoursUsername.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }

    /**
     * @Route("/gestiondevis/chantiers/enCoursTous/", name="enCoursTous")
     */

    public function toEnCoursTous()
    {
        return $this->render('gestion_devis/chantiers/enCoursTous.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }

    /**
     * @Route("/gestiondevis/chantiers/archives/", name="archivesChantiers")
     */

    public function toArchivesChantiers()
    {
        return $this->render('gestion_devis/chantiers/archivesChantiers.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }

    /**
     * @Route("/gestiondevis/chantiers/creerNouveau/", name="creerNouveauChantier")
     */

    public function toCreerNouveauChantier()
    {
        return $this->render('gestion_devis/chantiers/creerNouveauChantier.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }

}

