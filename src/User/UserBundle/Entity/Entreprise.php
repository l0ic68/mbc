<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidat
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="User\UserBundle\Repository\EntrepriseRepository")
 */
class Entreprise
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
     * @ORM\Column(name="entreprise", type="string", length=255)
     */
    private $entreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=255)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="interlocuteur_nom", type="string", length=255)
     */
    private $interlocuteurNom;

    /**
     * @var string
     *
     * @ORM\Column(name="interlocuteur_prenom", type="string", length=255)
     */
    private $interlocuteurPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     */
    private $position;


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
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return Entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    
        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Entreprise
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
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
     * Set pays
     *
     * @param string $pays
     *
     * @return Entreprise
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    
        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
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
     * Set interlocuteurNom
     *
     * @param string $interlocuteurNom
     *
     * @return Entreprise
     */
    public function setInterlocuteurNom($interlocuteurNom)
    {
        $this->interlocuteurNom = $interlocuteurNom;
    
        return $this;
    }

    /**
     * Get interlocuteurNom
     *
     * @return string
     */
    public function getInterlocuteurNom()
    {
        return $this->interlocuteurNom;
    }

    /**
     * Set interlocuteurPrenom
     *
     * @param string $interlocuteurPrenom
     *
     * @return Entreprise
     */
    public function setInterlocuteurPrenom($interlocuteurPrenom)
    {
        $this->interlocuteurPrenom = $interlocuteurPrenom;
    
        return $this;
    }

    /**
     * Get interlocuteurPrenom
     *
     * @return string
     */
    public function getInterlocuteurPrenom()
    {
        return $this->interlocuteurPrenom;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return Entreprise
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }
}

