<?php

namespace App\Controller;

use Mgilet\NotificationBundle\DependencyInjection\MgiletNotificationExtension;
use Mgilet\NotificationBundle\MgiletNotificationBundle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NotificationController extends Controller
{
    /**
     * @Route("/admin/send-notification", name="send_notification")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function sendNotification(Request $request)
    {
        $manager = $this->container->get('mgilet.notification');
        $notif = $manager->createNotification('Hello world !');
        $notif->setMessage('This a notification.');
        $notif->setLink('http://symfony.com/');

        $manager->addNotification(array($this->getUser()), $notif, true);

        return $this->redirectToRoute('sonata_admin_dashboard');
    }

    public function notifications(Request $request)
    {
        $manager = $this->container->get('mgilet.notification');
        $notif = $manager->getUnseenNotifications($this->getUser());

        return $this->render('Block/notifications.html.twig' , array(
            'notificationList' => $notif
        ));
    }
}
