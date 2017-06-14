<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="entreprise")
 * @UniqueEntity(fields = "username", targetClass = "User\UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "User\UserBundle\Entity\User", message="fos_user.email.already_used")
 */
class Entreprise extends User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomInterlocuteur", type="string", length=255)
     */
    private $nomInterlocuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEntreprise", type="string", length=255)
     */
    private $nomEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="secteur_activite", type="string", length=255)
     */
    private $secteur;

    /**
     * @var string
     *
     * @ORM\Column(name="positionInterlocuteur", type="string", length=255)
     */
    private $positionInterlocuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=255)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;
//
//    /**
//     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist","remove"})
//     * @ORM\JoinColumn(nullable=true)
//     */
//    private $media;



    /**
     * Set nomInterlocuteur
     *
     * @param string $nomInterlocuteur
     *
     * @return Entreprise
     */
    public function setNomInterlocuteur($nomInterlocuteur)
    {
        $this->nomInterlocuteur = $nomInterlocuteur;
    
        return $this;
    }

    /**
     * Get nomInterlocuteur
     *
     * @return string
     */
    public function getNomInterlocuteur()
    {
        return $this->nomInterlocuteur;
    }

    /**
     * Set nomEntreprise
     *
     * @param string $nomEntreprise
     *
     * @return Entreprise
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;
    
        return $this;
    }

    /**
     * Get nomEntreprise
     *
     * @return string
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * Set secteur
     *
     * @param string $secteur
     *
     * @return Entreprise
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;
    
        return $this;
    }

    /**
     * Get secteur
     *
     * @return string
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * Set positionInterlocuteur
     *
     * @param string $positionInterlocuteur
     *
     * @return Entreprise
     */
    public function setPositionInterlocuteur($positionInterlocuteur)
    {
        $this->positionInterlocuteur = $positionInterlocuteur;
    
        return $this;
    }

    /**
     * Get positionInterlocuteur
     *
     * @return string
     */
    public function getPositionInterlocuteur()
    {
        return $this->positionInterlocuteur;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Entreprise
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Entreprise
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    
        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Entreprise
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
    /*
 * Si tu veux enlever username
 */
    public function setEmail($email){
        parent::setEmail($email);
        $this->setUsername($email);
    }

}
