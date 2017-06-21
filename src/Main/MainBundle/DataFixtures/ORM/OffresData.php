<?php


namespace Main\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Main\MainBundle\Entity\Offres;


class OffresData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $offre1 = new Offres();
        $offre1->setDescriptionPost("Du texte important de sous catégorie ou autre à completer ici, 70 a 150 caractères. Blablablablablablablablbalbalbalbalbalablabalabalblzndfisdsjiifdijfsjifijffjiefzefzfezjefzfçejefzjjfzez |");
        $offre1->setDescriptionCompany("Ils sont super sympa mon gars");
        $offre1->setDescriptionMission("imprimante");
        $offre1->setDescriptionprofilesearch("Un humain");
        $offre1->setTitle("Titre Offre 1");
        $offre1->setCategory("Informatique");
        $offre1->setWebsitelink("http://www.google.com");
        $offre1->setEntreprise($this->getReference('user_entreprise'));
        $offre1->setLocation("Strasbourg");
        $offre1->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum");
        $offre1->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre1->setName("Offre 1");
        $offre1->setPrice(75);
        $offre1->setDuration(75);
        $offre1->setMedia($this->getReference('carouselMedia1'));
        $manager->persist($offre1);



        $offre2 = new Offres();
        $offre2->setDescriptionPost("Du texte important de sous catégorie ou autre à completer ici, 70 a 150 caractères. Blablablablablablablablbalbalbalbalbalablabalabalblzndfisdsjiifdijfsjifijffjiefzefzfezjefzfçejefzjjfzez |");
        $offre2->setEntreprise($this->getReference('user_entreprise'));
        $offre2->setLocation("Paris");
        $offre2->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum");
        $offre2->setDescriptionCompany("Ils sont super sympa mon gars");
        $offre2->setDescriptionMission("imprimante");
        $offre2->setDescriptionprofilesearch("Un humain");
        $offre2->setTitle("Titre Offre 2");
        $offre2->setCategory("commerce");
        $offre2->setWebsitelink("http://www.google.com");
        $offre2->setName("Offre 2");
        $offre2->setPrice(75);
        $offre2->setDuration(75);
        $offre2->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre2->setMedia($this->getReference('carouselMedia2'));
        $manager->persist($offre2);



        $offre3 = new Offres();
        $offre3->setDescriptionPost("Du texte important de sous catégorie ou autre à completer ici, 70 a 150 caractères. Blablablablablablablablbalbalbalbalbalablabalabalblzndfisdsjiifdijfsjifijffjiefzefzfezjefzfçejefzjjfzez |");
        $offre3->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum");
        $offre3->setEntreprise($this->getReference('user_entreprise'));
        $offre3->setLocation("Allemagne");
        $offre3->setDescriptionCompany("Ils sont super sympa mon gars");
        $offre3->setDescriptionMission("imprimante");
        $offre3->setDescriptionprofilesearch("Un humain");
        $offre3->setTitle("Titre Offre 3");
        $offre3->setCategory("Vente");
        $offre3->setWebsitelink("http://www.google.com");
        $offre3->setName("Offre 3");
        $offre3->setPrice(75);
        $offre3->setDuration(75);
        $offre3->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));

        $offre3->setMedia($this->getReference('carouselMedia3'));
        $manager->persist($offre3);



        $offre4 = new Offres();
        $offre4->setDescriptionPost("Du texte important de sous catégorie ou autre à completer ici, 70 a 150 caractères. Blablablablablablablablbalbalbalbalbalablabalabalblzndfisdsjiifdijfsjifijffjiefzefzfezjefzfçejefzjjfzez |");
        $offre4->setEntreprise($this->getReference('user_entreprise'));
        $offre4->setLocation("Colmar");
        $offre4->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum");
        $offre4->setName("Offre 4");
        $offre4->setDescriptionCompany("Ils sont super sympa mon gars");
        $offre4->setDescriptionMission("imprimante");
        $offre4->setDescriptionprofilesearch("Un humain");
        $offre4->setTitle("Titre Offre 4");
        $offre4->setCategory("Test");
        $offre4->setWebsitelink("http://www.google.com");
        $offre4->setPrice(75);
        $offre4->setDuration(75);
        $offre4->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre4->setMedia($this->getReference('carouselMedia4'));
        $manager->persist($offre4);


        $offre5 = new Offres();
        $offre5->setDescriptionPost("Du texte important de sous catégorie ou autre à completer ici, 70 a 150 caractères. Blablablablablablablablbalbalbalbalbalablabalabalblzndfisdsjiifdijfsjifijffjiefzefzfezjefzfçejefzjjfzez |Post");
        $offre5->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum");
        $offre5->setEntreprise($this->getReference('user_entreprise'));
        $offre5->setLocation("Urschenheim");
        $offre5->setDescriptionCompany("Ils sont super sympa mon gars");
        $offre5->setDescriptionMission("imprimante");
        $offre5->setDescriptionprofilesearch("Un humain");
        $offre5->setTitle("Titre Offre 5");
        $offre5->setCategory("Informatique");
        $offre5->setWebsitelink("http://www.google.com");
        $offre5->setName("Offre 5");
        $offre5->setPrice(75);
        $offre5->setDuration(75);
        $offre5->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre5->setMedia($this->getReference('carouselMedia5'));
        $manager->persist($offre5);

        $manager->flush();

        $this->addReference('offre1',$offre1);
        $this->addReference('offre2',$offre2);
        $this->addReference('offre3',$offre3);
        $this->addReference('offre4',$offre4);
        $this->addReference('offre5',$offre5);
    }

    public function getOrder()
    {
        return 3;
    }
}