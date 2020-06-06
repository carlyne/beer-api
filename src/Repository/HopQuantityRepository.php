<?php

namespace App\Repository;

use App\Entity\HopQuantity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HopQuantity|null find($id, $lockMode = null, $lockVersion = null)
 * @method HopQuantity|null findOneBy(array $criteria, array $orderBy = null)
 * @method HopQuantity[]    findAll()
 * @method HopQuantity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HopQuantityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HopQuantity::class);
    }

    // /**
    //  * @return HopQuantity[] Returns an array of HopQuantity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HopQuantity
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
