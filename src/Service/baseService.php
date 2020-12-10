<?php


namespace App\Service;


use App\Entity\Login;
use App\Repository\LoginRepository;

class baseService
{

    private $loginRepository;

    public function __construct(
        LoginRepository $loginRepository
    ){
        $this->loginRepository = $loginRepository;
    }

    public function envoyerMsgTest(): string
    {
        return "Ceci est un test";
    }

    /* GERER PAR LE CONTROLLER SECURITY */
//    public function testConnexionUser(string $username, string $password)
//    {
//        $leLogin = $this->loginRepository->findOneBy(['username' => $username, 'password' => $password]);
//
//        if ($leLogin != null)
//        {
//            return true;
//        }
//        return false;
//    }
}