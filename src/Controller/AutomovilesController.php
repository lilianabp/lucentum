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
use App\Entity\DatosEmpresa;

class AutomovilesController extends AbstractController
{
    /**
     * @Route("/automoviles", name="automoviles")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator)
    {
        $form = $this->createForm(SearchType::class);
        $automoviles = $entityManager->getRepository(Automovil::class)->getDisponiblesReservados();
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
	* @Route("/{marca}-{modelo}-{id}", name="automovil")
    */
    public function show(Request $request, EntityManagerInterface $entityManager) {
        $id = $request->get('id');
        $content = $entityManager->getRepository(ListadoAutomovil::class)->findOneBy(['id' => 1]);
        $automovil = $entityManager->getRepository(Automovil::class)->findOneBy(['id' => $id]);
        $galeria = ($automovil?$automovil->getFiles():null);
        //$medias = ($galeria?$automovil->getGaleria()->getGalleryHasMedias():[]);
        $datos = $entityManager->getRepository(DatosEmpresa::class)->findOneBy(['id' => 1]);

    	return $this->render('automoviles/show.html.twig', [
            'controller_name' => 'AutomovilesController',
            'content'=>$content,
            'automovil'=>$automovil,
            'medias'=>$galeria,
            'datos'=>$datos
        ]);
    }

    /**
    * @Route("/buscar", name="buscarmiautomovil")
    */
    public function search(Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator) {
        $form = $this->createForm(SearchType::class);
        $results = $entityManager->getRepository(Automovil::class)->searchByAttr($request->request->get('search'));
        $content = $entityManager->getRepository(ListadoAutomovil::class)->findOneBy(['id' => 1]);
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
