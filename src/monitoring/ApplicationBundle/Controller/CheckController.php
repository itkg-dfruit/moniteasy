<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use monitoring\ApplicationBundle\Entity\checkUrl;
use monitoring\ApplicationBundle\Form\checkUrlType;
use Symfony\Component\HttpFoundation\Request;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class checkController extends Controller
{
    public function putCheckAction(Request $request)
    {
        $checkUrl = new checkUrl();
        $form = $this->createForm(new checkUrlType(), $checkUrl);

        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($checkUrl);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Welcome to the Death Star, have a magical day!')
            ;

            return $this->redirect($this->generateUrl('application_live'));
        }

        return $this->render('ApplicationBundle:Check:createCheck.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function getCheckAction() {

    }

    public function getAllCheckAction() {

    }

    public function postCheckAction() {
//        $url = $_POST['url'];
//
//        $timeout = 10;
//
//        $options = array(
//            'CURLOPT_FRESH_CONNECT'=> TRUE,
//            'CURLOPT_TIMEOUT'=> $timeout,
//            'CURLOPT_CONNECTTIMEOUT' => $timeout,
//            'CURLOPT_SSL_VERIFYPEER' => FALSE,
//            'CURLOPT_SSL_VERIFYHOST' => 0,
//            'CURLOPT_FOLLOWLOCATION' => TRUE,
//            'CURLOPT_RETURNTRANSFER' => TRUE,
//            'CURLOPT_NOBODY' => TRUE,
//            'CURLOPT_HEADER' => TRUE
//        );
//
//        $curl = $this->get('anchovy.curl')->setURL($url)->setOptions($options);
//
//        $headers = $curl->execute();
//        $infos = $curl->getInfo();
//
//        return $this->render('ApplicationBundle:Check:result.html.twig', array('reponse' => $headers, 'time' => $infos['total_time'], 'url' => $infos['url']));
    }

    public function deleteCheckAction() {

    }
}