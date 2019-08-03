<?php

namespace App\Repository;

use App\Entity\GoogleReview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GoogleReview|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoogleReview|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoogleReview[]    findAll()
 * @method GoogleReview[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoogleReviewRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GoogleReview::class);
    }

    // /**
    //  * @return GoogleReview[] Returns an array of GoogleReview objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GoogleReview
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
