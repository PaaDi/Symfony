<?php

namespace App\Repository;

use App\Entity\Userrole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Userrole|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userrole|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userrole[]    findAll()
 * @method Userrole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserroleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Userrole::class);
    }

    // /**
    //  * @return Userrole[] Returns an array of Userrole objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Userrole
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
