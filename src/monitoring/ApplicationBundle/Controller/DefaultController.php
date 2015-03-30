<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


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

    public function dashBoardAction()
    {
        return $this->render('ApplicationBundle:Default:live.html.twig');
    }

    public function resultAction()
    {
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

        return $this->render('ApplicationBundle:Default:result.html.twig', array('reponse' => $headers, 'time' => $infos['total_time'], 'url' => $infos['url']));

        //        $headerparsed = array();
//        $lines = explode("\r\n", $headers);
//        $header_idx = 0;
//        foreach ($lines as $line)
//        {
//            if (preg_match('`^(?:(HTTP/[^\s]+)|([^:\s]+):) (.*)$`i', $line, $matches))
//                $headerparsed[$header_idx][] = array(
//                    'k' => $matches[1] ? $matches[1] : $matches[2],
//                    'v' => $matches[3]
//                );
//            else
//                $header_idx++;
//        }
//        print_r($headerparsed); die;

    }

}
