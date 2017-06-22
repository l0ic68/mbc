<?php

namespace Main\MainBundle\Controller;

use Main\MainBundle\Entity\Offres;
use User\UserBundle\Entity\Candidat;
use User\UserBundle\Entity\Entreprise;
use Main\MainBundle\Form\OffreAdminType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Offre controller.
 *
 */
class OffreAdminController extends Controller
{
    public function Edit_OffreAction($id,Request $request)
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
    public function Delete_OffreAction($id,Request $request)
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
    public function Add_OffreAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $offre = new Offres();
        $form = $this->createForm(new OffreAdminType(), $offre);
        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $offre->setDateOffre(new \DateTime('now'));
                $offre->setDuration(4);
                if($user instanceof Candidat)
                {
                    $offre->setCandidat($user);
                }
                elseif($user instanceof Entreprise)
                {
                    $offre->setEntreprise($user);
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($offre);
                $em->flush();
                return $this->redirectToRoute('fos_user_profile_show');
            }
        }
        return $this->render('MainBundle:Admin:offre.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
