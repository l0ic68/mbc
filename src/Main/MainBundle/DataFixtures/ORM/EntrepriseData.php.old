<?php

namespace Main\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use User\UserBundle\Entity\Entreprise;



class EntrepriseData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $entreprise1 = new Entreprise();
        $entreprise1->setEntreprise('InfoCash');
        $entreprise1->setPhone('Pas le num dsl');
        $entreprise1->setAdresse('Colmar');
        $entreprise1->setPays('France');
        $entreprise1->setCodePostal('68124');
        $entreprise1->setInterlocuteurNom('Torlet');
        $entreprise1->setInterlocuteurPrenom('Joel');
        $entreprise1->setPosition('gérant');
//        $entreprise1->setUser($this->getReference('user_entreprise'));
        $manager->persist($entreprise1);

        $manager->flush();

        $this->addReference('entreprise1',$entreprise1);
    }

    public function getOrder()
    {
        return 5;
    }
}