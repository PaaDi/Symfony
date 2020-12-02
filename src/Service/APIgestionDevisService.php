<?php


namespace App\Service;


class APIgestionDevisService
{
    function genererBDDmobile(string $username)
    {
        return array(
            'valide' => true,
            'nom' => $username,
            'bdd' => array(
                'user' => array(
                    'nom' => "Patoche",
                    'prenom' => "Didier",
                    'tel' => "",
                    'id' => 35,
                ),
                'projets' => array(
                    array(
                        'nom' => "Maison",
                        'notes' => "En bois",
                        'prix' => 348000.25,
                        'ttc' => true,
                    ),
                    array(
                        'nom' => "Maison",
                        'notes' => "En bois",
                        'prix' => 784248.25,
                        'ttc' => false,
                    ),

                ),
            ),
        );
    }
}