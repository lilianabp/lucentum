<?php

namespace App\Application\Sonata\NewsBundle\Entity;

use Sonata\NewsBundle\Entity\BasePostRepository;

/**
 * This file has been generated by the SonataEasyExtendsBundle.
 *
 * @link https://sonata-project.org/easy-extends
 *
 * References:
 * @link http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en#querying:custom-repositories
 * @link http://www.doctrine-project.org/projects/orm/2.0/docs/reference/query-builder/en
 * @link http://www.doctrine-project.org/projects/orm/2.0/docs/reference/dql-doctrine-query-language/en
 */
class PostRepository extends BasePostRepository
{
	public function findBySearched($search)
    {
        return $qb = $this->createQueryBuilder('a')
			->andWhere('a.title LIKE :search')
        	->orWhere('a.abstract LIKE :search')
            ->orWhere('a.content LIKE :search')
            ->setParameter(':search', '%'.$search.'%')
			->getQuery()
            ->getResult();
        ;
    }
}
