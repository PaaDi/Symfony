<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Projet;
use App\Repository\ClientRepository;
use App\Repository\ProjetRepository;
use http\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    public function toEnCoursProjets(ProjetRepository $projetRepository)
    {
        return $this->render('gestion_devis/projets/enCours.html.twig', [
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients"),
            'projets' => $projetRepository->findBy([], null, 30),
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
        //si le formulaire est renseigné
        $request = Request::createFromGlobals();
        if (count($request->request->all()) > 0)
        {
//            print_r($request->request->all()); die;
            $projet = new Projet();
            $projet->setNom($request->request->get('project_name'));
            $projet->setNotes("");
            $projet->setEstArchive(false);
            $projet->setDatecreation(\DateTime::createFromFormat("Y-m-d", $request->request->get('project_creation_date')));
            $projet->setIdclient($request->request->get('idClient'));

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($projet);
            $entityManager->flush();

//            return $this->redirectToRoute(''); @todo pointer vers la fiche du projet qui vient d'être creer
        }

        return $this->render('gestion_devis/projets/creerNouveau.html.twig', [
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
        //si le formulaire est renseigné
        $request = Request::createFromGlobals();
        if (count($request->request->all()) > 0)
        {
//            print_r($request->request->all()); die;
            $client = new \App\Entity\Client();
            $client->setNom($request->request->get('nom_client'));
            $client->setDescription($request->request->get('description_client'));
            $client->setEstprofessionnel(false);
            if ($request->request->get('est_pro_client') == "on")
            {
                $client->setEstprofessionnel(true);
            }
            $client->setSecteuractivite($request->request->get('secteur_activite_client'));
            $client->setAdresse(
                $request->request->get('num_adress') . " " .
                $request->request->get('voie_adress') . "\n" .
                $request->request->get('complement_adress')
            );
            $client->setCodepostal($request->request->get('cp_adress'));
            $client->setVille($request->request->get('ville_adress'));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();


            $contact = new Contact();
            $contact->setIdclient($client->getIdclient());
            $contact->setNom($request->request->get('nom_contact'));
            $contact->setPrenom($request->request->get('prenom_contact'));
            $contact->setFonction($request->request->get('fonction_contact'));
            $contact->setMail($request->request->get('email_contact'));
            $contact->setTelephone($request->request->get('tel_contact'));


            $entityManager->persist($contact);
            $entityManager->flush();

//            return $this->redirectToRoute(''); @todo pointer vers la fiche du client qui vient d'être creer
        }

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

    /* -- AJAX -- */


    /**
     * @Route("/gestiondevis/clients/ajax/search", name="ajax_search_clients")
     */

    public function search_clients(ClientRepository $clientRepository)
    {
        $request = Request::createFromGlobals();

//        print_r($request->query->get('search'));
//        print_r($clientRepository->findBy(['nom' => $request->query->get('search')], null, 5)); die;

        return $this->render('gestion_devis/clients/search_client_ajax.html.twig', [
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients"),
            'clients' => $clientRepository->findBySearch($request->query->get('search'))
        ]);

    }


}

