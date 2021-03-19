<?php

namespace App\Repository;

use App\Entity\VariantsDansDevis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VariantsDansDevis|null find($id, $lockMode = null, $lockVersion = null)
 * @method VariantsDansDevis|null findOneBy(array $criteria, array $orderBy = null)
 * @method VariantsDansDevis[]    findAll()
 * @method VariantsDansDevis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VariantsDansDevisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VariantsDansDevis::class);
    }

    // /**
    //  * @return VariantsDansDevis[] Returns an array of VariantsDansDevis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VariantsDansDevis
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
