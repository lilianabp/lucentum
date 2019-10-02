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
    
    public function searchByAttr($query)
    {
        $qb = $this->createQueryBuilder('a');
            
        if ($query['marca']) {
            $qb->andWhere('a.marca = :marca')
               ->setParameter(':marca', $query['marca']);
        }

        if ($query['modelo']) {
            $qb->andWhere('a.modelo LIKE :modelo')
               ->setParameter(':modelo', '%'.$query['modelo'].'%');
        }

        if ($query['combustible']) {
            $qb->andWhere('a.combustible = :combustible')
               ->setParameter(':combustible', $query['combustible']);
        }

        if ($query['cambio']) {
            $qb->andWhere('a.cambio = :cambio')
               ->setParameter(':cambio', $query['cambio']);
        }

        if ($query['anio']) {
            $qb->andWhere('a.anio = :anio')
               ->setParameter(':anio', $query['anio']);
        }

        if (array_key_exists('oferta', $query)) {
            $qb->andWhere('a.oferta = :oferta')
               ->setParameter(':oferta', 1);
        }

        if (array_key_exists('max_price', $query)) {
            $qb->andWhere('a.precio < :max_price')
               ->setParameter(':max_price', $query['max_price']);
        }

        $qb->andWhere('a.estado != :estado')
            ->setParameter(':estado', 1)
            ->andWhere('a.activo = :activo')
            ->setParameter(':activo', 1);

        return $qb->getQuery()
                ->getResult()
        ;
    }
    

    
    public function getOfertasDestacados($attr)
    {
        $qb = $this->createQueryBuilder('a');
        if($attr == 'destacado'){
            $qb->andWhere('a.destacado = :destacado')
            ->setParameter('destacado', 1);
        } else {
            $qb->andWhere('a.oferta = :oferta')
            ->setParameter('oferta', 1);
        }
        
        $qb->andWhere('a.estado != :estado')
            ->setParameter(':estado', 1)
            ->andWhere('a.activo = :activo')
            ->setParameter(':activo', 1);

        return $qb->getQuery()
                ->getResult()
        ;
    }

    public function getDisponiblesReservados()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.estado != :estado')
            ->setParameter('estado', 1)
            ->orderBy('c.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    
}
