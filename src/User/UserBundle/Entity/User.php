<?php
// src/AppBundle/Entity/User.php

namespace User\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $media;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\Candidat",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $candidat;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\Entreprise",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $entreprise;

//    /**
//     * @ORM\Column(type="string", length=255)
//     */
//    private $nom;
//
//    /**
//     * @ORM\Column(type="string", length=255)
//     */
//    private $prenom;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

//    /**
//     * Set nom
//     *
//     * @param string $nom
//     *
//     * @return Users
//     */
//    public function setNom($nom)
//    {
//        $this->nom = $nom;
//
//        return $this;
//    }
//
//    /**
//     * Get nom
//     *
//     * @return string
//     */
//    public function getNom()
//    {
//        return $this->nom;
//    }
//
//    /**
//     * Set prenom
//     *
//     * @param string $prenom
//     *
//     * @return Users
//     */
//    public function setPrenom($prenom)
//    {
//        $this->prenom = $prenom;
//
//        return $this;
//    }
//
//    /**
//     * Get prenom
//     *
//     * @return string
//     */
//    public function getPrenom()
//    {
//        return $this->prenom;
//    }
    /*
     * Si tu veux enlever username
     */
    public function setEmail($email){
        parent::setEmail($email);
        $this->setUsername($email);
    }

    /**
     * Set media
     *
     * @param \Main\MainBundle\Entity\Media $media
     *
     * @return Users
     */
    public function setMedia(\Main\MainBundle\Entity\Media $media)
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
     * @return User
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
     * @return User
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
