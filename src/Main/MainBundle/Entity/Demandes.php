<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demandes
 *
 * @ORM\Table(name="demandes")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\DemandesRepository")
 */
class Demandes
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
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demande", type="datetime")
     * @ORM\JoinColumn(nullable=true)
     */
    private $date_demande;

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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     *
     * @return Demandes
     */
    public function setDateDemande($dateDemande)
    {
        $this->date_demande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->date_demande;
    }


    /**
     * Set media
     *
     * @param \Main\MainBundle\Entity\Media $media
     *
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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
     * @return Demandes
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

    /**
     * Set linkedinlink
     *
     * @param string $linkedinlink
     *
     * @return Demandes
     */
    public function setLinkedinlink($linkedinlink)
    {
        $this->linkedinlink = $linkedinlink;
    
        return $this;
    }

    /**
     * Get linkedinlink
     *
     * @return string
     */
    public function getLinkedinlink()
    {
        return $this->linkedinlink;
    }
}
