<?php

namespace Main\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\MainBundle\Entity\Contact;
use Main\MainBundle\Entity\Enquiry;
use Main\MainBundle\Form\ContactType;
use Main\MainBundle\Form\EnquiryType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tips = $em->getRepository('MainBundle:Tips')->findAll();
        return $this->render('MainBundle:Default:layout\index.html.twig',array('tips'=>$tips));
    }
    public function accueilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tips = $em->getRepository('MainBundle:Tips')->findAll();
        return $this->render('MainBundle:Default:layout\index.html.twig',array('tips'=>$tips));
    }
    public function mentions_legalesAction()
    {
        return $this->render('MainBundle:Default:mentions_legales.html.twig');
    }
    public function contactAction()
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact Test')
                    ->setFrom('enquiries@symblog.co.uk')
                    ->setTo('tnpcclqp@gmail.com')
                    ->setBody($this->renderView('MainBundle:Contact:contactEmail.txt.twig', array('contact' => $contact)));
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->Add('notice', 'Your contact enquiry was successfully sent. Thank you!');


                return $this->redirect($this->generateUrl('contact'));
            }
        }

        return $this->render('MainBundle:Contact:contact.html.twig',array('form'=>$form->createView()));
    }

    public function enquiryAction($id, Request $request)
    {
        $enquiry = new Enquiry();
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new EnquiryType(), $enquiry);
        //$form = $this->get('form.factory')->create(new EnquiryType(), array( 'author' => $id));
        dump((string) $form->getErrors(true));
        dump($user);
        dump($form);
        dump($form->isValid());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $enquiry->setAuthor($id);
            $em->persist($enquiry);
            $em->flush();
            return $this->redirect($this->generateUrl('main_homepage'));
            }
        


        

        return $this->render('MainBundle:Contact:enquiry.html.twig',array('form'=>$form->createView(),"user"=> $user));
    }

    public function retourAction($id)
    {
        /*$em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $offres = $em->getRepository('MainBundle:Offres')->findAll();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('@FOSUser/Profile/show.html.twig', array(
            'user' => $user,
            'offres' => $offres
        ));*/

        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $enquiries = $em->getRepository('MainBundle:Enquiry')->findAll();
        
                    
                    return $this->render('MainBundle:Default:mailbox.html.twig',array(
            "enquiries"=> $enquiries,
            "user"=>$user));
    
                
    }
}
