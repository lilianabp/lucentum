<?php

namespace App\Repository;

use App\Entity\Legal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Legal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Legal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Legal[]    findAll()
 * @method Legal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LegalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Legal::class);
    }

    // /**
    //  * @return Legal[] Returns an array of Legal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Legal
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
