<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class DefaultController extends Controller
{

    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method",
     * )
     */
    public function indexAction()
    {
        return $this->render('ApplicationBundle:Default:index.html.twig');
    }

    public function liveAction()
    {
        return $this->render('ApplicationBundle:Default:live.html.twig');
    }

    public function testAction()
    {
        return $this->render('ApplicationBundle:Default:test.html.twig');
    }


    /**
     * curl the given url and return http header and time reponse of request
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method",
     * )
     */
    public function processAction()
    {
        $url = $_POST['url'];

//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
//        $output = curl_exec($ch);

        $timeout = 10;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        if (preg_match('`^https://`i', $url))
        {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        }

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);

        curl_setopt($ch, CURLOPT_HEADER, true);

        $headers = curl_exec($ch);
        $info = curl_getinfo($ch);

        $time = $info['total_time'];
        $urlCible = $info['url'];
        curl_close($ch);

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

        //print_r($headerparsed); die;

        return $this->render('ApplicationBundle:Default:result.html.twig', array('reponse' => $headers, 'time' => $time, 'url' => $urlCible));
    }

}
