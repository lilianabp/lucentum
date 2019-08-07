<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ListadoServicio;
use App\Entity\Servicio;

class ServiciosController extends AbstractController
{
    /**
     * @Route("/servicios", name="servicios")
     */
    public function index(EntityManagerInterface $entityManager)
    {
    	$content = $entityManager->getRepository(ListadoServicio::class)->findOneBy(['id'=>1]);
    	$servicios = $entityManager->getRepository(Servicio::class)->findBy([], ['id' => 'DESC']);
        return $this->render('servicios/index.html.twig', [
            'controller_name' => 'ServiciosController',
            'content' => $content,
            'servicios' => $servicios,
        ]);
    }
}
