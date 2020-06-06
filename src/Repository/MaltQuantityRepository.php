<?php

namespace App\Repository;

use App\Entity\MaltQuantity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MaltQuantity|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaltQuantity|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaltQuantity[]    findAll()
 * @method MaltQuantity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaltQuantityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaltQuantity::class);
    }

    // /**
    //  * @return MaltQuantity[] Returns an array of MaltQuantity objects
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
    public function findOneBySomeField($value): ?MaltQuantity
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
