<?php

namespace App\Controller;

use App\Entity\Login;
use App\Service\APIgestionDevisService;
use App\Service\baseService;
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
     * @param baseService $baseService
     * @param APIgestionDevisService $APIgestionDevisService
     * @return Response
     */
    public function login(APIgestionDevisService $APIgestionDevisService, baseService $baseService)
    {
        $request = Request::createFromGlobals();
        if ($baseService->testConnexionUser($request->request->get('username'), $request->request->get('pswd')))
        {
            return new JsonResponse($APIgestionDevisService->genererBDDmobile($request->request->get('username')));
        }


        return new JsonResponse(array(
            'valide' => false,
        ));
    }

    /**
     * @Route("/API/requete", name="API-requete")
     * @return Response
     */
    public function requete()
    {
        $response = new JsonResponse(array(
            'valide' => true,
        ));
        return $response;
    }

}
