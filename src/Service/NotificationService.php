<?php

namespace App\Service;


use Psr\Container\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class NotificationService
{
    public function __construct(ContainerInterface $container, TokenStorage $token_storage)
    {
        $this->container = $container;
        $this->token_storage= $token_storage;
    }
    public function sendNotification()
    {
        try{
            $manager = $this->container->get('mgilet.notification');
            $notif = $manager->createNotification('Hello world !');
            $notif->setMessage('This a notification.');
            $notif->setLink('http://symfony.com/');

            $manager->addNotification(array($this->token_storage->getToken()->getUser()), $notif, true);

            return true;
        } catch (\Exception $exception){
            return 'Error en notificación: '.$exception->getMessage();
        }
    }
}
