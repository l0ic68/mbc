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
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $media;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\Candidat", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $candidat;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
}
