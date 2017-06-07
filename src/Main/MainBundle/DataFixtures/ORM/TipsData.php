<?php

namespace Main\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Main\MainBundle\Entity\Tips;



class TipsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tipcv = new Tips();
        $tipcv->setMedia($this->getReference('cvmedia'));
        $tipcv->setDescription('description du conseil 1');
        $tipcv->setName('Conseil 1 CV');
        $manager->persist($tipcv);

        $tipentretient = new Tips();
        $tipentretient->setMedia($this->getReference('entretientmedia'));
        $tipentretient->setDescription('description du conseil 1');
        $tipentretient->setName('Conseil 1 CV');
        $manager->persist($tipentretient);

        

        
        $manager->flush();

        $this->addReference('tipcv',$tipcv);
        $this->addReference('tipentretient',$tipentretient);

        
    }

    public function getOrder()
    {
        return 4;
    }
}