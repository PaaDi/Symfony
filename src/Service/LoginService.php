<?php


namespace App\Service;

use App\Entity\Login;
use App\Repository\LoginRepository;
use App\Security\User;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

class LoginService
{
    private $loginRepository;

    public function __construct(
        LoginRepository $loginRepository
    ){
        $this->loginRepository = $loginRepository;
    }

    public function getUserByUsername(string $username)
    {
        $login = $this->loginRepository->findOneBy(['username' => $username]);

        if ($login == null)
        {
            throw new UsernameNotFoundException;
        }

        $userConnecte = new User();
        $userConnecte->setUsername($login->getUsername());
        $userConnecte->setPrenom($login->getPrenom());
        $userConnecte->setNomDeFamille($login->getNom());
        $userConnecte->setPassword($login->getPassword());
        $userConnecte->setRoles(array('ROLE_USER'));

        return $userConnecte;
    }

    public function refreshUser(UserInterface $user)
    {
        $login = $this->loginRepository->findOneBy(['username' => $user->getUsername()]);

        if ($login == null)
        {
            throw new UsernameNotFoundException;
        }

        $user->setUsername($login->getUsername());
        $user->setPassword($login->getPassword());
        $user->setRoles(array('ROLE_USER'));

        return $user;
    }


    public function checkConnexionUser(string $username, string $password)
    {
        $login = $this->loginRepository->findOneBy(['username' => $username, 'password' => $password]);

        if ($login == null)
        {
            return false;
        }
        return true;
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
            else
            {
                $login->setRefLogin(rand(0,99999999));
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