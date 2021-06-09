<?php

namespace App\Repository;

use App\Entity\FavoriteBrand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FavoriteBrand|null find($id, $lockMode = null, $lockVersion = null)
 * @method FavoriteBrand|null findOneBy(array $criteria, array $orderBy = null)
 * @method FavoriteBrand[]    findAll()
 * @method FavoriteBrand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavoriteBrandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FavoriteBrand::class);
    }

    // /**
    //  * @return FavoriteBrand[] Returns an array of FavoriteBrand objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FavoriteBrand
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
