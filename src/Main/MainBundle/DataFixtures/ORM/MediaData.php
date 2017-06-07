<?php

namespace Main\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Main\MainBundle\Entity\Media;



class MediaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $anonimatweb = new Media();
        $anonimatweb->setPath('img/ANONYMAT-DU-WEB-.jpg');
        $anonimatweb->setUrl('ANONYMAT-DU-WEB-.jpg');
        $manager->persist($anonimatweb);

        $ascampus = new Media();
        $ascampus->setPath('img/ASC_equipements_campus06.JPG');
        $ascampus->setUrl('ASC_equipements_campus06.JPG');
        $manager->persist($ascampus);

        $citybg = new Media();
        $citybg->setPath('img/6797943-hdr-city-background.jpg');
        $citybg->setUrl('6797943-hdr-city-background.jpg');
        $manager->persist($citybg);

        $background = new Media();
        $background->setPath('img/background.jpg');
        $background->setUrl('background.jpg');
        $manager->persist($background);

        $logo = new Media();
        $logo->setPath('img/logo.png');
        $logo->setUrl('logo.png');
        $manager->persist($logo);

        $logo100 = new Media();
        $logo100->setPath('img/logo100.png');
        $logo100->setUrl('logo100.png');
        $manager->persist($logo100);

        $mail = new Media();
        $mail->setPath('img/picto/mail.png');
        $mail->setUrl('mail.png');
        $manager->persist($mail);

        $playbutton = new Media();
        $playbutton->setPath('img/picto/play-button.png');
        $playbutton->setUrl('play-button.png');
        $manager->persist($playbutton);

        $linkedin = new Media();
        $linkedin->setPath('img/picto/linkedin-letters.png');
        $linkedin->setUrl('linkedin-letters.png');
        $manager->persist($linkedin);

        $pictoworker = new Media();
        $pictoworker->setPath('img/picto/001-worker.png');
        $pictoworker->setUrl('001-worker.png');
        $manager->persist($pictoworker);

        $pictocollaboration = new Media();
        $pictocollaboration->setPath('img/picto/002-collaboration.png');
        $pictocollaboration->setUrl('002-collaboration.png');
        $manager->persist($pictocollaboration);

        $carouselMedia1 = new Media();
        $carouselMedia1->setPath('img/1.jpg');
        $carouselMedia1->setUrl('1.jpg');
        $manager->persist($carouselMedia1);

        $carouselMedia2 = new Media();
        $carouselMedia2->setPath('img/2.jpg');
        $carouselMedia2->setUrl('2.jpg');
        $manager->persist($carouselMedia2);

        $carouselMedia3 = new Media();
        $carouselMedia3->setPath('img/3.jpg');
        $carouselMedia3->setUrl('3.jpg');
        $manager->persist($carouselMedia3);

        $carouselMedia4 = new Media();
        $carouselMedia4->setPath('img/4.jpg');
        $carouselMedia4->setUrl('4.jpg');
        $manager->persist($carouselMedia4);

        $carouselMedia5 = new Media();
        $carouselMedia5->setPath('img/5.jpg');
        $carouselMedia5->setUrl('5.jpg');
        $manager->persist($carouselMedia5);

        $cvmedia = new Media();
        $cvmedia->setPath('img/6.jpeg');
        $cvmedia->setUrl('6.jpeg');
        $manager->persist($cvmedia);
        
        $entretientmedia = new Media();
        $entretientmedia->setPath('img/7.jpeg');
        $entretientmedia->setUrl('7.jpeg');
        $manager->persist($entretientmedia);
        
        $manager->flush();

        $this->addReference('anonimatweb',$anonimatweb);
        $this->addReference('ascampus',$ascampus);
        $this->addReference('logo',$logo);
        $this->addReference('background',$background);
        $this->addReference('citybg',$citybg);
        $this->addReference('logo100',$logo100);
        $this->addReference('mail',$mail);
        $this->addReference('carouselMedia1',$carouselMedia1);
        $this->addReference('carouselMedia2',$carouselMedia2);
        $this->addReference('carouselMedia3',$carouselMedia3);
        $this->addReference('carouselMedia4',$carouselMedia4);
        $this->addReference('carouselMedia5',$carouselMedia5);
        $this->addReference('playbutton',$playbutton);
        $this->addReference('linkedin',$linkedin);
        $this->addReference('pictoworker',$pictoworker);
        $this->addReference('pictocollaboration',$pictocollaboration);
        $this->addReference('cvmedia',$cvmedia);
        $this->addReference('entretientmedia',$entretientmedia);

    }

    public function getOrder()
    {
        return 1;
    }
}