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
use App\Application\Sonata\NewsBundle\Entity\Comment;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\EmailService;

class NovedadesController extends AbstractController
{
    /**
     * @Route("/novedades", name="novedades")
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator)
    {
        $content = $entityManager->getRepository(Novedad::class)->findOneBy(['id'=>1]);
        $tags = $entityManager->getRepository(Tag::class)->findBy(['enabled'=>1, 'context'=>2], ['id'=>'DESC']);
        if($request->get('search') && $request->get('search') !== '') {
            $novedades = $entityManager->getRepository(Post::class)->findBySearched($request->get('search'));   
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
        $tags = $entityManager->getRepository(Tag::class)->findBy(['enabled'=>1, 'context'=>2], ['id'=>'DESC']);

        $comment = new Comment();
        $message = "";
        $status = "";
        if ($request->get('comment')) {
            $newcomment = $request->get('comment');
            $comment->setName($newcomment['name']);
            $comment->setEmail($newcomment['email']);
            $comment->setMessage($newcomment['message']);
            $comment->setStatus(2);
            $comment->setPost($post);
            $entityManager->persist($comment);
            try {
                $entityManager->flush();
                $message = "Tu comentario se ha enviado con éxito. Un moderador lo evaluará y publicará.";
                $status = "success";
            } catch (\Exception $e) {
                    $message = $e->getMessage();
            }   

        }else{
            $message = "Datos inválidos";
            $status = 'error';
        }

    	return $this->render('novedades/show.html.twig', [
            'controller_name' => 'NovedadesController',
            'content' => $content,
            'post'=>$post,
            'tags' => $tags,
            'response' => $response = array(
                'message' => $message,
                'status' => $status,
            ),
        ]);	
    }

    /**
    * @Route("/comment", name="comment")
    */
    public function commentPost(Request $request, EntityManagerInterface $entityManager, EmailService $emailService) {
        if ($request->get('comment')) {
            $newcomment = $request->get('comment');
            $post = $entityManager->getRepository(Post::class)->findOneBy(['id'=>$newcomment['post']]);
            $comment = new Comment();
            $message = "";
            $status = "";
            $comment->setName($newcomment['name']);
            $comment->setEmail($newcomment['email']);
            $comment->setMessage($newcomment['message']);
            $comment->setStatus(2);
            $comment->setPost($post);
            $entityManager->persist($comment);
            try {
                $entityManager->flush();
                $sendEmail = $emailService->sendEmail('email/email.html.twig', 'Has recibido un comentario', 'testdinamic51@gmail.com', 'lilianabpereira@gmail.com', $comment);
                if ($sendEmail == 'success') {
                    $message = "Tu comentario se ha enviado con éxito. Un moderador lo evaluará y publicará.";
                    $status = "success";
                } else {
                    $status = 'error';
                    $message = 'Ha ocurrido un error al enviar su comentario';
                }
            } catch (\Exception $e) {
                    $message = $e->getMessage();
            }   

        }else{
            $message = "Datos inválidos";
            $status = 'error';
        }

        $response = array(
            'status' => $status,
            'message' => $message
        );

        return new JsonResponse($response);
    }
}
