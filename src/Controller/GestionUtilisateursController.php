<?php

namespace App\Controller;

use App\Repository\LoginRepository;
use App\Service\LoginService;
use App\Service\UserRoleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionUtilisateursController extends AbstractController
{
    /**
     * @Route("/gestionutilisateurs", name="gestion_utilisateurs")
     * @param LoginService $loginService
     * @return Response
     */
    public function index(LoginService $loginService): Response
    {
        //GESTION POST SI VALIDATION DU FORMULAIRE
        $request = Request::createFromGlobals();
        $userspost = $request->request->all();
        if (count($userspost) > 0)
        {
            $loginService->gestionUsersViaForm($userspost, $this->getDoctrine()->getManager());
        }

        $newUser = false;
        if ($request->query->get('newuser') == true)
        {
            $newUser = true;
        }

        //RECUP ET AFFICHAGE DES USERS
        $utilisateurs = $loginService->getAllUsers();
        return $this->render('gestion_utilisateurs/utilisateurs.html.twig', [
            'headerRechercheOptions' => array("User", "Role"),
            'users' => $utilisateurs,
            'newUser' => $newUser,
        ]);
    }


    /**
     * @Route("/gestionroles", name="gestion_roles")
     * @param LoginService $loginService
     * @return Response
     */
    public function gestionRole(UserRoleService $userRoleService): Response
    {
        //GESTION POST SI VALIDATION DU FORMULAIRE
        $request = Request::createFromGlobals();
        $rolesspost = $request->request->all();
        if (count($rolesspost) > 0)
        {
            $userRoleService->gestionRolesViaForm($rolesspost, $this->getDoctrine()->getManager());
        }

        $newRole = false;
        if ($request->query->get('newrole') == true)
        {
            $newRole = true;
        }

        //RECUP ET AFFICHAGE DES USERS
        $roles = $userRoleService->getAllUsers();
        return $this->render('gestion_utilisateurs/roles.html.twig', [
            'headerRechercheOptions' => array("User", "Role"),
            'roles' => $roles,
            'newRole' => $newRole,
        ]);
    }
}
