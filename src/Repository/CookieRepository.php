<?php

namespace App\Repository;

use App\Entity\Cookie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cookie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cookie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cookie[]    findAll()
 * @method Cookie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CookieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cookie::class);
    }

    // /**
    //  * @return Cookie[] Returns an array of Cookie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cookie
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
