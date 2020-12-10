<?php

namespace App\Repository;

use App\Entity\Modalitespaiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Modalitespaiement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Modalitespaiement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Modalitespaiement[]    findAll()
 * @method Modalitespaiement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModalitespaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Modalitespaiement::class);
    }

    // /**
    //  * @return Modalitespaiement[] Returns an array of Modalitespaiement objects
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
    public function findOneBySomeField($value): ?Modalitespaiement
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
