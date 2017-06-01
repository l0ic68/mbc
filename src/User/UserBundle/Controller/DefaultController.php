<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use User\UserBundle\Entity\Candidat;
use User\UserBundle\Form\CandidatType;
use User\UserBundle\Entity\Entreprise;
use User\UserBundle\Form\EntrepriseType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function candidatAction(Request $request)
    {
        $candidat = new Candidat();
        $form = $this->createForm(new CandidatType(), $candidat);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // On l'enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidat);
            $em->flush();
            return $this->redirectToRoute('main_homepage');
        }
        return $this->render('UserBundle:Default:layout\candidat.html.twig',array('form'=>$form->createView()));
    }

    public function entrepriseAction(Request $request)
    {
        $entreprise = new Entreprise();
        $form = $this->createForm(new EntrepriseType(), $entreprise);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // On l'enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $em->persist($entreprise);
            $em->flush();
            return $this->redirectToRoute('main_homepage');
        }
        return $this->render('UserBundle:Default:layout\entreprise.html.twig',array('form'=>$form->createView()));
    }
}
