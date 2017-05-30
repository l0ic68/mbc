<?php

namespace Main\MainBundle\Controller;

use Main\MainBundle\Entity\Offres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Offre controller.
 *
 */
class OffresAdminController extends Controller
{
    /**
     * Lists all offre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('MainBundle:Offres')->findAll();

        return $this->render('MainBundle:Admin:offres/index.html.twig', array(
            'offres' => $offres,
        ));
    }

    /**
     * Creates a new offre entity.
     *
     */
    public function newAction(Request $request)
    {
        $offre = new Offres();
        $form = $this->createForm('Main\MainBundle\Form\OffresAdminType', $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();

            return $this->redirectToRoute('admin_offres_show', array('id' => $offre->getId()));
        }

        return $this->render('MainBundle:Admin:offres/new.html.twig', array(
            'offre' => $offre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offre entity.
     *
     */
    public function showAction(Offres $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);

        return $this->render('MainBundle:Admin:offres/show.html.twig', array(
            'offre' => $offre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offre entity.
     *
     */
    public function editAction(Request $request, Offres $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);
        $editForm = $this->createForm('Main\MainBundle\Form\OffresAdminType', $offre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_offres_edit', array('id' => $offre->getId()));
        }

        return $this->render('MainBundle:Admin:offres/edit.html.twig', array(
            'offre' => $offre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offre entity.
     *
     */
    public function deleteAction(Request $request, Offres $offre)
    {
        $form = $this->createDeleteForm($offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offre);
            $em->flush();
        }

        return $this->redirectToRoute('admin_offres_index');
    }

    /**
     * Creates a form to delete a offre entity.
     *
     * @param Offres $offre The offre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offres $offre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_offres_delete', array('id' => $offre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
