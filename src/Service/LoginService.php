<?php


namespace App\Service;

use App\Entity\Login;
use App\Repository\LoginRepository;

class LoginService
{
    private $loginRepository;

    public function __construct(
        LoginRepository $loginRepository
    ){
        $this->loginRepository = $loginRepository;
    }

    public function getAllUsers()
    {
        return $this->loginRepository->findAll();
    }

    /* GERER PAR LE CONTROLLER SECURITY */
    public function gestionUsersViaForm(array $users, $entityManager)
    {
        foreach ($users as $user)
        {
            $login = new Login();
            if ($user['iduser'] != '-1') //N'est pas un nouvel user
            {
                $login = $this->loginRepository->find($user['iduser']);
            }

            $login->setUsername($user['username']);
            $login->setPrenom($user['prenom']);
            $login->setNom($user['nom']);
            $login->setEmail($user['email']);
            $login->setPassword($user['password']);
            $login->setIdrole($user['idrole']);


            if (isset($user['delete']))
            {
                $entityManager->remove($login);
            }
            else{
                $entityManager->persist($login);
            }


            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
        }
    }
}