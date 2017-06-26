<?php

namespace Main\MainBundle\Controller;

use Main\MainBundle\Entity\Offres;
use Main\MainBundle\Entity\Demandes;
use Main\MainBundle\Form\DemandesType;
use User\UserBundle\Entity\Candidat;
use User\UserBundle\Entity\Entreprise;
use Main\MainBundle\Form\OffreAdminType;
use Main\MainBundle\Form\DemandeAdminType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Demande controller.
 *
 */
class DemandeAdminController extends Controller
{
    public function Edit_DemandeAction($id,Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('MainBundle:Offres')->findOneById($id);
        if( $offre->getEntreprise() == $user)
        {
        $form= $this->createForm(new OffreAdminType(),$offre);
        if('POST' === $request->getMethod()) {
            $form->handleRequest($request);
                if ($form->isValid()) {
                    // On l'enregistre notre objet $advert dans la base de données, par exemple
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($offre);
                    $em->flush();
                }
        }


        return $this->render('MainBundle:Admin:offre.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    else
    {
        return $this->redirectToRoute('main_homepage');
    }

    }
    public function Delete_DemandeAction($id,Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('MainBundle:Offres')->findOneById($id);
        if( $offre->getEntreprise() == $user)
        {
                    // On l'enregistre notre objet $advert dans la base de données, par exemple
            $comments = $em->getRepository('MainBundle:Comments')->findByOffre($id);
            foreach ($comments as $comment)
            {
                $em->remove($comment);
            }
                    $em = $this->getDoctrine()->getManager();
                    $em->remove($offre);
                    $em->flush();
            return $this->redirectToRoute('fos_user_profile_show');
        }
        else
        {
            return $this->redirectToRoute('main_homepage');
        }
    }

    public function Add_DemandeAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $demande = new Demandes();
                $demande->setDateDemande(new \DateTime('now'));
                $demande->setCandidat($user);
                $demande->setPrice(1);
                $em = $this->getDoctrine()->getManager();
                $em->persist($demande);
                $em->flush();
                return $this->redirectToRoute('fos_user_profile_show');
    }
}
