<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @\Symfony\Component\Routing\Annotation\Route("admin/sonata/ajax-remove-image", name="ajax_remove_image")
     */
    public function removeImage(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->query->get('data_array'));
        $automovil = $em->getRepository('App:Automovil')->find($data->dataAuto);

        $array_files = $automovil->getFiles();
        $index = array_search($data->dataImage,$array_files);
        if($index !== FALSE){
            try {
                unset($array_files[$index]);
                $automovil->setFiles($array_files);
                $em->flush();
            } catch (\Exception $exception){
                return new Response('error', 400);
            }
        }
        return new Response('success', 200);
    }
}