<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use monitoring\ApplicationBundle\Entity\checkUrl;
use monitoring\ApplicationBundle\Form\checkUrlType;

use monitoring\ApplicationBundle\Entity\pingUrl;
use monitoring\ApplicationBundle\Form\pingUrlType;

use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class PingUrlController extends Controller
{

    //ping l'url
    public function pingUrlAction($idCheckUrl)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('ApplicationBundle:checkUrl')
        ;
        $checkUrl = $repository->find($idCheckUrl);

        if (!$checkUrl) {
            $this->get('session')->getFlashBag()->add('error', 'Error, your Check Url does not exist');
            return $this->redirect($this->generateUrl('backend_live'));
        }

        $options = array(
            'CURLOPT_FRESH_CONNECT'=> TRUE,
            'CURLOPT_TIMEOUT'=> $checkUrl->getTimeOut(),
            'CURLOPT_CONNECTTIMEOUT' => $checkUrl->getTimeOut(),
            'CURLOPT_SSL_VERIFYPEER' => FALSE,
            'CURLOPT_SSL_VERIFYHOST' => 0,
            'CURLOPT_FOLLOWLOCATION' => TRUE,
            'CURLOPT_RETURNTRANSFER' => TRUE,
            'CURLOPT_NOBODY' => TRUE,
            'CURLOPT_HEADER' => TRUE
        );

        $curl = $this->get('anchovy.curl')->setURL($checkUrl->getUrl())->setOptions($options);

        $headers = $curl->execute();
        $data = $curl->getInfo();

        //
        // rajouter Try catch pour eviter que symfony renvoie une erreur si internet ne marche pas ou que le serveur ne répond pas
        //

        // ici on va parser la reponse renvoyée par CURL ( à savoir les entêtes HTTP)
        $headerparsed = array();
        $lines = explode("\r\n", $headers);
        $header_idx = 0;
        foreach ($lines as $line)
        {
            if (preg_match('`^(?:(HTTP/[^\s]+)|([^:\s]+):) (.*)$`i', $line, $matches))
                $headerparsed[$header_idx][] = array(
                    'k' => $matches[1] ? $matches[1] : $matches[2],
                    'v' => $matches[3]
                );
            else
                $header_idx++;
        }
        // var_dump($headerparsed); die;

        // on set ping url avec les resultats de la reqquete curl et on les enregistres.
        $pingUrl = New pingUrl();

        $pingUrl->setPingDate(new \DateTime());
        $pingUrl->setResponse($headers);
        $pingUrl->setHttpCode($headerparsed[0][0]['v']);
        $pingUrl->setResponseTime($data['total_time']);
        $pingUrl->setCheckUrl($checkUrl);

        $em = $this->getDoctrine()->getManager();
        $em->persist($pingUrl);
        $em->flush();

        return $this->render('ApplicationBundle:PingUrl:result.html.twig', array('response' => $headers, 'time' => $data['total_time'], 'url' => $data['url']));




    }
    
    public function resultAction()
    {

    }
}