<?php

namespace Main\MainBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Main\MainBundle\Entity\Tips;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;




class TipsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //ici nous allons faire notre formulaire en PHP
        $builder
            ->add('name', 'text', array('label' => 'Title',
                                          'attr' => array('class' => 'input-medium search-query form-control',
                                          'placeholder' => 'Title',)))

            ->add('media', new MediaType(), array('label' => 'Image',
                                     'attr' => array('class' => 'custom-file-input',
                                        'placeholder' => 'Image',)))
                                          
            ->add('description', 'textarea', array('label' => 'description',
                                          'attr' => array('class' => 'input-medium search-query form-control',
                                          'placeholder' => 'description',)))
                                          
            ->add('Send', 'submit', array('label' => 'Send',
                                          'attr' => array('class' => 'btn btn-danger raised',
                                          'placeholder' => 'Send',)));

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Tips::class,
        ));
    }
    public function getName()
    {
        return 'main_mainbundle_tip';
    }
}