<?php


namespace App\Service;


class baseService
{
    public function envoyerMsgTest(): string
    {
        return "Ceci est un test";
    }

    public function testConnexionUser(string $username, string $password)
    {
        if ($username == "admin" && $password == "")
        {
            return true;
        }
        return false;
    }
}