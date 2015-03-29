<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use monitoring\ApplicationBundle\Entity\checkUrl;
use monitoring\ApplicationBundle\Form\checkUrlType;
use Symfony\Component\HttpFoundation\Request;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class checkController extends Controller
{
//    public function getCheckAction() {
//
//    }
//
//    public function getAllCheckAction() {
//
//    }

    public function createCheckAction(Request $request)
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

//    public function updateCheckAction() {
//
//    }
//
//    public function deleteCheckAction() {
//
//    }
}