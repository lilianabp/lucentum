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

        /**
	* @Route("/novedades/{title}", name="post")
    */
    public function show() {
    	return $this->render('novedades/show.html.twig', [
            'controller_name' => 'NovedadesController',
        ]);	
    }
}
