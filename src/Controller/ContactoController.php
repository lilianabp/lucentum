<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contacto;
use App\Entity\Contact;
use App\Entity\DatosEmpresa;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactoController extends AbstractController
{
    /**
     * @Route("/contacto", name="contacto")
     */
    public function index(Request $request, EntityManagerInterface $entityManager)
    {
    	$content = $entityManager->getRepository(Contacto::class)->findOneBy(['id' => 1]);
    	$datos = $entityManager->getRepository(DatosEmpresa::class)->findOneBy(['id' => 1]);
    	$form = $this->createForm(ContactType::class);

        return $this->render('contacto/index.html.twig', [
        	'content' => $content,
        	'datos' => $datos,
        	'form' => $form->createView(),
            'controller_name' => 'ContactoController',
        ]);
    }

    /**
     * @Route("/send", name="sendContact")
     */
    public function sendContact(Request $request, EntityManagerInterface $entityManager)
    {
    	$contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        $status = "error";
        $message = "";
        if ($form->isSubmitted() && $form->isValid()) {
	        $entityManager->persist($contact);
	        try {
	            $entityManager->flush();
	            $status = "success";
	            $message = "Contacto enviado con éxito";
	        } catch (\Exception $e) {
	                $message = $e->getMessage();
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
