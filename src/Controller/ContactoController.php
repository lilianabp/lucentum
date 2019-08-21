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
use App\Service\EmailService;

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
    public function sendContact(Request $request, EntityManagerInterface $entityManager, EmailService $emailService)
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
                $sendEmail = $emailService->sendEmail('email/email_contact.html.twig', 'Has recibido una consulta', 'testdinamic51@gmail.com', 'automovileslucentum@gmail.com', $contact);
                if ($sendEmail == 'success') {
                    $message = "Contacto enviado con éxito";
                    $status = "success";
                } else {
                    $status = 'error';
                    $message = 'Ha ocurrido un error al enviar su consulta';
                }
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
