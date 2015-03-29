<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class FrontController extends Controller
{

    public function homeAction()
    {
        $title = 'home';
        return $this->render('ApplicationBundle:Front:index.html.twig', array('title' => $title));
    }

    public function aboutAction()
    {
        $title = 'About Us';
        return $this->render('ApplicationBundle:Front:about.html.twig', array('title' => $title));
    }

    public function downloadAction()
    {
        $title = 'Download & Install';
        return $this->render('ApplicationBundle:Front:download.html.twig', array('title' => $title));
    }

    public function apidocAction()
    {
        $title = 'Use our Api';
        return $this->render('ApplicationBundle:Front:apidoc.html.twig', array('title' => $title));
    }

    public function contactAction()
    {
        $title = 'Contact Us';
        return $this->render('ApplicationBundle:Front:contact.html.twig', array('title' => $title));
    }

    public function signInAction()
    {
        $title = 'Sign In';
        return $this->render('ApplicationBundle:Front:signIn.html.twig', array('title' => $title));
    }

    public function signUpAction()
    {
        $title = 'Sign Up';
        return $this->render('ApplicationBundle:Front:signUp.html.twig', array('title' => $title));
    }

}
