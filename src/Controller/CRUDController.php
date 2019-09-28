<?php

namespace App\Controller;

use Imagine\Image\ImageInterface;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Exception\LockException;
use Sonata\AdminBundle\Exception\ModelManagerException;
use Symfony\Bridge\Twig\AppVariable;
use Symfony\Bridge\Twig\Command\DebugCommand;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CRUDController extends Controller
{
    /**
     * Sets the admin form theme to form view. Used for compatibility between Symfony versions.
     */
    private function setFormTheme(FormView $formView, array $theme = null): void
    {
        $twig = $this->get('twig');

        // BC for Symfony < 3.2 where this runtime does not exists
        if (!method_exists(AppVariable::class, 'getToken')) {
            $twig->getExtension(FormExtension::class)->renderer->setTheme($formView, $theme);

            return;
        }

        // BC for Symfony < 3.4 where runtime should be TwigRenderer
        if (!method_exists(DebugCommand::class, 'getLoaderPaths')) {
            $twig->getRuntime(TwigRenderer::class)->setTheme($formView, $theme);

            return;
        }

        $twig->getRuntime(FormRenderer::class)->setTheme($formView, $theme);
    }

    /**
     * Edit action.
     *
     * @param int|string|null $id
     *
     * @throws NotFoundHttpException If the object does not exist
     * @throws \RuntimeException     If no editable field is defined
     * @throws AccessDeniedException If access is not granted
     *
     * @return Response|RedirectResponse
     */
    public function editAction($id = null)
    {
        $request = $this->getRequest();
        // the key used to lookup the template
        $templateKey = 'edit';

        $id = $request->get($this->admin->getIdParameter());
        $existingObject = $this->admin->getObject($id);

        if (!$existingObject) {
            throw $this->createNotFoundException(sprintf('unable to find the object with id: %s', $id));
        }

//        $this->checkParentChildAssociation($request, $existingObject);

        $this->admin->checkAccess('edit', $existingObject);

        $preResponse = $this->preEdit($request, $existingObject);
        if (null !== $preResponse) {
            return $preResponse;
        }

        $this->admin->setSubject($existingObject);
        $objectId = $this->admin->getNormalizedIdentifier($existingObject);

        $form = $this->admin->getForm();

        if (!\is_array($fields = $form->all()) || 0 === \count($fields)) {
            throw new \RuntimeException(
                'No editable field defined. Did you forget to implement the "configureFormFields" method?'
            );
        }

        $form->setData($existingObject);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
                $submittedObject = $form->getData();
                $this->admin->setSubject($submittedObject);


                try {
                    $uploads_directory = $this->getParameter('uploads_directory');

                    $files = $form['brochure']->getData();
                    if (count($files) > 0){
                        if ($existingObject->getFiles()){
                            $array_files = $existingObject->getFiles();
                        } else {
                            $array_files = [];
                        }
                        foreach ($files as $file){
                            if ($file instanceof UploadedFile){
                                $filename = md5(uniqid()).'.'.$file->guessExtension();
                                $file->move($uploads_directory, $filename);
                                array_push($array_files, $filename);
                            }
                        }
                        $existingObject->setFiles($array_files);
                    }


                    $existingObject = $this->admin->update($submittedObject);

                    if ($this->isXmlHttpRequest()) {
                        return $this->renderJson([
                            'result' => 'ok',
                            'objectId' => $objectId,
                            'objectName' => $this->escapeHtml($this->admin->toString($existingObject)),
                        ], 200, []);
                    }

                    $this->addFlash(
                        'sonata_flash_success',
                        $this->trans(
                            'flash_edit_success',
                            ['%name%' => $this->escapeHtml($this->admin->toString($existingObject))],
                            'SonataAdminBundle'
                        )
                    );

                    // redirect to edit mode
                    return $this->redirectTo($existingObject);
                } catch (ModelManagerException $e) {
                    $this->handleModelManagerException($e);

                    $isFormValid = false;
                } catch (LockException $e) {
                    $this->addFlash('sonata_flash_error', $this->trans('flash_lock_error', [
                        '%name%' => $this->escapeHtml($this->admin->toString($existingObject)),
                        '%link_start%' => '<a href="'.$this->admin->generateObjectUrl('edit', $existingObject).'">',
                        '%link_end%' => '</a>',
                    ], 'SonataAdminBundle'));
                }
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash(
                        'sonata_flash_error',
                        $this->trans(
                            'flash_edit_error',
                            ['%name%' => $this->escapeHtml($this->admin->toString($existingObject))],
                            'SonataAdminBundle'
                        )
                    );
                }
            } elseif ($this->isPreviewRequested()) {
                // enable the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            }
        }

        if ($existingObject->getFiles()){
            $array_brochures = [];
            foreach ($existingObject->getFiles() as $file){
                array_push($array_brochures , new File($this->getParameter('uploads_directory').'/'.$file));
            }
            $form['brochure']->setData($array_brochures);

        }


        $formView = $form->createView();
        // set the theme for the current Admin Form
        $this->setFormTheme($formView, $this->admin->getFormTheme());

        // NEXT_MAJOR: Remove this line and use commented line below it instead
        $template = $this->admin->getTemplate($templateKey);
        // $template = $this->templateRegistry->getTemplate($templateKey);

        return $this->renderWithExtraParams($template, [
            'action' => 'edit',
            'form' => $formView,
            'object' => $existingObject,
            'objectId' => $objectId,
        ], null);
    }

    /**
     * Create action.
     *
     * @throws AccessDeniedException If access is not granted
     * @throws \RuntimeException     If no editable field is defined
     *
     * @return Response
     */
    public function createAction()
    {
        $request = $this->getRequest();
        // the key used to lookup the template
        $templateKey = 'edit';

        $this->admin->checkAccess('create');

        $class = new \ReflectionClass($this->admin->hasActiveSubClass() ? $this->admin->getActiveSubClass() : $this->admin->getClass());

        if ($class->isAbstract()) {
            return $this->renderWithExtraParams(
                '@SonataAdmin/CRUD/select_subclass.html.twig',
                [
                    'base_template' => $this->getBaseTemplate(),
                    'admin' => $this->admin,
                    'action' => 'create',
                ],
                null
            );
        }

        $newObject = $this->admin->getNewInstance();

        $preResponse = $this->preCreate($request, $newObject);
        if (null !== $preResponse) {
            return $preResponse;
        }

        $this->admin->setSubject($newObject);

        $form = $this->admin->getForm();

        if (!\is_array($fields = $form->all()) || 0 === \count($fields)) {
            throw new \RuntimeException(
                'No editable field defined. Did you forget to implement the "configureFormFields" method?'
            );
        }

        $form->setData($newObject);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
                $submittedObject = $form->getData();
                $this->admin->setSubject($submittedObject);
                $this->admin->checkAccess('create', $submittedObject);

                try {

                    $uploads_directory = $this->getParameter('uploads_directory');

                    $files = $form['brochure']->getData();
                    if (count($files) > 0){
                        $array_files = [];
                        foreach ($files as $file){
                            if ($file instanceof UploadedFile){
                                $filename = md5(uniqid()).'.'.$file->guessExtension();
                                $file->move($uploads_directory, $filename);
                                array_push($array_files, $filename);
                            }
                        }
                        $submittedObject->setFiles($array_files);
                    }

                    $newObject = $this->admin->create($submittedObject);

                    if ($this->isXmlHttpRequest()) {
                        return $this->renderJson([
                            'result' => 'ok',
                            'objectId' => $this->admin->getNormalizedIdentifier($newObject),
                            'objectName' => $this->escapeHtml($this->admin->toString($newObject)),
                        ], 200, []);
                    }

                    $this->addFlash(
                        'sonata_flash_success',
                        $this->trans(
                            'flash_create_success',
                            ['%name%' => $this->escapeHtml($this->admin->toString($newObject))],
                            'SonataAdminBundle'
                        )
                    );

                    // redirect to edit mode
                    return $this->redirectTo($newObject);
                } catch (ModelManagerException $e) {
                    $this->handleModelManagerException($e);

                    $isFormValid = false;
                }
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash(
                        'sonata_flash_error',
                        $this->trans(
                            'flash_create_error',
                            ['%name%' => $this->escapeHtml($this->admin->toString($newObject))],
                            'SonataAdminBundle'
                        )
                    );
                }
            } elseif ($this->isPreviewRequested()) {
                // pick the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            }
        }

        $formView = $form->createView();
        // set the theme for the current Admin Form
        $this->setFormTheme($formView, $this->admin->getFormTheme());

        // NEXT_MAJOR: Remove this line and use commented line below it instead
        $template = $this->admin->getTemplate($templateKey);
        // $template = $this->templateRegistry->getTemplate($templateKey);

        return $this->renderWithExtraParams($template, [
            'action' => 'create',
            'form' => $formView,
            'object' => $newObject,
            'objectId' => null,
        ], null);
    }

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
