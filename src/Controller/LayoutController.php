<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Automovil;
use App\Entity\GoogleReview;

class LayoutController extends AbstractController
{
    /**
     * @Route("/ultimos", name="ultimos")
     */
    public function getUltimosModelos(EntityManagerInterface $entityManager)
    {
    	$ultimos = $entityManager->getRepository(Automovil::class)->findBy([], ['id' => 'DESC'], 3);
        return $this->render('layout/ultimos.html.twig', [
            'controller_name' => 'LayoutController',
            'ultimos' => $ultimos,
        ]);
    }

    /**
     * @Route("/comentarios", name="comentarios")
     */
    public function getComentarios(EntityManagerInterface $entityManager, $max)
    {

        $comentarios = $entityManager->getRepository(GoogleReview::class)->findBy([], ['id' => 'DESC'], 5);
        return $this->render('layout/comentarios.html.twig', [
            'controller_name' => 'LayoutController',
            'comentarios' => $comentarios,
        ]);
    }
}
