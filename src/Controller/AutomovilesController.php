<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Automovil;
use App\Form\SearchType;
use App\Entity\ListadoAutomovil;
use Knp\Component\Pager\PaginatorInterface;

class AutomovilesController extends AbstractController
{
    /**
     * @Route("/automoviles", name="automoviles")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator)
    {
        $form = $this->createForm(SearchType::class);
        $automoviles = $entityManager->getRepository(Automovil::class)->findBy([], ['id' => 'DESC']);
        $content = $entityManager->getRepository(ListadoAutomovil::class)->findOneBy(['id' => 1]);
        // pagination
        $paginated = $paginator->paginate(
            $automoviles, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/, 8/*limit per page*/
        );

        return $this->render('automoviles/index.html.twig', [
            'controller_name' => 'AutomovilesController',
            'automoviles' => $paginated,
            'searchForm' => $form->createView(),
            'content' => $content,
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
    public function search(Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator) {
        $form = $this->createForm(SearchType::class);
        $results = $entityManager->getRepository(Automovil::class)->searchByAttr($request->request->get('search'));
        $content = $entityManager->getRepository(ListadoAutomovil::class)->findBy(['id' => 1]);
        // pagination
        $paginated = $paginator->paginate(
            $results, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/, 8/*limit per page*/
        );
        return $this->render('automoviles/index.html.twig', [
            'controller_name' => 'AutomovilesController',
            'automoviles' => $paginated,
            'searchForm' => $form->createView(),
            'request' => $request->request->get('search'),
            'content' => $content,
        ]);
    }
}
