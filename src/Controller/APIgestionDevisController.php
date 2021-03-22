<?php

namespace App\Controller;

use App\Entity\Login;
use App\Repository\ChantierRepository;
use App\Repository\ClientRepository;
use App\Repository\ContactRepository;
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

        $response = new JsonResponse(
            $arrayAllContacts
        );
        return $response;
    }

    /**
     * @Route("/API/getallprojets", name="API-getallprojets")
     * @return Response
     */
    public function getAllProjets(ProjetRepository $projetRepository, ClientRepository $clientRepository)
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

        $response = new JsonResponse(
            $arrayAllProjets
        );
        return $response;
    }

    /**
     * @Route("/API/getallchantiers", name="API-getallchantiers")
     * @return Response
     */
    public function getAllChantiers(ChantierRepository $chantierRepository,ProjetRepository $projetRepository)
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

        $response = new JsonResponse(
            $arrayAllChantiers
        );
        return $response;
    }
}



