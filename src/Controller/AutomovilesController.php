<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AutomovilesController extends AbstractController
{
    /**
     * @Route("/automoviles", name="automoviles")
     */
    public function index()
    {
        return $this->render('automoviles/index.html.twig', [
            'controller_name' => 'AutomovilesController',
        ]);
    }

    /**
	* @Route("/automoviles/{marca}-{modelo}", name="automovil")
    */
    public function show() {
    	return $this->render('automoviles/show.html.twig', [
            'controller_name' => 'AutomovilesController',
        ]);
    }
}
