<?php

namespace App\Repository;

use App\Entity\Modulesdansplan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Modulesdansplan|null find($id, $lockMode = null, $lockVersion = null)
 * @method Modulesdansplan|null findOneBy(array $criteria, array $orderBy = null)
 * @method Modulesdansplan[]    findAll()
 * @method Modulesdansplan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuledansplanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Modulesdansplan::class);
    }

    // /**
    //  * @return Modulesdansplan[] Returns an array of Modulesdansplan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Modulesdansplan
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
