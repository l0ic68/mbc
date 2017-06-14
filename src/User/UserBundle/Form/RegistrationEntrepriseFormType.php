<?php

namespace User\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Main\MainBundle\Form\MediaType;

class RegistrationEntrepriseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEntreprise')
            ->add('secteur')
            ->add('nomInterlocuteur')
            ->add('positionInterlocuteur')
            ->add('adresse')
            ->add('codePostal')
            ->add('message')
//            ->add('media', new MediaType(), array('label' => 'Image',
//                'attr' => array('class' => 'custom-file-input',
//                    'placeholder' => 'Image',)));
            ->add('username', null, array('label' => 'username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'email',
                'attr' => array('class' => 'input-medium search-query form-control',
                    'placeholder' => 'Email',)))
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Password','attr' => array('class' => 'input-medium search-query form-control','placeholder' => 'Password',)),
                'second_options' => array('label' => 'Confirmation','attr' => array('class' => 'input-medium search-query form-control','placeholder' => 'Password confirmation',)),
                'invalid_message' => 'fos_user.password.mismatch',
            ));
//            ->add('submit','submit');

    }
//    public function getParent()
//    {
//        return 'fos_user_registration';
//    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'User\UserBundle\Entity\Entreprise'));
    }
    public function getName()
    {
        return 'app_user_registration';
    }
}
