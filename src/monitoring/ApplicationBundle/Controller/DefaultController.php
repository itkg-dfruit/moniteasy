<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        return $this->render('ApplicationBundle:Default:live.html.twig');
    }

    public function notificationAction()
    {
        return $this->render('ApplicationBundle:Default:notification.html.twig');
    }

    public function accountAction()
    {
        return $this->render('ApplicationBundle:Default:account.html.twig');
    }

}
