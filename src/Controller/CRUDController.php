<?php

namespace App\Controller;

use App\Service\EmailService;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\Request;

class CRUDController extends Controller
{
    /**
     * @param $id
     */
    public function activeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $object = $this->admin->getObject($id);
        $class = $this->admin->getBaseCodeRoute();
        $entity = explode(".", $class);
        if ($object->getActive() == 0) {
            $object->setActive(1);
            $em->flush();
        } elseif ($object->getActive() == 1) {
            $object->setActive(0);
            $em->flush();
        }

        return $this->redirectToRoute('admin_app_' . $entity[1] . '_list');
    }

    /**
     * @param $id
     */
    public function publicAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $object = $this->admin->getObject($id);
        $class = $this->admin->getBaseCodeRoute();
        $entity = explode(".", $class);
        if ($object->getPublic() == 0) {
            $object->setPublic(1);
            $em->flush();
        } elseif ($object->getPublic() == 1) {
            $object->setPublic(0);
            $em->flush();
        }

        return $this->redirectToRoute('admin_app_' . $entity[1] . '_list');
    }

    /**
     * @param $id
     */
    public function popularAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $object = $this->admin->getObject($id);
        $class = $this->admin->getBaseCodeRoute();
        $entity = explode(".", $class);
        if ($object->getPopular() == 0) {
            $object->setPopular(1);
            $em->flush();
        } elseif ($object->getPopular() == 1) {
            $object->setPopular(0);
            $em->flush();
        }

        return $this->redirectToRoute('admin_app_' . $entity[1] . '_list');
    }


//    /**
//     * @param $id
//     */
//    public function downloadAction($id)
//    {
//        $pdf = $this->getDoctrine()->getRepository('App:Ebook')->find($id);
//        $pdfPath = 'uploads/pdf/'.$pdf->getPdfPath();
//
//        return $this->file($pdfPath);
//    }

//    /**
//     * @param $id
//     */
//    public function responseAction(Request $request, EmailService $emailService, $id)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $consultation = $this->getDoctrine()->getRepository('App:Consultation')->find($id);
//        $form = $this->createForm(ResponseType::class, $consultation);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            try{
//                $consultation->setResponse($consultation->getResponse());
//                $em->persist($consultation);
//                $em->flush();
//                $this->get('session')->getFlashBag()->set('success', 'Respuesta enviada con éxito');
////                return $this->redirectToRoute('admin_app_consultation_list');
//            } catch (\Swift_SwiftException $e) {
//                $this->get('session')->getFlashBag()->set('error', 'Ha ocurrido un error al enviar su respuesta');
//            }
//
//            $sendEmail = $emailService->sendEmail('email/email_response.html.twig','Respuesta a consulta Benuren', '', $consultation->getEmail(), $consultation);
//            if ($sendEmail == 'success'){
//                $this->get('session')->getFlashBag()->set('success', 'Respuesta enviada con éxito');
//            } else {
//                $this->get('session')->getFlashBag()->set('error', 'Ha ocurrido un error al enviar su respuesta');
//            }
//            return $this->redirectToRoute('admin_app_consultation_list');
//        }
//
//        return $this->render('response/form.html.twig', [
//            'consultation' => $consultation,
//            'form_response' => $form->createView()
//        ]);
//    }
}
