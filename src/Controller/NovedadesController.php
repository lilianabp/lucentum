<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Novedad;
use App\Application\Sonata\NewsBundle\Entity\Post;
use App\Application\Sonata\ClassificationBundle\Entity\Tag;

class NovedadesController extends AbstractController
{
    /**
     * @Route("/novedades", name="novedades")
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator)
    {
        $content = $entityManager->getRepository(Novedad::class)->findOneBy(['id'=>1]);
        $tags = $entityManager->getRepository(Tag::class)->findBy(['enabled'=>1], ['id'=>'DESC']);
        if($request->get('search') && $request->get('search') !== '') {
            $novedades = $entityManager->getRepository(Post::class)->findBySearched($request->get('search'));   
        //} 
        //elseif($request->get('tag') && $request->get('tag') !== '') {
          //  $tag = $entityManager->getRepository(Tag::class)->findOneBy(['slug'=>$request->get('tag')]);
            //$novedades = $tag->getPost();

        } else {
            $novedades = $entityManager->getRepository(Post::class)->findBy([], ['id'=>'Desc']);
        }

        // pagination
        $paginated = $paginator->paginate(
            $novedades, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/, 6/*limit per page*/
        );

        return $this->render('novedades/index.html.twig', [
            'controller_name' => 'NovedadesController',
            'content' => $content,
            'novedades' => $paginated,
            'tags' => $tags,
        ]);
    }

        /**
	* @Route("/{title}-{id}", name="post")
    */
    public function show(Request $request, EntityManagerInterface $entityManager) {
        $content = $entityManager->getRepository(Novedad::class)->findOneBy(['id'=>1]);
        $post = $entityManager->getRepository(Post::class)->findOneBy(['id'=>$request->get('id')]);
        $tags = $entityManager->getRepository(Tag::class)->findBy(['enabled'=>1], ['id'=>'DESC']);

    	return $this->render('novedades/show.html.twig', [
            'controller_name' => 'NovedadesController',
            'content' => $content,
            'post'=>$post,
            'tags' => $tags,
        ]);	
    }
}
