<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Automovil;
use App\Entity\Home;
use App\Entity\GoogleReview;
use App\Entity\DatosEmpresa;
use App\Entity\Newsletter;
use App\Form\NewsletterType;
use App\Form\SearchType;
use App\Application\Sonata\NewsBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        $posts = $entityManager->getRepository(Post::class)->findBy([], ['id' => 'DESC'], 5); 
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'searchForm' => $form->createView(),
            'home' => $homeContent,
            'ofertas' => $ofertas,
            'destacados' => $destacados,
            'posts' => $posts,
        ]);
    }

     public function footer(EntityManagerInterface $entityManager)
    {
        $datos = $entityManager->getRepository(DatosEmpresa::class)->findOneBy(['id' => 1]);
        $form = $this->createForm(NewsletterType::class);
        return $this->render('partials/footer.html.twig', [
            'datos' => $datos,
            'newsletter' => $form->createView(),
        ]);
    }

     /**
     * @Route("/newsletter", name="newsletter")
     */
     public function newsletter(Request $request, EntityManagerInterface $entityManager) {
        $email = $request->request->get('newsletter');
        $emailexists = $entityManager->getRepository(Newsletter::class)->findOneBy(['email'=>$email['email']]);
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterType::class, $newsletter);
        $form->handleRequest($request);
        $status = "error";
        $message = "";

        if ($form->isSubmitted() && $form->isValid()) {
            if(!$emailexists){ 
                $entityManager->persist($newsletter);
                try {
                    $entityManager->flush();
                    $status = "success";
                    $message = "Suscripto con éxito al Newsletter";
                } catch (\Exception $e) {
                        $message = $e->getMessage();
                }   
            } else {
                $message = 'Tu email '.$email['email'].' ya está registrado.';
            }
             
        }else{
            $message = "Datos inválidos";
        }

        $response = array(
            'status' => $status,
            'message' => $message
        );

        return new JsonResponse($response);
     }

}
