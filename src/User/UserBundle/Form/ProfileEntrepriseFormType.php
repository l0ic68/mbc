<?php

namespace User\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Main\MainBundle\Form\MediaType;

class ProfileEntrepriseFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEntreprise')
            ->add('secteur')
            ->add('nomInterlocuteur')
            ->add('positionInterlocuteur')
            ->add('adresse')
            ->add('codePostal');

//            ->add('media', new MediaType(), array('label' => 'Image',
//                'attr' => array('class' => 'custom-file-input',
//                    'placeholder' => 'Image',)));

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'User\UserBundle\Entity\Entreprise'));
    }
    public function getName()
    {
        return 'app_user_registration';
    }


}
