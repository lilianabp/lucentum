<?php

namespace App\Repository;

use App\Entity\Combustible;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Combustible|null find($id, $lockMode = null, $lockVersion = null)
 * @method Combustible|null findOneBy(array $criteria, array $orderBy = null)
 * @method Combustible[]    findAll()
 * @method Combustible[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CombustibleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Combustible::class);
    }

    // /**
    //  * @return Combustible[] Returns an array of Combustible objects
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
    public function findOneBySomeField($value): ?Combustible
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
