<?php

namespace Main\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Main\MainBundle\Entity\Contact;
use Main\MainBundle\Entity\Comments;
use Main\MainBundle\Entity\Offres;
use Main\MainBundle\Form\ContactType;
use Main\MainBundle\Form\OffreType;
use Main\MainBundle\Form\MediaType;
use Main\MainBundle\Repository\OffresRepository;

class OffresController extends Controller
{
    public function offreAction($id)
    {
        /*$em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository('MainBundle:Offres')->find($id);
        return $this->render('MainBundle:Default:layout\offre.html.twig');*/

        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('MainBundle:Offres')->find($id);
        $medias = $em->getRepository('MainBundle:Offres')->findByMedia($id);
        $form = $this->createForm(new OffreType());
        $form_Media = $this->createForm(new MediaType());

        return $this->render('MainBundle:Default:Offres\offre.html.twig',array("offre"=> $offre,'form'=>$form->createView(),"medias"=>$medias,'form_Media'=>$form_Media->createView()));
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
    public function commentAction()
    {
        $request = $this->container->get('request');
        $id = $request->query->get('id');
        $commentSite = $request->query->get('comment');

        $em = $this->getDoctrine()->getManager();
		$offre = $em->getRepository('MainBundle:Offres')->findOneById($id);
        $comment = new Comments();
        $comment->setComment($commentSite);
        $comment->setDateComment(new \DateTime("now"), new \DateTimeZone('Europe/Paris'));
		$offre->addCommentaire($comment);
		$em->persist($offre);
        $em->flush();

        $content = $this->RenderView('MainBundle:Default:Offres\commentOffre.html.twig', array(
            'offre' => $offre,
        ));
        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;
    }
}
