<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NovedadesController extends AbstractController
{
    /**
     * @Route("/novedades", name="novedades")
     */
    public function index()
    {
        return $this->render('novedades/index.html.twig', [
            'controller_name' => 'NovedadesController',
        ]);
    }
}
