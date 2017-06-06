<?php

namespace Main\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Main\MainBundle\Entity\Tips;
use Main\MainBundle\Form\TipsType;
use Main\MainBundle\Form\MediaType;
use Main\MainBundle\Repository\TipsRepository;

class TipsController extends Controller
{
    public function tipAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tip = $em->getRepository('MainBundle:Tips')->find($id);
        $medias = $em->getRepository('MainBundle:Tips')->findByMedia($id);
        $form = $this->createForm(new TipsType());
        $form_Media = $this->createForm(new MediaType());

        return $this->render('MainBundle:Tips:layout\tip.html.twig',array("tip"=> $tip,'form'=>$form->createView(),"medias"=>$medias,'form_Media'=>$form_Media->createView()));
    }

    public function tipsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tips = $em->getRepository('MainBundle:Tips')->findAll();
        return $this->render('MainBundle:Default:Tips\tips.html.twig',array("tips"=> $tips));
    }
}
