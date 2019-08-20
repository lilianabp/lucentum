<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Automovil;
use App\Entity\GoogleReview;
use App\Entity\Legal;
use App\Entity\Cookie;
use App\Entity\PoliticaPrivacidad;
use App\Entity\Contacto;

class LayoutController extends AbstractController
{
    /**
     * @Route("/ultimos", name="ultimos")
     */
    public function getUltimosModelos(EntityManagerInterface $entityManager)
    {
    	$ultimos = $entityManager->getRepository(Automovil::class)->findBy([], ['id' => 'DESC'], 3);
        return $this->render('layout/ultimos.html.twig', [
            'controller_name' => 'LayoutController',
            'ultimos' => $ultimos,
        ]);
    }

    /**
     * @Route("/comentarios", name="comentarios")
     */
    public function getComentarios(EntityManagerInterface $entityManager, $max)
    {

        $comentarios = $entityManager->getRepository(GoogleReview::class)->findBy([], ['id' => 'DESC'], 5);
        return $this->render('layout/comentarios.html.twig', [
            'controller_name' => 'LayoutController',
            'comentarios' => $comentarios,
        ]);
    }

    /**
     * @Route("/politica-cookies", name="cookies")
    */
    public function cookies(EntityManagerInterface $entityManager) {
        $contacto = $entityManager->getRepository(Contacto::class)->findOneBy(['id' => 1]);
        $cookies = $entityManager->getRepository(Cookie::class)->findOneBy(['id' => 1]);
        return $this->render('partials/politicas.html.twig', [
            'controller_name' => 'LayoutController',
            'content' => $cookies,
            'flag' => 'politica_cookies',
            'contacto' => $contacto,
        ]);
    }

    /**
     * @Route("/aviso-legal", name="legal")
    */
    public function legal(EntityManagerInterface $entityManager) {
        $contacto = $entityManager->getRepository(Contacto::class)->findOneBy(['id' => 1]);
        $legal = $entityManager->getRepository(Legal::class)->findOneBy(['id' => 1]);
        return $this->render('partials/politicas.html.twig', [
            'controller_name' => 'LayoutController',
            'content' => $legal,
            'flag' => 'aviso_legal',
            'contacto' => $contacto,
        ]);
    }

    /**
     * @Route("/politica-privacidad", name="privacidad")
    */
    public function privacidad(EntityManagerInterface $entityManager) {
        $contacto = $entityManager->getRepository(Contacto::class)->findOneBy(['id' => 1]);
        $privacidad = $entityManager->getRepository(PoliticaPrivacidad::class)->findOneBy(['id' => 1]);
        return $this->render('partials/politicas.html.twig', [
            'controller_name' => 'LayoutController',
            'content' => $privacidad,
            'flag' => 'politica_privacidad',
            'contacto' => $contacto,
        ]);
    }
}
