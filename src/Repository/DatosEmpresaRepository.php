<?php

namespace App\Repository;

use App\Entity\DatosEmpresa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DatosEmpresa|null find($id, $lockMode = null, $lockVersion = null)
 * @method DatosEmpresa|null findOneBy(array $criteria, array $orderBy = null)
 * @method DatosEmpresa[]    findAll()
 * @method DatosEmpresa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatosEmpresaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DatosEmpresa::class);
    }

    // /**
    //  * @return DatosEmpresa[] Returns an array of DatosEmpresa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DatosEmpresa
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
