<?php

namespace App\Repository;

use App\Entity\PlatformTrainingSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PlatformTrainingSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlatformTrainingSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlatformTrainingSession[]    findAll()
 * @method PlatformTrainingSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatformTrainingSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlatformTrainingSession::class);
    }

    // /**
    //  * @return PlatformTrainingSession[] Returns an array of PlatformTrainingSession objects
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
    public function findOneBySomeField($value): ?PlatformTrainingSession
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
