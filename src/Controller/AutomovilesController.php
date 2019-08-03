<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Automovil;

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

    /**
    * @Route("/buscar-mi-automovil", name="buscarmiautomovil")
    */
    public function search(Request $request, EntityManagerInterface $entityManager) {
        $results = $entityManager->getRepository(Automovil::class)->searchByAttr($request->request->get('search'));

        return $this->render('automoviles/index.html.twig', [
            'controller_name' => 'AutomovilesController',
            'automoviles' => $results,
        ]);
    }
}
