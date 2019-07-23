<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class ContentService
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        //para traer lso contenidos estaticos como servicio separados
//        $this->contentRepository = $entityManager->getRepository(Content::class);
    }
    public function getContents()
    {
//        $contents = $this->contentRepository->findOneBy(array());

//        return $contents;
    }
}