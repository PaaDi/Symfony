<?php

namespace App\Controller;

use App\Entity\Login;
use App\Service\APIgestionDevisService;
use App\Service\baseService;
use App\Service\LoginService;
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
        if ($loginService->checkConnexionUser($request->request->get('username'), $request->request->get('password')))
        {
            return new JsonResponse($APIgestionDevisService->genererBDDmobile($request->request->get('username')));
        }


        return new JsonResponse(array(
            'valide' => false,
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

}
