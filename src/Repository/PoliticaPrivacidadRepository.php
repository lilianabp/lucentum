<?php

namespace App\Repository;

use App\Entity\PoliticaPrivacidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PoliticaPrivacidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method PoliticaPrivacidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method PoliticaPrivacidad[]    findAll()
 * @method PoliticaPrivacidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoliticaPrivacidadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PoliticaPrivacidad::class);
    }

    // /**
    //  * @return PoliticaPrivacidad[] Returns an array of PoliticaPrivacidad objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PoliticaPrivacidad
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
