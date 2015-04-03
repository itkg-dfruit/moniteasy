<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use monitoring\ApplicationBundle\Entity\checkUrl;
use monitoring\ApplicationBundle\Form\checkUrlType;
use Symfony\Component\HttpFoundation\Request;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class CheckController extends Controller
{
    /**
     * Create a new Check Url
     *
     * @ApiDoc(
     *  description="create a new Check Url",
     *  input="monitoring\ApplicationBundle\Form\checkUrlType;",
     *  output="monitoring\ApplicationBundle\Entity\checkUrl"
     * )
     */
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

    /**
     * Get a given Check Url
     *
     * @ApiDoc(
     *  description="Get a given Check Url",
     *  input="monitoring\ApplicationBundle\Form\checkUrlType;",
     *  output="monitoring\ApplicationBundle\Entity\checkUrl"
     * )
     */
    public function getCheckAction($idCheckUrl)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('ApplicationBundle:checkUrl')
        ;

        $checkUrl = $repository->find($idCheckUrl);

        return $this->render('ApplicationBundle:Check:readCheck.html.twig', array(
            'checkUrl' => $checkUrl
        ));
    }

    /**
     * Get All registred Check Url
     *
     * @ApiDoc(
     *  description="Get all registered Check Url",
     *  input="monitoring\ApplicationBundle\Form\checkUrlType;",
     *  output="monitoring\ApplicationBundle\Entity\checkUrl"
     * )
     */
    public function getAllCheckAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('ApplicationBundle:checkUrl')
        ;

        $checkUrl = $repository->findAll();

        return $this->render('ApplicationBundle:Check:readAllCheck.html.twig', array('data' => $checkUrl));
    }

    public function postCheckAction($idCheckUrl, Request $request)
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
        $id = $checkUrl->getId();

        $form = $this->createForm(new checkUrlType(), $checkUrl);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($checkUrl);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Your checkUrl has been properly updated !')
            ;

            return $this->redirect($this->generateUrl('backend_live'));
        }

        return $this->render('ApplicationBundle:Check:updateCheck.html.twig', array(
            'form' => $form->createView(), 'id' => $id
        ));
    }

    public function deleteCheckAction($idCheckUrl)
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
        else {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($checkUrl);
            $manager->flush();

            $this->get('session')->getFlashBag()->add('success', 'Your checkUrl has been properly deleted');
            return $this->redirect($this->generateUrl('backend_live'));
        }
    }
}