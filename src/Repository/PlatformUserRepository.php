<?php

namespace App\Repository;

use App\Entity\PlatformUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PlatformUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlatformUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlatformUser[]    findAll()
 * @method PlatformUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatformUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlatformUser::class);
    }

    // /**
    //  * @return PlatformUser[] Returns an array of PlatformUser objects
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
    public function findOneBySomeField($value): ?PlatformUser
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
