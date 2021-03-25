<?php

namespace App\Controller;

use App\Entity\Chantier;
use App\Entity\Contact;
use App\Entity\Devis;
use App\Entity\Modulesdansplan;
use App\Entity\Projet;
use App\Repository\ChantierRepository;
use App\Repository\ClientRepository;
use App\Repository\ContactRepository;
use App\Repository\DevisRepository;
use App\Repository\GammeRepository;
use App\Repository\LoginRepository;
use App\Repository\ModuledansplanRepository;
use App\Repository\ModuleRepository;
use App\Repository\PlanRepository;
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
            $projet->setRefProjet(rand(0,99999999)); // création

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
     * @Route("/gestiondevis/projets/enCours/visualiserProjet/{id}", name="visualiserProjet")
     */

    public function toVisualiserProjet(int $id,
                                       ProjetRepository $projetRepository,
                                       ClientRepository $clientRepository,
                                       ChantierRepository $chantierRepository)
    {
        $projet = $projetRepository->find($id);
        return $this->render('gestion_devis/projets/visualiserProjet.html.twig', [
            'projet' => $projet,
            'client' => $clientRepository->find($projet->getIdclient()),
            'chantiers' => $chantierRepository->findBy(['idprojet' => $id]),
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients"),
            'id_page' => 'projet',
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
     * @Route("/gestiondevis/chantiers/creerNouveau/{idprojet}", name="creerNouveauChantier")
     */

    public function toCreerNouveauChantier(int $idprojet,
                                           ProjetRepository $projetRepository,
                                           ClientRepository $clientRepository,
                                           LoginRepository $loginRepository)
    {
        $projet = $projetRepository->find($idprojet);

        //si le formulaire est renseigné
        $request = Request::createFromGlobals();
        if (count($request->request->all()) > 0)
        {
//            print_r($request->request->all()); die;
            $chantier = new Chantier();
            $chantier->setNom($request->request->get('chantier_name'));
            $chantier->setIdprojet($idprojet);
            $chantier->setRefChantier(rand(0,99999999));
            $chantier->setIduser($loginRepository->findOneBy(['username' => $this->getUser()->getUsername()])->getIduser() );
            $chantier->setNotes($request->request->get('note'));
            $chantier->setAdresse($request->request->get('adresse'));
            $chantier->setVille($request->request->get('Ville'));
            $chantier->setCodepostal($request->request->get('code_postal'));
            $chantier->setDateCreation(\DateTime::createFromFormat("Y-m-d", $request->request->get('project_creation_date')));
            $chantier->setDateLancement(\DateTime::createFromFormat("Y-m-d", $request->request->get('chantier_lancement_date')));

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($chantier);
            $entityManager->flush();

//            return $this->redirectToRoute(''); @todo pointer vers la fiche du projet qui vient d'être creer
        }

        return $this->render('gestion_devis/chantiers/creerNouveauChantier.html.twig', [
            'projet' => $projet,
            'client' => $clientRepository->find($projet->getIdclient()),
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
     * @Route("/gestiondevis/clients/afficherContacts/", name="afficherListeClients")
     */

    public function toAfficherListeClients(ClientRepository $clientRepository)
    {
        return $this->render('gestion_devis/clients/listeClients.html.twig', [
            'clients' => $clientRepository->findAll(),
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);

    }

    /**
     * @Route("/gestiondevis/clients/afficherClient/{id}", name="afficherClient")
     */

    public function toAfficherClient(int $id,
                                     ClientRepository $clientRepository,
                                     ContactRepository $contactRepository,
                                     ProjetRepository $projetRepository)
    {
        $client = $clientRepository->find($id);

        //si le formulaire d'ajout de contact est renseigné
        $request = Request::createFromGlobals();
        if (count($request->request->all()) > 0)
        {
//            print_r($request->request->all()); die;
            $contact = new Contact();
            $contact->setIdclient($client->getIdclient());
            $contact->setNom($request->request->get('Nom'));
            $contact->setPrenom($request->request->get('Prenom'));
            $contact->setFonction($request->request->get('Fonction'));
            $contact->setMail($request->request->get('E-mail'));
            $contact->setTelephone($request->request->get('Telephone'));
            $contact->setRefContact(rand(0,99999999));


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
        }


        return $this->render('gestion_devis/clients/afficherClient.html.twig', [
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients"),
            'client' => $client,
            'contacts' => $contactRepository->findBy(['idclient' => $id]),
            'projets' => $projetRepository->findBy(['idclient' => $id]),
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
            $client->setRefClient(rand(0,99999999));

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
            $contact->setRefContact(rand(0,99999999));


            $entityManager->persist($contact);
            $entityManager->flush();

//            return $this->redirectToRoute(''); @todo pointer vers la fiche du client qui vient d'être creer
        }

        return $this->render('gestion_devis/clients/creerNouveauContact.html.twig', [
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients")
        ]);

    }

    /**
     * @Route("/gestiondevis/plan/afficher/{idChantier}", name="afficherPlan")
     */

    public function afficherPlan(int $idChantier,
                                 PlanRepository $planRepository,
                                 ChantierRepository $chantierRepository,
                                 ModuleRepository $moduleRepository,
                                 ModuledansplanRepository $moduledansplanRepository,
                                 GammeRepository $gammeRepository,
                                 DevisRepository $devisRepository)
    {
        $plan = $planRepository->findOneBy(['idchantier' => $idChantier]);
        $modules = array();
        foreach ($moduledansplanRepository->findBy(['idplan' => $plan->getIdplan()]) as $moduledansplan) {
            array_push($modules, [
                'Module' => $moduleRepository->find($moduledansplan->getIdmodule()),
                'ModuleDansPlan' => $moduledansplan,
            ]);
        }

        return $this->render('gestion_devis/chantiers/afficherPlan.html.twig', [
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients"),
            'Plan'=> $plan,
            'Chantier'=> $chantierRepository->find($idChantier),
            'Modules'=> $modules,
            'Gammes'=> $gammeRepository->findAll(),
            'Devis'=> $devisRepository->findBy(['idchantier' => $idChantier]),
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
            'clients' => $clientRepository->findBySearch($request->query->get('search'))
        ]);

    }

    /**
     * @Route("/gestiondevis/modules/ajax/search", name="ajax_search_modules")
     */

    public function search_modules(ModuleRepository $moduleRepository)
    {
        $request = Request::createFromGlobals();

//        print_r($request->query->get('search'));
//        print_r($clientRepository->findBy(['nom' => $request->query->get('search')], null, 5)); die;

        return $this->render('gestion_devis/chantiers/search_modules_ajax.html.twig', [
            'modules' => $moduleRepository->findBySearch($request->query->get('search'))
        ]);

    }

    /* -- OPERATIONS DU PLAN -- */

    /**
     * @Route("/gestiondevis/plan/addmodule/", name="plan_add_module")
     */

    public function plan_add_module(ModuleRepository $moduleRepository)
    {
        $request = Request::createFromGlobals();

//        print_r($request->query->all());die;
        $module = $moduleRepository->find($request->query->get('idmodule'));

        $moduledansplan = new Modulesdansplan();
        $moduledansplan->setIdplan($request->query->get('idplan'));
        $moduledansplan->setIdmodule($request->query->get('idmodule'));
        $moduledansplan->setNomDansPlan($module->getNom());
        $moduledansplan->setNotes("");
        $moduledansplan->setVisibleDansPlan(true);
        $moduledansplan->setPosDebX(0);
        $moduledansplan->setPosDebY(0);
        $moduledansplan->setPosFinX(0);
        $moduledansplan->setPosFinY(0);
        $moduledansplan->setRotation(0);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($moduledansplan);
        $entityManager->flush();

        return $this->redirectToRoute('afficherPlan', ['idChantier' => $request->query->get('idchantier')]);

    }

    /**
     * @Route("/gestiondevis/plan/saveChantier/", name="plan_save_chantier")
     */

    public function plan_save_chantier(ChantierRepository $chantierRepository)
    {
        $request = Request::createFromGlobals();

//        print_r($request->request->all());die;
        $chantier = $chantierRepository->find($request->request->get('idchantier'));

        $chantier->setNom($request->request->get('nom_chantier'));
        $chantier->setNotes($request->request->get('note'));
        $chantier->setAdresse($request->request->get('adresse'));
        $chantier->setVille($request->request->get('ville'));
        $chantier->setCodepostal($request->request->get('code_postal'));
        $chantier->setDateLancement(\DateTime::createFromFormat("Y-m-d", $request->request->get('date_lancement')));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($chantier);
        $entityManager->flush();

        return $this->redirectToRoute('afficherPlan', ['idChantier' => $request->request->get('idchantier')]);

    }

    /**
     * @Route("/gestiondevis/plan/savePlan/", name="plan_save_plan")
     */

    public function plan_save_plan(PlanRepository $planRepository)
    {
        $request = Request::createFromGlobals();

//        print_r($request->request->all());die;
        $plan = $planRepository->find($request->request->get('idplan'));

        $plan->setTaillex($request->request->get('tailleX'));
        $plan->setTailley($request->request->get('tailleY'));
        $plan->setNbetage($request->request->get('nbre_etage'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($plan);
        $entityManager->flush();

        return $this->redirectToRoute('afficherPlan', ['idChantier' => $request->request->get('idchantier')]);

    }

    /**
     * @Route("/gestiondevis/plan/saveModule/", name="plan_save_module")
     */

    public function plan_save_module(ModuledansplanRepository $moduledansplanRepository)
    {
        $request = Request::createFromGlobals();

//        print_r($request->request->all());die;
        $module = $moduledansplanRepository->find($request->request->get('idmoduledansplan'));

        $module->setNomDansPlan($request->request->get('nom_affiche'));
        $module->setPosDebX($request->request->get('position_departX'));
        $module->setPosDebY($request->request->get('position_departY'));
        $module->setPosFinX($request->request->get('position_finX'));
        $module->setPosFinY($request->request->get('position_finY'));
        $module->setNotes($request->request->get('notes_unite'));
        $module->setVisibleDansPlan(($request->request->get('visible_plan_unite') == "on"));

        $entityManager = $this->getDoctrine()->getManager();
        if ($request->request->get('delete_options_module_unite') == "Supprimer")
        {
            $entityManager->remove($module);
        }
        else
        {
            $entityManager->persist($module);
        }
        $entityManager->flush();

        return $this->redirectToRoute('afficherPlan', ['idChantier' => $request->request->get('idchantier')]);

    }

    /**
     * @Route("/gestiondevis/plan/saveModuleUnite/", name="plan_save_module_unite")
     */

    public function plan_save_module_unite(ModuledansplanRepository $moduledansplanRepository)
    {
        $request = Request::createFromGlobals();

//        print_r($request->request->all());die;
        $module = $moduledansplanRepository->find($request->request->get('idmoduledansplan'));

        $module->setNomDansPlan($request->request->get('nom_affiche_unite'));
        $module->setPosDebX($request->request->get('positionXmodule'));
        $module->setPosDebY($request->request->get('positionYmodule'));
        $module->setRotation($request->request->get('rotation'));
        $module->setNotes($request->request->get('notes'));
        $module->setVisibleDansPlan(($request->request->get('visible_plan') == "on"));

        $entityManager = $this->getDoctrine()->getManager();
        if ($request->request->get('delete_options_module') == "Supprimer")
        {
            $entityManager->remove($module);
        }
        else
        {
            $entityManager->persist($module);
        }
        $entityManager->flush();

        return $this->redirectToRoute('afficherPlan', ['idChantier' => $request->request->get('idchantier')]);

    }

    /**
     * @Route("/gestiondevis/plan/creerDevis/{idchantier}", name="plan_creer_devis")
     */

    public function plan_creer_devis(int $idchantier)
    {
        $request = Request::createFromGlobals();

//        print_r($request->request->all());die;

        $devis = new Devis();
        $devis->setIdchantier($idchantier);
        $devis->setNom($request->request->get('nom_devis'));
        $devis->setIdGamme(intval($request->request->get('gammes_devis')));
        $devis->setDatecreation(\DateTime::createFromFormat("Y-m-d", $request->request->get('date_creation_devis')));
        $devis->setTauxTva(20);
        
        $devis->setDocument("");
        $devis->setNotes("");
        $devis->setEtat("");
        $devis->setMlineaire(0);
        $devis->setPrixht(0);
        $devis->setRemise(0);

        $devis->setEstpaye(false);
        $devis->setRefDevis(rand(0,99999999));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($devis);
        $entityManager->flush();

        return $this->redirectToRoute('afficherPlan', ['idChantier' => $idchantier]);

    }


    /* -- DEVIS -- */

    /**
     * @Route("/gestiondevis/devis/afficher/{iddevis}", name="afficher_devis")
     */
    public function afficher_devis()
    {
        return $this->render('gestion_devis/devis/afficherDevis.twig', [
            'controller_name' => 'GestionDevisController',
            'headerRechercheOptions' => array("En cours", "Archivés", "Clients"),
            'id_page' => 'devis'
        ]);
    }

}