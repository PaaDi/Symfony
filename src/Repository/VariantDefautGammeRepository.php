<?php

namespace App\Repository;

use App\Entity\Variantsdefautgamme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Variantsdefautgamme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Variantsdefautgamme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Variantsdefautgamme[]    findAll()
 * @method Variantsdefautgamme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VariantDefautGammeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Variantsdefautgamme::class);
    }

    // /**
    //  * @return Variantsdefautgamme[] Returns an array of Variantsdefautgamme objects
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
    public function findOneBySomeField($value): ?Variantsdefautgamme
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
