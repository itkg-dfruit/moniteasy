<?php

namespace monitoring\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use monitoring\ApplicationBundle\Entity\contact;
use monitoring\ApplicationBundle\Form\contactType;
use Symfony\Component\HttpFoundation\Request;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class FrontController extends Controller
{

    public function homeAction()
    {
        $title = 'home';
        return $this->render('ApplicationBundle:Front:index.html.twig', array('title' => $title));
    }

    public function aboutAction()
    {
        $title = 'About Us';
        return $this->render('ApplicationBundle:Front:about.html.twig', array('title' => $title));
    }

    public function downloadAction()
    {
        $title = 'Download & Install';
        return $this->render('ApplicationBundle:Front:download.html.twig', array('title' => $title));
    }

    public function apidocAction()
    {
        $title = 'Use our Api';
        return $this->render('ApplicationBundle:Front:apidoc.html.twig', array('title' => $title));
    }

    public function contactAction(Request $request)
    {
        $title = 'Contact Us';

        $contact = new contact();
        $form = $this->createForm(new contactType(), $contact);

        $form->handleRequest($request);
        if ($form->isValid()) {

            $message = \Swift_Message::newInstance()
                ->setSubject('Contact Message from MonitEasy')
                ->setFrom('gauvin.thibaut83@gmail.com')
                ->setTo('arkezis@hotmail.fr')
                ->setBody($this->renderView('ApplicationBundle:Front:email.txt.twig', array('contact' => $contact)));
            $this->get('mailer')->send($message);

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Your Message has been successfully send')
            ;

            return $this->redirect($this->generateUrl('front_contact'));
        }

        return $this->render('ApplicationBundle:Front:contact.html.twig', array(
            'form' => $form->createView(), 'title' => $title
        ));

    }

    public function signInAction()
    {
        return $this->redirect($this->generateUrl('fos_user_security_login'));
    }

    public function signUpAction()
    {
//        parent::
        return $this->redirect($this->generateUrl('fos_user_registration_register'));
    }

}
