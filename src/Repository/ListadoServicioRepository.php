<?php

namespace App\Repository;

use App\Entity\ListadoServicio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ListadoServicio|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListadoServicio|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListadoServicio[]    findAll()
 * @method ListadoServicio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListadoServicioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ListadoServicio::class);
    }

    // /**
    //  * @return ListadoServicio[] Returns an array of ListadoServicio objects
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
    public function findOneBySomeField($value): ?ListadoServicio
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
