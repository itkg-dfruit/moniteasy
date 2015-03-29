<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class FrontController extends Controller
{

    public function homeAction()
    {
        return $this->render('ApplicationBundle:Front:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('ApplicationBundle:Front:about.html.twig');
    }

    public function downloadAction()
    {
        return $this->render('ApplicationBundle:Front:download.html.twig');
    }

    public function apidocAction()
    {
        return $this->render('ApplicationBundle:Front:apidoc.html.twig');
    }

    public function contactAction()
    {
        return $this->render('ApplicationBundle:Front:contact.html.twig');
    }

    public function signInAction()
    {
        return $this->render('ApplicationBundle:Front:signIn.html.twig');
    }

    public function signUpAction()
    {
        return $this->render('ApplicationBundle:Front:signUp.html.twig');
    }

}
