<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use monitoring\ApplicationBundle\Entity\checkUrl;
use monitoring\ApplicationBundle\Form\checkUrlType;
use Symfony\Component\HttpFoundation\Request;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class pingCronController extends Controller
{

    public function postCheckAction() {
        $url = $_POST['url'];

        $timeout = 10;

        $options = array(
            'CURLOPT_FRESH_CONNECT'=> TRUE,
            'CURLOPT_TIMEOUT'=> $timeout,
            'CURLOPT_CONNECTTIMEOUT' => $timeout,
            'CURLOPT_SSL_VERIFYPEER' => FALSE,
            'CURLOPT_SSL_VERIFYHOST' => 0,
            'CURLOPT_FOLLOWLOCATION' => TRUE,
            'CURLOPT_RETURNTRANSFER' => TRUE,
            'CURLOPT_NOBODY' => TRUE,
            'CURLOPT_HEADER' => TRUE
        );

        $curl = $this->get('anchovy.curl')->setURL($url)->setOptions($options);

        $headers = $curl->execute();
        $infos = $curl->getInfo();

        return $this->render('ApplicationBundle:Check:result.html.twig', array('reponse' => $headers, 'time' => $infos['total_time'], 'url' => $infos['url']));
    }

}