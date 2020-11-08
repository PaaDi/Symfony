<?php

namespace App\Controller;

use App\Service\baseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="base-appSelection")
     * @param baseService $baseService
     * @return Response
     */
    public function index(baseService $baseService)
    {
        $cheminImagesSite = "Content/site-images/";
        $listeDesApps = array(
            array("nom" => "Gestion de devis", "description" => "Gérez les projet, chantiers devis et clients de l'entreprise.",
                    "chemin_image" => $cheminImagesSite."ico-comm.png",
                "chemin_app" => $this->generateUrl('gestion_devis')),

            array("nom" => "Assemblage des maisons modulaires", "description" => "Définissez les composants, modules, gammes et variants que les commerciaux peuvent utiliser.",
                    "chemin_image" => $cheminImagesSite."ico-BE.png",
                "chemin_app" => $this->generateUrl('gestion_devis')),

            array("nom" => "Modalités de paiement", "description" => "Accedez aux devis validés et renseigner les étapes de paiement réalisées",
                    "chemin_image" => $cheminImagesSite."ico-modalites.png",
                "chemin_app" => $this->generateUrl('gestion_devis')),

            array("nom" => "Gestion des utilisateurs et des rôles", "description" => "Ajoutez, supprimez ou changer les rôles d'un utilisateur",
                    "chemin_image" => $cheminImagesSite."ico-users.png",
                "chemin_app" => $this->generateUrl('gestion_devis')),

            array("nom" => "@Services", "description" => "Déclarez un problème ou faites une demande au service informatique",
                    "chemin_image" => $cheminImagesSite."ico-services.png",
                "chemin_app" => $this->generateUrl('gestion_devis')),

            array("nom" => "Administrateur", "description" => "Gerez les tickets des utilisateurs et reglez le site.",
                    "chemin_image" => $cheminImagesSite."ico-settings.png",
                "chemin_app" => $this->generateUrl('gestion_devis')),

            array("nom" => "Blog", "description" => "Gerez les indicateurs et les newsletters pour les clients",
                    "chemin_image" => $cheminImagesSite."ico-blog.png",
                "chemin_app" => $this->generateUrl('gestion_devis')),
        );
        return $this->render('base/appSelection.html.twig', [
            'controller_name' => 'BaseController',
            'test' => $baseService->envoyerMsgTest(),
            'headerRechercheOptions' => array("Apps", "Option 2", "Opt 3"),
            'listeDesApps' => $listeDesApps,
        ]);
    }


    /**
     * @Route("/login", name="base-login")
     * @param baseService $baseService
     * @return Response
     */
    public function login(baseService $baseService)
    {
        return $this->render('base/login.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
}
