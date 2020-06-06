<?php

namespace App\Repository;

use App\Entity\MaltQunatity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MaltQunatity|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaltQunatity|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaltQunatity[]    findAll()
 * @method MaltQunatity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaltQunatityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaltQunatity::class);
    }

    // /**
    //  * @return MaltQunatity[] Returns an array of MaltQunatity objects
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
    public function findOneBySomeField($value): ?MaltQunatity
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
