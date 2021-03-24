<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Contact;
use App\Entity\Login;
use App\Entity\Projet;
use App\Repository\ChantierRepository;
use App\Repository\ClientRepository;
use App\Repository\ContactRepository;
use App\Repository\LoginRepository;
use App\Repository\ProjetRepository;
use App\Service\APIgestionDevisService;
use App\Service\baseService;
use App\Service\LoginService;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//Pour l'API
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class APIgestionDevisController extends AbstractController
{

    /**
     * VUE D'UN PETIT FORMULAIRE DE CONNEXION POUR TESTER.
     * @Route("/API/test/", name="API-test")
     * @param APIgestionDevisService $APIgestionDevisService
     * @return Response
     */
    public function vue_connexion(APIgestionDevisService $APIgestionDevisService)
    {
        return $this->render('api_gestion_devis/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

    /**
     * @Route("/API/checkconnexion", name="API-checkconnexion")
     * @return Response
     */
    public function checkConnexion()
    {
        $request = Request::createFromGlobals();
        if ($request->request->get('validrequest') == null)
        {
            return new JsonResponse(array(
                'valide' => false,
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }
        if ($request->request->get('validrequest') == "OK")
        {
            return new JsonResponse(array(
                'valide'=>true
            ));
        }


        return new JsonResponse(array(
            'valide' => false,
            'Erreur' => "Les identifiants sont faux",
        ));
    }

    /**
     * @Route("/API/login/", name="API-login")
     * @param LoginService $loginService
     * @param APIgestionDevisService $APIgestionDevisService
     * @return Response
     */
    public function login(APIgestionDevisService $APIgestionDevisService, LoginService $loginService)
    {
        $request = Request::createFromGlobals();
        if ($request->request->get('username') == null || $request->request->get('password') == null)
        {
            return new JsonResponse(array(
                'valide' => false,
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }
        if ($loginService->checkConnexionUser($request->request->get('username'), $request->request->get('password')))
        {
            return new JsonResponse($APIgestionDevisService->genererBDDmobile($request->request->get('username')));
        }


        return new JsonResponse(array(
            'valide' => false,
            'Erreur' => "Les identifiants sont faux",
        ));
    }

    /**
     * @Route("/API/requete/{requete}/{crud}", name="API-requete")
     * @param string $requete
     * @param string $crud
     * @return Response
     */
    public function requete(string $requete, string $crud)
    {
        $response = new JsonResponse(array(
            'valide' => true,
        ));
        return $response;
    }

    /**
     * @Route("/API/getallusers", name="API-getallusers")
     * @return Response
     */
    public function getAllUsers(LoginRepository $loginRepository)
    {
        $request = Request::createFromGlobals();


        if ($request->request->get('validrequest') == null)
        {
            return new JsonResponse(array(
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }
        if ($request->request->get('validrequest') == "OK")
        {
            $allUsers = $loginRepository->findAll();
            $arrayAllUsers = array();

            foreach ($allUsers as $user){
                array_push($arrayAllUsers, array(
                    "id" => $user->getIduser(),
                    "username"=>$user->getUsername(),
                    "password"=>$user->getPassword(),
                    "nom"=>$user->getNom(),
                    "prenom"=>$user->getPrenom(),
                    "email"=>$user->getEmail(),
                    "idrole"=>$user->getIdrole(),
                    "refuser"=>$user->getRefLogin()

                ));
            }

            $response = new JsonResponse(array(
                    "users" => $arrayAllUsers
                )

            );
            return $response;
        }
        return new JsonResponse(array(
            'Erreur' => "Il y'a une erreur dans la requête"
        ));

    }

    /**
     * @Route("/API/getallclients", name="API-getallclients")
     * @return Response
     */
    public function getAllClients(ClientRepository $clientRepository)
    {
        $request = Request::createFromGlobals();


        if ($request->request->get('validrequest') == null)
        {
            return new JsonResponse(array(
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }
        if ($request->request->get('validrequest') == "OK")
        {
            $allClients = $clientRepository->findAll();
            $arrayAllClients = array();

            foreach ($allClients as $client){
                array_push($arrayAllClients, array(
                    "nom" => $client->getNom(),
                    "adresse" => $client->getAdresse(),
                    "codepostal" => $client->getCodepostal(),
                    "ville"=>$client->getVille(),
                    "estpro"=>$client->getEstprofessionnel(),
                    "secteur"=>$client->getSecteuractivite(),
                    "description"=>$client->getDescription(),
                    "refClient" => $client->getRefClient()
                ));
            }

            $response = new JsonResponse(array(
               "clients" => $arrayAllClients
            )

            );
            return $response;
        }
        return new JsonResponse(array(
            'Erreur' => "Il y'a une erreur dans la requête"
        ));

    }

    /**
     * @Route("/API/getallcontacts", name="API-getallcontacts")
     * @return Response
     */
    public function getAllContacts(ContactRepository $contactRepository, ClientRepository $clientRepository)
    {
        $request = Request::createFromGlobals();

        if ($request->request->get('validrequest') == null)
        {
            return new JsonResponse(array(
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }
        if ($request->request->get('validrequest') == "OK")
        {
            $allContacts = $contactRepository->findAll();
            $arrayAllContacts = array();

            foreach ($allContacts as $contact){
                array_push($arrayAllContacts, array(
                    "refClient" => $clientRepository->find($contact->getIdclient())->getRefClient(),
                    "nom" => $contact->getNom(),
                    "prenom"=>$contact->getPrenom(),
                    "fonction"=>$contact->getFonction(),
                    "telephone"=>$contact->getTelephone(),
                    "mail"=>$contact->getMail(),
                    "refContact"=>$contact->getRefContact()
                ));
            }

            $response = new JsonResponse(array(
                "contacts"=>$arrayAllContacts
            )

            );
            return $response;
        }
        return new JsonResponse(array(
            'Erreur' => "Il y'a une erreur dans la requête"
        ));

    }

    /**
     * @Route("/API/getallprojets", name="API-getallprojets")
     * @return Response
     */
    public function getAllProjets(ProjetRepository $projetRepository, ClientRepository $clientRepository)
    {

        $request = Request::createFromGlobals();

        if ($request->request->get('validrequest') == null)
        {
            return new JsonResponse(array(
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }
        if ($request->request->get('validrequest') == "OK")
        {
            $allProjets = $projetRepository->findAll();
            $arrayAllProjets = array();

            foreach ($allProjets as $projet){
                $StringDate = $projet->getDatecreation()->format("d-m-Y");
                array_push($arrayAllProjets, array(
                    "refClient" => $clientRepository->find($projet->getIdclient())->getRefClient(),
                    "refProjet" => $projet->getRefProjet(),
                    "nom" => $projet->getNom(),
                    "dateCreation"=>$StringDate,
                    "notes"=>$projet->getNotes(),
                ));
            }

            $response = new JsonResponse(array(
                "projets"=> $arrayAllProjets
            )

            );
            return $response;

        }
        return new JsonResponse(array(
            'Erreur' => "Il y'a une erreur dans la requête"
        ));

    }

    /**
     * @Route("/API/getallchantiers", name="API-getallchantiers")
     * @return Response
     */
    public function getAllChantiers(ChantierRepository $chantierRepository,ProjetRepository $projetRepository)
    {

        $request = Request::createFromGlobals();

        if ($request->request->get('validrequest') == null)
        {
            return new JsonResponse(array(
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }
        if ($request->request->get('validrequest') == "OK")
        {
            $allChantiers = $chantierRepository->findAll();
            $arrayAllChantiers = array();

            foreach ($allChantiers as $chantier){
                $StringDateCreation = $chantier->getDatecreation()->format("d-m-Y");
                $StringDateLancement = $chantier->getDateLancement()->format("d-m-Y");
                array_push($arrayAllChantiers, array(
                    "idUser" => $chantier->getIduser(),
                    "refProjet" => $projetRepository->find($chantier->getIdprojet())->getRefProjet(),
                    "nom"=>$chantier->getNom(),
                    "notes"=>$chantier->getNotes(),
                    "refChantier"=>$chantier->getRefChantier(),
                    "adresse"=>$chantier->getAdresse(),
                    "ville"=>$chantier->getVille(),
                    "codePostal"=>$chantier->getCodepostal(),
                    "datecreation"=>$StringDateCreation,
                    "datelancement"=>$StringDateLancement

                ));
            }

            $response = new JsonResponse(array(
                "chantiers"=>$arrayAllChantiers
            )

            );
            return $response;

        }
        return new JsonResponse(array(
            'Erreur' => "Il y'a une erreur dans la requête"
        ));
        /**/


    }

    /**
     * @Route("/API/clientinsertion", name="API-clientinsertion")
     * @return Response
     */
    public function clientInsertion(ClientRepository $clientRepository)
    {

        $request = Request::createFromGlobals();

        if ($request->request->get('create') == null)
        {
            return new JsonResponse(array(
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }
        if ($request->request->get('create') == "create")
        {
            $client = new Client();
            $client->setNom($request->request->get('nom'));
            $client->setAdresse($request->request->get('adresse'));

            if ($request->request->get('ispro') == "true"){
                $client->setEstprofessionnel(true);
            }else{
                $client->setEstprofessionnel(false);
            }

            $client->setSecteuractivite($request->request->get('secteur'));
            $client->setVille($request->request->get('ville'));
            $cp = intval($request->request->get('codepostal'));
            $client->setCodepostal($cp);
            $client->setDescription($request->request->get('description'));
            $client->setRefClient($request->request->get('refclient'));

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($client);
            $entityManager->flush();

            return new JsonResponse(array(
                'Valide' => "Le client est ajouté sur la base en ligne"
            ));

        }
        if ($request->request->get('create') == "update")
        {
            $client = $clientRepository->findOneBy(['refClient' => $request->request->get('refclient')]);

            $client->setNom($request->request->get('nom'));
            $client->setAdresse($request->request->get('adresse'));
            if ($request->request->get('ispro') == "true"){
                $client->setEstprofessionnel(true);
            }else{
                $client->setEstprofessionnel(false);
            }
            $client->setSecteuractivite($request->request->get('secteur'));
            $client->setVille($request->request->get('ville'));
            $cp = intval($request->request->get('codepostal'));
            $client->setCodepostal($cp);
            $client->setDescription($request->request->get('description'));

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($client);
            $entityManager->flush();

            return new JsonResponse(array(
                'Valide' => "Le client est mis à jour sur la base en ligne"
            ));


        }
        return new JsonResponse(array(
            'Erreur' => "Il y'a une erreur dans la requête"
        ));

    }

    /**
     * @Route("/API/clientsuppression", name="API-clientsuppression")
     * @return Response
     */
    public function clientSuppression(ClientRepository $clientRepository)
    {

        $request = Request::createFromGlobals();

        if ($request->request->get('refclient') == null)
        {
            return new JsonResponse(array(
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }else{
            $client = $clientRepository->findOneBy(['refClient' => $request->request->get('refclient')]);
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->remove($client);
            $entityManager->flush();

            return new JsonResponse(array(
                'Valide' => "Le client a été supprimé en ligne"
            ));

        }

    }

    /**
     * @Route("/API/contactinsertion", name="API-contactinsertion")
     * @return Response
     */
    public function contactInsertion(ClientRepository $clientRepository)
    {

        $request = Request::createFromGlobals();


            $contact = new Contact();
            $contact->setNom($request->request->get('nom'));
            $contact->setPrenom($request->request->get('prenom'));
            $contact->setFonction($request->request->get('fonction'));
            $contact->setTelephone($request->request->get('telephone'));
            $contact->setMail($request->request->get('mail'));

            $client = $clientRepository->findOneBy(['refClient' => $request->request->get('refclient')]);
            $contact->setIdclient($client->getIdclient());
            $contact->setRefContact($request->request->get('refcontact'));

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($contact);
            $entityManager->flush();

            return new JsonResponse(array(
                'Valide' => "Le contact est ajouté sur la base en ligne"
            ));

    }

    /**
     * @Route("/API/contactsuppression", name="API-contactsuppression")
     * @return Response
     */
    public function contactSuppression(ContactRepository $contactRepository)
    {

        $request = Request::createFromGlobals();

        if ($request->request->get('refcontact') == null)
        {
            return new JsonResponse(array(
                'Erreur' => "Les arguments en POST sont NULL",
            ));
        }else{
            $contact = $contactRepository->findOneBy(['refContact' => $request->request->get('refcontact')]);
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->remove($contact);
            $entityManager->flush();

            return new JsonResponse(array(
                'Valide' => "Le contact a été supprimé en ligne"
            ));

        }

    }

}



