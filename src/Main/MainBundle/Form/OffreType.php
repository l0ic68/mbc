<?php

namespace Main\MainBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Main\MainBundle\Entity\Offres;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;




class OffreType extends AbstractType
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
                                          
            ->add('date_offre','text', array(
                'label' => 'Date 1',
                'translation_domain' => 'AppBundle',
                'attr' => array(
                    'placeholder' => 'dd-mm-yyyy HH:ii',
                    'class' => 'form-control input-inline datetimepicker',
                    'data-provide' => 'datepicker',
                    'data-format' => 'dd-mm-yyyy HH:ii',
                )))

            ->add('date_offre_1', 'text', array(
                'label' => 'Date 2',
                'translation_domain' => 'AppBundle',
                'attr' => array(
                    'placeholder' => 'dd-mm-yyyy HH:ii',
                    'class' => 'form-control input-inline datetimepicker',
                    'data-provide' => 'datepicker',
                    'data-format' => 'dd-mm-yyyy HH:ii',
                )))
            ->add('date_offre_2', 'text', array(
                'label' => 'Date 3',
                'translation_domain' => 'AppBundle',
                'attr' => array(
                    'placeholder' => 'dd-mm-yyyy HH:ii',
                    'class' => 'form-control input-inline datetimepicker',
                    'data-provide' => 'datepicker',
                    'data-format' => 'dd-mm-yyyy HH:ii',
                )))

            ->add('price',"text",array('label' => 'Price ',
                                           'attr' => array('class' => 'input-medium search-query form-control',
                                           'placeholder' => 'Price $',)))
            ->add('duration',"text",array('label' => 'Duration',
                                           'attr' => array('class' => 'input-medium search-query form-control',
                                           'placeholder' => 'duration',)))
            ->add('location',"text",array('label' => 'Location',
                                           'attr' => array('class' => 'input-medium search-query form-control',
                                           'placeholder' => 'location',)))
            ->add('Send', 'submit', array('label' => 'Send',
                                          'attr' => array('class' => 'btn btn-danger raised',
                                          'placeholder' => 'Send',)));

        $builder->get('date_offre')
            ->addModelTransformer(new DateTimeTransformer());
        $builder->get('date_offre_1')
            ->addModelTransformer(new DateTimeTransformer());
        $builder->get('date_offre_2')
            ->addModelTransformer(new DateTimeTransformer());
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Offres::class,
        ));
    }
    public function getName()
    {
        return 'main_mainbundle_offre';
    }
}