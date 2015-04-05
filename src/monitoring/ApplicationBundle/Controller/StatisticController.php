<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use monitoring\ApplicationBundle\Entity\checkUrl;
use monitoring\ApplicationBundle\Form\checkUrlType;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class StatisticController extends Controller
{

    public function getStatisticAction($idCheckUrl)
    {
        //trouver comment recuperer toute les statistiques liée a un chek url
        // find->pingUrl->id_checkUrl

        // return $this->render('ApplicationBundle:Default:live.html.twig', array('data' => $checkUrls));

        // return $this->render('ApplicationBundle:Default:index.html.twig');
    }

}
