<?php

namespace App\Repository;

use App\Entity\Realestate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Realestate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Realestate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Realestate[]    findAll()
 * @method Realestate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealestateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Realestate::class);
    }

    // /**
    //  * @return Realestate[] Returns an array of Realestate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Realestate
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
