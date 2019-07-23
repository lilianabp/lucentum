<?php

namespace App\Repository;

use App\Entity\Cambio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cambio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cambio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cambio[]    findAll()
 * @method Cambio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CambioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cambio::class);
    }

    // /**
    //  * @return Cambio[] Returns an array of Cambio objects
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
    public function findOneBySomeField($value): ?Cambio
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
