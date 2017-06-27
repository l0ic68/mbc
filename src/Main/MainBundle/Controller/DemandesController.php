<?php

namespace Main\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Main\MainBundle\Entity\Contact;
use User\UserBundle\Entity\Candidat;
use User\UserBundle\Entity\Entreprise;
use Main\MainBundle\Entity\Comments;
use Main\MainBundle\Entity\Demandes;
use Main\MainBundle\Form\ContactType;
use Main\MainBundle\Form\DemandesType;
use Main\MainBundle\Form\MediaType;
use Main\MainBundle\Repository\DemandesRepository;
use Main\MainBundle\Repository\CommentsRepository;

class DemandesController extends Controller
{
    public function demandeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository('MainBundle:Demandes')->find($id);
        $price = $demande->getPrice();
        $demande->setPrice($price + 1);
        
        $em->persist($demande);
        $em->flush();
        $medias = $em->getRepository('MainBundle:Demandes')->findByMedia($id);
        $user = $this->getUser();
        $form = $this->createForm(new DemandesType());
        $form_Media = $this->createForm(new MediaType());

        return $this->render('MainBundle:Default:Demandes\demande.html.twig',array("demande"=> $demande,'form'=>$form->createView(),"medias"=>$medias,'form_Media'=>$form_Media->createView(),"user"=> $user));
    }

    public function demandesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $demandes = $em->getRepository('MainBundle:Demandes')->findAll();
        $user = $this->getUser();
        return $this->render('MainBundle:Default:Demandes\demandes.html.twig',array("demandes"=> $demandes,"user"=> $user));
    }

    public function ajouterDemandeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $demande = new Demandes();
        $form= $this->createForm(new DemandeType(),$demande);
        return $this->render('MainBundle:Default:Demandes\add_demandes.html.twig',array('form'=>$form->createView()));
    }

    public function searchDemandesAction()
    {
        $request = $this->container->get('request');
        $text = $request->query->get('text');
        $em = $this->getDoctrine()->getManager();


            $demandes = $em->getRepository('MainBundle:Demandes')->findByLocation($text);

        if($demandes == null)
        {
            $demandes = $em->getRepository('MainBundle:Demandes')->findAll();
        }
        $content = $this->RenderView('MainBundle:Default:Demandes\searchDemandes.html.twig', array(
            'demandes' => $demandes,
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
            $demande = $em->getRepository('MainBundle:Demandes')->findOneById($id);
            $users = $em->getRepository('MainBundle:Comments')->findByDemande($id);
            $comment = new Comments();
            $comment->setComment($commentSite);
            $comment->setDemande($demande);
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
            $comments = $em->getRepository('MainBundle:Comments')->findByDemande($id);
            $commentDone = 1;
            $value =$commentSite;
            $content = $this->RenderView('MainBundle:Default:Demandes\commentDemande.html.twig', array(
                'demande' => $demande,
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
            $demande = $em->getRepository('MainBundle:Demandes')->findOneById($id);
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
            $comments = $em->getRepository('MainBundle:Comments')->findByDemande($id);
            $content = $this->RenderView('MainBundle:Default:Demandes\commentDemande.html.twig', array(
                'demande' => $demande,
                'comments'=>$comments,
                'commentDone'=>$commentDone,
                'value'=>$value,
            ));
            $response = new JsonResponse();
            $response->setData(array('classifiedList' => $content));
            return $response;
        }
    }

    /*public function EnquiryAction($name)
    {
        $form_Enquiry = $this->createForm(new EnquiryType());

    }*/
}
