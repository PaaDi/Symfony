<?php


namespace App\Service;


use App\Entity\Userrole;
use App\Repository\UserroleRepository;

class UserRoleService
{
    private $userroleRepository;

    public function __construct(
        UserroleRepository $userroleRepository
    ){
        $this->userroleRepository = $userroleRepository;
    }

    public function getAllUsers()
    {
        return $this->userroleRepository->findAll();
    }

    /* GERER PAR LE CONTROLLER SECURITY */
    public function gestionRolesViaForm(array $roles, $entityManager)
    {
        foreach ($roles as $role)
        {
            $userrole = new Userrole();
            if ($role['idrole'] != '-1') //N'est pas un nouvel user
            {
                $userrole = $this->userroleRepository->find($role['idrole']);
            }
            else
            {
                $userrole->setRefuserrole(rand(0,99999999));
            }

            $userrole->setRole($role['role']);
            $userrole->setEstadmin(false);


            if (isset($role['estadmin']))
            {
                $userrole->setEstadmin(true);
            }
            $entityManager->persist($userrole);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
        }
    }
}