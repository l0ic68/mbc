<?php
namespace Users\UsersBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use User\UserBundle\Entity\User;
use User\UserBundle\Entity\Candidat;

class UserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $discriminator = $this->container->get('pugx_user.manager.user_discriminator');
        $discriminator->setClass('User\UserBundle\Entity\Candidat');

        $userManager = $this->container->get('pugx_user_manager');

        $user = $userManager->createUser();
        $role = array('ROLE_ADMIN');

        $user->setRoles($role);
        $user->setUsername('loic');
        $user->setNom('loic');
        $user->setPrenom('loic');
        $user->setPhone('loic');
        $user->setEmail('test.test@test.test');
        $user->setPassword($this->container->get('security.encoder_factory')->getEncoder($user)->encodePassword('test', $user->getSalt()));
        $user->setEnabled(1);
//        $user->setMedia($this->getReference('ascampus'));
        $userManager->updateUser($user);
//
//        $user_client = new User();
//        $user_client->setRoles($role);
//        $user_client->setEmail('client@mail.fr');
//        $user_client->setPassword($this->container->get('security.encoder_factory')->getEncoder($user_client)->encodePassword('client', $user_client->getSalt()));
//        $user_client->setEnabled(1);
//        $user_client->setMedia($this->getReference('pictocollaboration'));
//        $user_client->setCandidat($this->getReference('candidat1'));
//        $manager->persist($user_client);
//
//        $user_entreprise = new User();
//        $user_entreprise->setEmail('entreprise@mail.fr');
//        $user_entreprise->setPassword($this->container->get('security.encoder_factory')->getEncoder($user_entreprise)->encodePassword('entreprise', $user_entreprise->getSalt()));
//        $user_entreprise->setEnabled(1);
//        $user_entreprise->setMedia($this->getReference('citybg'));
//        $user_entreprise->setEntreprise($this->getReference('entreprise1'));
//        $manager->persist($user_entreprise);
//
//        $manager->flush();
//
//        $this->addReference('user_test', $user_test);
//        $this->addReference('user_client', $user_client);
//        $this->addReference('user_entreprise', $user_entreprise);
    }
    public function getOrder()
    {
        return 6;
    }
}