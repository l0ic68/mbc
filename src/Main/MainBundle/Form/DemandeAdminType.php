<?php

namespace Main\MainBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Main\MainBundle\Entity\Demandes;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;





class DemandeAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //ici nous allons faire notre formulaire en PHP
        $builder
            ->add('name', 'text', array('label' => 'Nom de l\'offre',
                'attr' => array('class' => 'marg-titre white-text',
                    'placeholder' => 'Name',)))

            ->add('title', 'text', array('label' => 'Titre de l\'offre',
                'attr' => array('class' => 'row colo-gray',
                    'placeholder' => 'Title',)))

            /*->add('category', 'text', array('label' => 'Category',
                'attr' => array('class' => 'col s2 m2 l2',
                    'placeholder' => 'Category',)))*/

            ->add('media', new MediaType(), array('label' => 'Image',
                'attr' => array('class' => 'row colo-gray',
                    'placeholder' => 'Image',)))

            ->add('description', 'textarea', array('label' => 'description',
                'attr' => array('class' => 'card-action ',
                    'placeholder' => 'description',)))



            ->add('linkedinlink', 'text', array('label' => 'lien',
                'attr' => array('class' => 'col s2 m2 l2',
                    'placeholder' => 'linkedin',)))

//            ->add('date_offre','text', array(
//                'label' => 'Date 1',
//                'translation_domain' => 'AppBundle',
//                'attr' => array(
//                    'placeholder' => 'dd-mm-yyyy HH:ii',
//                    'class' => 'form-control input-inline datetimepicker',
//                    'data-provide' => 'datepicker',
//                    'data-format' => 'dd-mm-yyyy HH:ii',
//                )))

            ->add('price','hidden',array('label' => 'Price',
                'attr' => array('class' => 'input-medium search-query form-control',
                    'placeholder' => 'vues',)))
            ->add('location','hidden',array('label' => 'Location',
                'attr' => array('class' => 'col s2 m2 l2',
                    'placeholder' => 'location',)))
            ->add('Send', 'submit', array('label' => 'Send',
                'attr' => array('class' => 'btn btn-danger raised',
                    'placeholder' => 'Send',)));

////        $builder->get('date_offre')
////            ->addModelTransformer(new DateTimeTransformer());
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Demandes::class,
        ));
    }
    public function getName()
    {
        return 'main_mainbundle_demande';
    }
}