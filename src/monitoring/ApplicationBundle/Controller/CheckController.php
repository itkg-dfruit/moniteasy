<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use monitoring\ApplicationBundle\Entity\checkUrl;
use monitoring\ApplicationBundle\Form\checkUrlType;
use Symfony\Component\HttpFoundation\Request;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class CheckController extends Controller
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
                ->add('success', 'Your checkUrl has been properly created !')
            ;

            return $this->redirect($this->generateUrl('backend_dashboard'));
        }

        return $this->render('ApplicationBundle:Check:createCheck.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function getCheckAction()
    {
        return $this->render('ApplicationBundle:Check:readCheck.html.twig');
    }

    public function getAllCheckAction()
    {
        return $this->render('ApplicationBundle:Check:readAllCheck.html.twig');
    }

    public function postCheckAction()
    {
        return $this->render('ApplicationBundle:Check:updateCheck.html.twig');
    }

    public function deleteCheckAction()
    {
        return $this->render('ApplicationBundle:Check:deleteCheck.html.twig');
    }
}