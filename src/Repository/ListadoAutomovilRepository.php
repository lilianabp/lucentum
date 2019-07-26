<?php

namespace App\Repository;

use App\Entity\ListadoAutomovil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ListadoAutomovil|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListadoAutomovil|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListadoAutomovil[]    findAll()
 * @method ListadoAutomovil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListadoAutomovilRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ListadoAutomovil::class);
    }

    // /**
    //  * @return ListadoAutomovil[] Returns an array of ListadoAutomovil objects
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
    public function findOneBySomeField($value): ?ListadoAutomovil
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
