<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\CommentsRepository")
 */
class Comments
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
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_comment", type="datetime")
     * @ORM\JoinColumn(nullable=true)
     */
    private $date_comment;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\Entreprise",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\Candidat",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $candidat;




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
     * Set comment
     *
     * @param string $comment
     *
     * @return Comments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }


    /**
     * Set dateComment
     *
     * @param \DateTime $dateComment
     *
     * @return Comments
     */
    public function setDateComment($dateComment)
    {
        $this->date_comment = $dateComment;

        return $this;
    }

    /**
     * Get dateComment
     *
     * @return \DateTime
     */
    public function getDateComment()
    {
        return $this->date_comment;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\Users $user
     *
     * @return Comments
     */
    public function setUser(\User\UserBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\UserBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }



    /**
     * Set entreprise
     *
     * @param \User\UserBundle\Entity\Entreprise $entreprise
     *
     * @return Comments
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
     * Set candidat
     *
     * @param \User\UserBundle\Entity\Candidat $candidat
     *
     * @return Comments
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
