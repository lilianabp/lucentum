<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Automovil;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(EntityManagerInterface $entityManager)
    {
    	$form = $this->createForm(SearchType::class);
        $destacados = $entityManager->getRepository(Automovil::class)->getOfertasDestacados('destacado');
        $ofertas = $entityManager->getRepository(Automovil::class)->getOfertasDestacados('oferta');
        // $comentarios = 
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'searchForm' => $form->createView(),
            'ofertas' => $ofertas,
            'destacados' => $destacados,
        ]);
    }
}
