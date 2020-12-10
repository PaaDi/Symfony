<?php

namespace App\Repository;

use App\Entity\Paiementdevis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Paiementdevis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paiementdevis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paiementdevis[]    findAll()
 * @method Paiementdevis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaiementdevisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paiementdevis::class);
    }

    // /**
    //  * @return Paiementdevis[] Returns an array of Paiementdevis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Paiementdevis
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
