<?php

namespace Main\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Main\MainBundle\Entity\Contact;
use User\UserBundle\Entity\Candidat;
use User\UserBundle\Entity\Entreprise;
use Main\MainBundle\Entity\Comments;
use Main\MainBundle\Entity\Offres;
use Main\MainBundle\Form\ContactType;
use Main\MainBundle\Form\OffreType;
use Main\MainBundle\Form\MediaType;
use Main\MainBundle\Repository\OffresRepository;
use Main\MainBundle\Repository\CommentsRepository;

class OffresController extends Controller
{
    public function offreAction($id)
    {
        /*$em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository('MainBundle:Offres')->find($id);
        return $this->render('MainBundle:Default:layout\offre.html.twig');*/
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('MainBundle:Offres')->find($id);
        $comments = $em->getRepository('MainBundle:Comments')->findByOffre($id);

        $price = $offre->getPrice();
        $offre->setPrice($price + 1);
        $em->persist($offre);
        $em->flush();
        $medias = $em->getRepository('MainBundle:Offres')->findByMedia($id);
        $form = $this->createForm(new OffreType());
        $form_Media = $this->createForm(new MediaType());
        $users = $em->getRepository('MainBundle:Comments')->findByOffre($id);
        $commentDone = 0;
        foreach ($users as $userC){
            if($userC->getCandidat() != null)
            {
                if($userC->getCandidat() == $user)
                {
                    $commentDone = 1;
                    $value =  $em->getRepository('MainBundle:Comments')->findOneByCandidat($user);
                    return $this->render('MainBundle:Default:Offres\offre.html.twig', array(
                        "offre"=> $offre,
                        'form'=>$form->createView(),
                        "medias"=>$medias,
                        'form_Media'=>$form_Media->createView(),
                        'comments'=> $comments,
                        'value'=>$value,
                        'commentDone'=>$commentDone));
                }
            }
            else if($userC->getEntreprise() != null)
            {
                if($userC->getEntreprise() == $user)
                {
                    $commentDone = 1;
                    $value =  $em->getRepository('MainBundle:Comments')->findOneByEntreprise($userC);
                    var_dump($value);
                    return $this->render('MainBundle:Default:Offres\offre.html.twig', array(
                        "offre"=> $offre,
                        'form'=>$form->createView(),
                        "medias"=>$medias,
                        'form_Media'=>$form_Media->createView(),
                        'comments'=> $comments,
                        'value'=>$value,
                        'commentDone'=>$commentDone));
                }
            }
        }
        return $this->render('MainBundle:Default:Offres\offre.html.twig',array(
            "offre"=> $offre,
            'form'=>$form->createView(),
            "medias"=>$medias,
            'form_Media'=>$form_Media->createView(),
            'comments'=> $comments,
            'commentDone'=>$commentDone));
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
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if( $user != "anon.") {
            $request = $this->container->get('request');
            $id = $request->query->get('id');
            $commentSite = $request->query->get('comment');
            $avis = $request->query->get('avis');

            $em = $this->getDoctrine()->getManager();
            $offre = $em->getRepository('MainBundle:Offres')->findOneById($id);
            $users = $em->getRepository('MainBundle:Comments')->findByOffre($id);
            $comment = new Comments();
            $comment->setComment($commentSite);
            $comment->setOffre($offre);
            $comment->setDateComment(new \DateTime("now"), new \DateTimeZone('Europe/Paris'));
            $comment->setAvis($avis);
            if($user instanceof Entreprise)
            {
                $comment->setEntreprise($user);
            }
            if($user instanceof Candidat)
            {
                $comment->setCandidat($user);
            }
            $em->persist($comment);
            $em->flush();
            $comments = $em->getRepository('MainBundle:Comments')->findByOffre($id);
            $commentDone = 1;
            $value =$commentSite;
            $content = $this->RenderView('MainBundle:Default:Offres\commentOffre.html.twig', array(
                'offre' => $offre,
                'comments'=>$comments,
                'commentDone'=>$commentDone,
                'value'=>$value,
            ));
            $response = new JsonResponse();
            $response->setData(array('classifiedList' => $content));
            return $response;
        }
    }
    public function commentModifAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if( $user != "anon.") {
            $request = $this->container->get('request');
            $id = $request->query->get('id');
            $commentSite = $request->query->get('comment');
            $avis = $request->query->get('avis');

            $em = $this->getDoctrine()->getManager();
            $offre = $em->getRepository('MainBundle:Offres')->findOneById($id);
            if($user instanceof Entreprise)
            {
                $commentModif = $em->getRepository('MainBundle:Comments')->findOneByEntreprise($user);
            }
            if($user instanceof Candidat)
            {
                $commentModif = $em->getRepository('MainBundle:Comments')->findOneByCandidat($user);
            }
            $commentModif->setComment($commentSite);
            $commentModif->setDateComment(new \DateTime("now"), new \DateTimeZone('Europe/Paris'));
            $commentModif->setAvis($avis);

            $em->persist($commentModif);
            $em->flush();
            $value = $commentSite;
            $commentDone = 1;
            $comments = $em->getRepository('MainBundle:Comments')->findByOffre($id);
            $content = $this->RenderView('MainBundle:Default:Offres\commentOffre.html.twig', array(
                'offre' => $offre,
                'comments'=>$comments,
                'commentDone'=>$commentDone,
                'value'=>$value,
            ));
            $response = new JsonResponse();
            $response->setData(array('classifiedList' => $content));
            return $response;
        }
    }
}
