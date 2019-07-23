<?php

namespace App\Repository;

use App\Entity\Condicion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Condicion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Condicion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Condicion[]    findAll()
 * @method Condicion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CondicionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Condicion::class);
    }

    // /**
    //  * @return Condicion[] Returns an array of Condicion objects
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
    public function findOneBySomeField($value): ?Condicion
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
