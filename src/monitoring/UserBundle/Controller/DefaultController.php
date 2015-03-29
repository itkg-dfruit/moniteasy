<?php

namespace monitoring\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('monitoringUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
