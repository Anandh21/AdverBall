<?php

namespace App\Repository;

use App\Entity\SocialCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SocialCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocialCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocialCategory[]    findAll()
 * @method SocialCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocialCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocialCategory::class);
    }

    // /**
    //  * @return SocialCategory[] Returns an array of SocialCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SocialCategory
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
