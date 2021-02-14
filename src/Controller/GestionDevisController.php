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

    public function toCreerNouveau()
    {
        return $this->render('gestion_devis/projets/creerNouveau.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }

    /**
     * @Route("/gestiondevis/projets/enCours/visualiserProjet/", name="visualiserProjet")
     */

    public function toVisualiserProjet()
    {
        return $this->render('gestion_devis/projets/visualiserProjet.html.twig', [
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

    /**
     * @Route("/gestiondevis/devis/creerNouveau/", name="creerNouveauDevis")
     */

    public function toCreerNouveauDevis()
    {
        return $this->render('gestion_devis/devis/creerNouveauDevis.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }

    /**
     * @Route("/gestiondevis/devis/devisArchives/", name="devisArchives")
     */

    public function toDevisArchives()
    {
        return $this->render('gestion_devis/devis/devisArchives.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);
    }


    /**
     * @Route("/gestiondevis/devis/devisEnAttente/", name="devisEnAttente")
     */

    public function toDevisEnAttente()
    {
        return $this->render('gestion_devis/devis/devisEnAttente.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);

    }

    /**
     * @Route("/gestiondevis/clients/afficherContacts/", name="afficherContacts")
     */

    public function toAfficherContact()
    {
        return $this->render('gestion_devis/clients/afficherContacts.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);

    }

    /**
     * @Route("/gestiondevis/clients/afficherEntreprises/", name="afficherEntreprises")
     */

    public function toAfficherEntreprises()
    {
        return $this->render('gestion_devis/clients/afficherEntreprises.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);

    }

    /**
     * @Route("/gestiondevis/clients/creerNouveauContact/", name="creerNouveauContact")
     */

    public function toCreerNouveauContact()
    {
        return $this->render('gestion_devis/clients/creerNouveauContact.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);

    }

    /**
     * @Route("/gestiondevis/clients/creerNouvelleEntreprise/", name="creerNouvelleEntreprise")
     */

    public function toCreerNouvelleEntreprise()
    {
        return $this->render('gestion_devis/clients/creerNouvelleEntreprise.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);

    }

    /**
     * @Route("/gestiondevis/outils/notesRapides/", name="notesRapides")
     */

    public function toNotesRapides()
    {
        return $this->render('gestion_devis/outils/notesRapides.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);

    }

    /**
     * @Route("/gestiondevis/outils/prixModules/", name="prixModules")
     */

    public function toPrixModules()
    {
        return $this->render('gestion_devis/outils/prixModules.html.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);

    }


}

