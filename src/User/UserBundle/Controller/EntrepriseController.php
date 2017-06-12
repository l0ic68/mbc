<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use User\UserBundle\Entity\Candidat;
use User\UserBundle\Form\CandidatType;
use User\UserBundle\Entity\Entreprise;
use User\UserBundle\Form\EntrepriseType;
use Symfony\Component\HttpFoundation\Request;

class EntrepriseController extends Controller
{
    /*public function candidatAction(Request $request)
    {
        $candidat = new Candidat();
        $type = $request->query->get('id');
        $em =  $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($type);
        $form = $this->createForm(new CandidatType(), $candidat);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // On l'enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $user->setCandidat($candidat);
            $em->persist($user);
            $em->persist($candidat);
            $em->flush();
            return $this->redirectToRoute('main_homepage');
        }
        return $this->render('UserBundle:Default:layout\candidat.html.twig',array('form'=>$form->createView()));
    }*/


    public function pugxEntrepriseAction(Request $request)
    {
        /*$entreprise = new Entreprise();
        $type = $request->query->get('id');
        $em =  $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($type);
        $form = $this->createForm(new EntrepriseType(), $entreprise);
        $form->handleRequest($request);*/
        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register('User\UserBundle\Entity\Entreprise');
    }

    public function entrepriseAction(Request $request)
    {
        $entreprise = new Entreprise();
        $em =  $this->getDoctrine()->getManager();
        if($request->query->get('id') != null)
        {
            $type = $request->query->get('id');
            $user = $em->getRepository('UserBundle:User')->find($type);
            $user->setEntreprise($entreprise);
            $em->persist($user);
        }


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
