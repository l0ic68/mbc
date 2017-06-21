<?php

namespace Main\MainBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Main\MainBundle\Form\MediaType;



class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //ici nous allons faire notre formulaire en PHP
        $builder
            ->add('firstname', 'text', array('label' => 'Prenom',
                                          'attr' => array('class' => 'validate',
                                          'placeholder' => 'Prenom',)))

            ->add('lastname', 'text', array('label' => 'Nom',
                                          'attr' => array('class' => 'validate',
                                          'placeholder' => 'Nom',)))

            ->add('email', EmailType::class, array('label' => 'Email',
                                          'attr' => array('class' => 'validate',
                                          'placeholder' => 'Email Adress',)))

            ->add('phone', 'text', array('label' => 'Telephone #',
                                          'attr' => array('class' => 'validate',
                                          'placeholder' => 'Telephone',)))

            ->add('message', 'textarea', array('label' => 'Message',
                                          'attr' => array('class' => 'materialize-textarea',
                                          'placeholder' => 'Your message',)))
            ->add('subject', 'text', array('label' => 'Subject',
                                          'attr' => array('class' => 'validate',
                                          'placeholder' => 'Subject',)))
            ->add('media', new MediaType(), array('label' => 'hidden',
                                            'attr' => array('class' => 'validate',
                                            'placeholder' => 'media',)))

            ->add('author', 'hidden', array('label' => 'author',
                                            'attr' => array('class' => 'materialize-textarea',
                                          'placeholder' => '',)))

            ->add('Send', 'submit', array('label' => 'Envoyer',
                                          'attr' => array('class' => 'marg-center2 btn waves-effect waves-light degrade3 z-depth-2 material-icons right',
                                          'placeholder' => 'Envoyer',)));

    }

    public function getName()
    {
        return 'main_mainbundle_enquiry';
    }
}