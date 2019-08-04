<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Automovil;
use App\Entity\Home;
use App\Entity\GoogleReview;
use App\Application\Sonata\NewsBundle\Entity\Post;
use App\Entity\DatosEmpresa;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(EntityManagerInterface $entityManager)
    {
    	$form = $this->createForm(SearchType::class);
        $homeContent = $entityManager->getRepository(Home::class)->findOneBy(['id' => 1]);
        $destacados = $entityManager->getRepository(Automovil::class)->getOfertasDestacados('destacado');
        $ofertas = $entityManager->getRepository(Automovil::class)->getOfertasDestacados('oferta');
        $comentarios = $entityManager->getRepository(GoogleReview::class)->findBy([], ['id' => 'DESC'], 5);
        $posts = $entityManager->getRepository(Post::class)->findBy([], ['id' => 'DESC'], 5); 
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'searchForm' => $form->createView(),
            'home' => $homeContent,
            'ofertas' => $ofertas,
            'destacados' => $destacados,
            'comentarios' => $comentarios,
            'posts' => $posts,
        ]);
    }

     public function footer(EntityManagerInterface $entityManager)
    {
        $posts = $entityManager->getRepository(Post::class)->findBy([], ['id' => 'DESC'], 3);
        $datos = $entityManager->getRepository(DatosEmpresa::class)->findOneBy(['id' => 1]);
        return $this->render('partials/footer.html.twig', [
            'datos' => $datos,
            'posts' => $posts,
        ]);
    }
}
