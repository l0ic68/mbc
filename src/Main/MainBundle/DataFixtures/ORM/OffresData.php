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
        $offre1->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla felis nibh, blandit in iaculis sit amet, tincidunt elementum nunc. Morbi non placerat sapien, eu aliquet nibh. Curabitur iaculis augue in dapibus iaculis. Curabitur aliquet neque et augue maximus pharetra. Proin in sapien in diam tincidunt ullamcorper quis quis lacus. Nullam a elementum justo. Etiam nisi nisi, pharetra a luctus quis, porta nec ipsum. Quisque aliquet convallis nibh eu ultrices. Aenean elit augue, maximus vitae egestas posuere, venenatis eu elit. Fusce sed odio nulla.");
//        $offre1->setAuthor($this->getReference('user_test'));
        $offre1->setLocation("Strasbourg");
        $offre1->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre1->setDateOffre1(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre1->setDateOffre2(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre1->setName("Offre 1");
        $offre1->setPrice(75);
        $offre1->setDuration(75);
        $offre1->setMedia($this->getReference('carouselMedia1'));
        $manager->persist($offre1);



        $offre2 = new Offres();
        $offre2->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla felis nibh, blandit in iaculis sit amet, tincidunt elementum nunc. Morbi non placerat sapien, eu aliquet nibh. Curabitur iaculis augue in dapibus iaculis. Curabitur aliquet neque et augue maximus pharetra. Proin in sapien in diam tincidunt ullamcorper quis quis lacus. Nullam a elementum justo. Etiam nisi nisi, pharetra a luctus quis, porta nec ipsum. Quisque aliquet convallis nibh eu ultrices. Aenean elit augue, maximus vitae egestas posuere, venenatis eu elit. Fusce sed odio nulla.");
//        $offre2->setAuthor($this->getReference('user_test'));
        $offre2->setLocation("Paris");
        $offre2->setName("Offre 2");
        $offre2->setPrice(75);
        $offre2->setDuration(75);
        $offre2->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre2->setDateOffre1(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre2->setDateOffre2(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre2->setMedia($this->getReference('carouselMedia2'));
        $manager->persist($offre2);



        $offre3 = new Offres();
        $offre3->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla felis nibh, blandit in iaculis sit amet, tincidunt elementum nunc. Morbi non placerat sapien, eu aliquet nibh. Curabitur iaculis augue in dapibus iaculis. Curabitur aliquet neque et augue maximus pharetra. Proin in sapien in diam tincidunt ullamcorper quis quis lacus. Nullam a elementum justo. Etiam nisi nisi, pharetra a luctus quis, porta nec ipsum. Quisque aliquet convallis nibh eu ultrices. Aenean elit augue, maximus vitae egestas posuere, venenatis eu elit. Fusce sed odio nulla.");
//        $offre3->setAuthor($this->getReference('user_test'));
        $offre3->setLocation("Allemagne");
        $offre3->setName("Offre 3");
        $offre3->setPrice(75);
        $offre3->setDuration(75);
        $offre3->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre3->setDateOffre1(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre3->setDateOffre2(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre3->setMedia($this->getReference('carouselMedia3'));
        $manager->persist($offre3);



        $offre4 = new Offres();
        $offre4->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla felis nibh, blandit in iaculis sit amet, tincidunt elementum nunc. Morbi non placerat sapien, eu aliquet nibh. Curabitur iaculis augue in dapibus iaculis. Curabitur aliquet neque et augue maximus pharetra. Proin in sapien in diam tincidunt ullamcorper quis quis lacus. Nullam a elementum justo. Etiam nisi nisi, pharetra a luctus quis, porta nec ipsum. Quisque aliquet convallis nibh eu ultrices. Aenean elit augue, maximus vitae egestas posuere, venenatis eu elit. Fusce sed odio nulla.");
//        $offre4->setAuthor($this->getReference('user_test'));
        $offre4->setLocation("Colmar");
        $offre4->setName("Offre 4");
        $offre4->setPrice(75);
        $offre4->setDuration(75);
        $offre4->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre4->setDateOffre1(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre4->setDateOffre2(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre4->setMedia($this->getReference('carouselMedia4'));
        $manager->persist($offre4);


        $offre5 = new Offres();
        $offre5->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla felis nibh, blandit in iaculis sit amet, tincidunt elementum nunc. Morbi non placerat sapien, eu aliquet nibh. Curabitur iaculis augue in dapibus iaculis. Curabitur aliquet neque et augue maximus pharetra. Proin in sapien in diam tincidunt ullamcorper quis quis lacus. Nullam a elementum justo. Etiam nisi nisi, pharetra a luctus quis, porta nec ipsum. Quisque aliquet convallis nibh eu ultrices. Aenean elit augue, maximus vitae egestas posuere, venenatis eu elit. Fusce sed odio nulla.");
//        $offre5->setAuthor($this->getReference('user_test'));
        $offre5->setLocation("Urschenheim");
        $offre5->setName("Offre 5");
        $offre5->setPrice(75);
        $offre5->setDuration(75);
        $offre5->setDateOffre(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre5->setDateOffre1(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
        $offre5->setDateOffre2(new \DateTime("13-05-2017 00:00"), new \DateTimeZone('Europe/Paris'));
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