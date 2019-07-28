<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ServiciosController extends AbstractController
{
    /**
     * @Route("/servicios", name="servicios")
     */
    public function index()
    {
        return $this->render('servicios/index.html.twig', [
            'controller_name' => 'ServiciosController',
        ]);
    }
}
