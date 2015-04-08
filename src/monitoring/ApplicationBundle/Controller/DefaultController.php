<?php

namespace monitoring\ApplicationBundle\Controller;

use monitoring\ApplicationBundle\Entity\contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use monitoring\ApplicationBundle\Entity\checkUrl;
use monitoring\ApplicationBundle\Form\checkUrlType;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class DefaultController extends Controller
{

    public function homeAction()
    {
        return $this->render('ApplicationBundle:Default:index.html.twig');
    }

    public function liveAction()
    {
        return $this->render('ApplicationBundle:Default:live.html.twig');
    }

    public function dashBoardAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('ApplicationBundle:checkUrl')
        ;
        $checkUrls = $repository->findAll();

        return $this->render('ApplicationBundle:Default:live.html.twig', array('data' => $checkUrls));
    }

    public function notificationAction()
    {
        return $this->render('ApplicationBundle:Default:notification.html.twig');
    }

    public function accountAction()
    {
        return $this->render('ApplicationBundle:Default:account.html.twig');
    }

    public function thibautTestAction()
    {
        $contact = new contact();
        $contact->setName('thibaut');
        $contact->setEmail('arkezis@hotmail.fr');
        $contact->setPhone('0628037676');
        $contact->setMessage('coucou thibaut gauvin salut je voulais savoir plein de chose je sais pas trop quoi mais faut que j\'ecrive des mots pour faire de putin de test de merde');

        return $this->render('ApplicationBundle:Front:email.txt.twig', array('contact' => $contact));
    }

}
