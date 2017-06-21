<?php

namespace User\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Main\MainBundle\Form\MediaType;

class ProfileCandidatFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'Last name',
                'attr' => array('class' => 'input-medium search-query form-control',
                    'placeholder' => 'Last name',)))
            ->add('prenom', 'text', array('label' => 'First name',
                'attr' => array('class' => 'input-medium search-query form-control',
                    'placeholder' => 'First name',)))
            ->add('phone')
            ->add('metier')
            ->add('adresse')
            ->add('codePostal')
            ->add('media', new MediaType(), array(
                'required' => false ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'User\UserBundle\Entity\User'));
    }
    public function getName()
    {
        return 'app_user_registration';
    }


}
