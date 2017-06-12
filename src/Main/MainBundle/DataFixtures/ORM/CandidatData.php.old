<?php

namespace Main\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use User\UserBundle\Entity\Candidat;



class CandidatData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $candidat1 = new Candidat();
        $candidat1->setNom('Client 1');
        $candidat1->setPrenom('Client 1 Prénom');
        $candidat1->setPhone('0389521478');
//        $candidat1->setUser($this->getReference('user_client'));
        $manager->persist($candidat1);

        $manager->flush();

        $this->addReference('candidat1',$candidat1);

    }

    public function getOrder()
    {
        return 5;
    }
}