<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offres
 *
 * @ORM\Table(name="offres")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\OffresRepository")
 */
class Offres
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_offre", type="datetime")
     * @ORM\JoinColumn(nullable=true)
     */
    private $date_offre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_offre1", type="datetime")
     * @ORM\JoinColumn(nullable=true)
     */
    private $date_offre1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_offre2", type="datetime")
     * @ORM\JoinColumn(nullable=true)
     */
    private $date_offre2;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;


    /**
     * @ORM\OneToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $media;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offres
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Offres
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Offres
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }



    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Offres
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Offres
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set dateOffre
     *
     * @param \DateTime $dateOffre
     *
     * @return Offres
     */
    public function setDateOffre($dateOffre)
    {
        $this->date_offre = $dateOffre;

        return $this;
    }

    /**
     * Get dateOffre
     *
     * @return \DateTime
     */
    public function getDateOffre()
    {
        return $this->date_offre;
    }


    /**
     * Set media
     *
     * @param \Main\MainBundle\Entity\Media $media
     *
     * @return Offres
     */
    public function setMedia(\Main\MainBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Main\MainBundle\Entity\Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set dateOffre1
     *
     * @param \DateTime $dateOffre1
     *
     * @return Offres
     */
    public function setDateOffre1($dateOffre1)
    {
        $this->date_offre1 = $dateOffre1;

        return $this;
    }

    /**
     * Get dateOffre1
     *
     * @return \DateTime
     */
    public function getDateOffre1()
    {
        return $this->date_offre1;
    }

    /**
     * Set dateOffre2
     *
     * @param \DateTime $dateOffre2
     *
     * @return Offres
     */
    public function setDateOffre2($dateOffre2)
    {
        $this->date_offre2 = $dateOffre2;

        return $this;
    }

    /**
     * Get dateOffre2
     *
     * @return \DateTime
     */
    public function getDateOffre2()
    {
        return $this->date_offre2;
    }
}
