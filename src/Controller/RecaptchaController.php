<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RecaptchaController extends AbstractController
{
    /**
     * @Route("/ajax-recaptcha", name="ajax_recaptcha")
     * @Method("POST")
     */
    public function verifyRecaptcha(Request $request)
    {
        $token = $request->request->get('data_array');
        $data = array(
            'secret' => "6LfBSHYUAAAAAGXtnLFqUWjcg0qR0pvWAp7x82bY",
            'response' => $token
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
//        dump($response);
        return new JsonResponse($response,200);
    }
}