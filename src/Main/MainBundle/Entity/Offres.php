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
     * @ORM\Column(name="descriptionpost", type="text")
     */
    private $descriptionpost;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptioncompany", type="text")
     */
    private $descriptioncompany;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionmission", type="text")
     */
    private $descriptionmission;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionprofilesearch", type="text")
     */
    private $descriptionprofilesearch;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="websitelink", type="string", length=255)
     */
    private $websitelink;

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
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $media;

        /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $user;

            /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\Entreprise", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $entreprise;

            /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\Candidat", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $candidat;



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
     * Set descriptionpost
     *
     * @param string $descriptionpost
     *
     * @return Offres
     */
    public function setDescriptionpost($descriptionpost)
    {
        $this->descriptionpost = $descriptionpost;
    
        return $this;
    }

    /**
     * Get descriptionpost
     *
     * @return string
     */
    public function getDescriptionpost()
    {
        return $this->descriptionpost;
    }

    /**
     * Set descriptioncompany
     *
     * @param string $descriptioncompany
     *
     * @return Offres
     */
    public function setDescriptioncompany($descriptioncompany)
    {
        $this->descriptioncompany = $descriptioncompany;
    
        return $this;
    }

    /**
     * Get descriptioncompany
     *
     * @return string
     */
    public function getDescriptioncompany()
    {
        return $this->descriptioncompany;
    }

    /**
     * Set descriptionmission
     *
     * @param string $descriptionmission
     *
     * @return Offres
     */
    public function setDescriptionmission($descriptionmission)
    {
        $this->descriptionmission = $descriptionmission;
    
        return $this;
    }

    /**
     * Get descriptionmission
     *
     * @return string
     */
    public function getDescriptionmission()
    {
        return $this->descriptionmission;
    }

    /**
     * Set descriptionprofilesearch
     *
     * @param string $descriptionprofilesearch
     *
     * @return Offres
     */
    public function setDescriptionprofilesearch($descriptionprofilesearch)
    {
        $this->descriptionprofilesearch = $descriptionprofilesearch;
    
        return $this;
    }

    /**
     * Get descriptionprofilesearch
     *
     * @return string
     */
    public function getDescriptionprofilesearch()
    {
        return $this->descriptionprofilesearch;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Offres
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Offres
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set websitelink
     *
     * @param string $websitelink
     *
     * @return Offres
     */
    public function setWebsitelink($websitelink)
    {
        $this->websitelink = $websitelink;
    
        return $this;
    }

    /**
     * Get websitelink
     *
     * @return string
     */
    public function getWebsitelink()
    {
        return $this->websitelink;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set user
     *
     * @param \Main\MainBundle\Entity\User $user
     *
     * @return Offres
     */
    public function setUser(\Main\MainBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Main\MainBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }



    /**
     * Set candidat
     *
     * @param \User\UserBundle\Entity\Candidat $candidat
     *
     * @return Offres
     */
    public function setCandidat(\User\UserBundle\Entity\Candidat $candidat = null)
    {
        $this->candidat = $candidat;
    
        return $this;
    }

    /**
     * Get candidat
     *
     * @return \User\UserBundle\Entity\Candidat
     */
    public function getCandidat()
    {
        return $this->candidat;
    }

    

    /**
     * Set entreprise
     *
     * @param \User\UserBundle\Entity\Entreprise $entreprise
     *
     * @return Offres
     */
    public function setEntreprise(\User\UserBundle\Entity\Entreprise $entreprise = null)
    {
        $this->entreprise = $entreprise;
    
        return $this;
    }

    /**
     * Get entreprise
     *
     * @return \User\UserBundle\Entity\Entreprise
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }
}
