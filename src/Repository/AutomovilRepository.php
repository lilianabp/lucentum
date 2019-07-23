<?php

namespace App\Repository;

use App\Entity\Automovil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Automovil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Automovil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Automovil[]    findAll()
 * @method Automovil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutomovilRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Automovil::class);
    }

    // /**
    //  * @return Automovil[] Returns an array of Automovil objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Automovil
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
