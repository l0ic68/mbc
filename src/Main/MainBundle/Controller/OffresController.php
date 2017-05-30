<?php

namespace Main\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Main\MainBundle\Entity\Contact;
use Main\MainBundle\Entity\Offres;
use Main\MainBundle\Form\ContactType;
use Main\MainBundle\Form\OffreType;
use Main\MainBundle\Repository\OffresRepository;

class OffresController extends Controller
{
    public function offreAction()
    {
        return $this->render('MainBundle:Default:layout\offre.html.twig');
    }

    public function offresAction()
    {
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository('MainBundle:Offres')->findAll();
        return $this->render('MainBundle:Default:Offres\offres.html.twig',array("offres"=> $offres));
    }

    public function ajouterOffreAction()
    {
        return $this->render('MainBundle:Contact:contact.html.twig',array('form'=>$form->createView()));
    }

    public function searchOffresAction()
    {
        $request = $this->container->get('request');
        $text = $request->query->get('text');
        $em = $this->getDoctrine()->getManager();


            $offres = $em->getRepository('MainBundle:Offres')->findByLocation($text);

        if($offres == null)
        {
            $offres = $em->getRepository('MainBundle:Offres')->findAll();
        }
        $content = $this->RenderView('MainBundle:Default:Offres\searchOffres.html.twig', array(
            'offres' => $offres,
        ));

        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;
    }
}
