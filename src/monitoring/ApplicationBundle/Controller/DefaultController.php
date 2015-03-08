<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationBundle:Default:index.html.twig');
    }

    public function liveAction()
    {
        return $this->render('ApplicationBundle:Default:live.html.twig');
    }
}
