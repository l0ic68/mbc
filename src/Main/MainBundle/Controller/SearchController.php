<?php

namespace Main\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\MainBundle\Form\SearchType;

class SearchController extends Controller
{
    public function searchAction()
    {
        $form = $this->createForm(new SearchType());
        return $this->render('MainBundle:Search:search.html.twig', array('form' => $form -> createView()));
    }

    public function searchTreatAction()
    {
        $form = $this->createForm(new SearchType());

        if($this->get('request')->getMethod() == 'POST')
        {
            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $offres = $em->getRepository('MainBundle:Offres')->search($form['search']->getData());
        }
        else
        {
            throw $this->createNotFoundException('The page doesn\'t exist');
        }

        return $this->render('MainBundle:Default:Offres\offres.html.twig', array('offres' => $offres));
    }

}
