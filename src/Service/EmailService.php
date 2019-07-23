<?php

namespace App\Service;


use Psr\Container\ContainerInterface;

class EmailService
{
    public function __construct(\Swift_Mailer $mailer, ContainerInterface $container)
    {
        $this->mailer = $mailer;
        $this->container = $container;
    }
    public function sendEmail($view, $subject, $from, $to, $data)
    {
        try{
            $message = (new \Swift_Message())
                ->setSubject($subject)
                ->setFrom($from)
                ->setTo($to)
                ->setBody(
                    $this->container->get('templating')->render(
                        $view, array(
                            'datos' => $data
                        )
                    ),
                    'text/html'
                );
            $this->container->get('mailer')->send($message);
            $status = 'success';
        } catch (\Exception $exception){
            $status = 'error';
        }

        return $status;
    }
}