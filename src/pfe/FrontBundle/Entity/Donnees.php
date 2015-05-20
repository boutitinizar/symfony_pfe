<?php

namespace pfe\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donnees
 *
 * @ORM\Table(name="donnees")
 * @ORM\Entity
 */
class Donnees
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string", length=10, nullable=false)
     */
    private $heure;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_op", type="integer", nullable=false)
     */
    private $nbrOp;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne", type="string", length=225, nullable=false)
     */
    private $ligne;

    /**
     * @var float
     *
     * @ORM\Column(name="kosu", type="float", precision=10, scale=0, nullable=false)
     */
    private $kosu;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe", type="string", length=255, nullable=false)
     */
    private $equipe;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=false)
     */
    private $commentaire;



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
     * Set date
     *
     * @param \DateTime $date
     * @return Donnees
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set heure
     *
     * @param string $heure
     * @return Donnees
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return string 
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set nbrOp
     *
     * @param integer $nbrOp
     * @return Donnees
     */
    public function setNbrOp($nbrOp)
    {
        $this->nbrOp = $nbrOp;

        return $this;
    }

    /**
     * Get nbrOp
     *
     * @return integer 
     */
    public function getNbrOp()
    {
        return $this->nbrOp;
    }

    /**
     * Set ligne
     *
     * @param string $ligne
     * @return Donnees
     */
    public function setLigne($ligne)
    {
        $this->ligne = $ligne;

        return $this;
    }

    /**
     * Get ligne
     *
     * @return string 
     */
    public function getLigne()
    {
        return $this->ligne;
    }

    /**
     * Set kosu
     *
     * @param float $kosu
     * @return Donnees
     */
    public function setKosu($kosu)
    {
        $this->kosu = $kosu;

        return $this;
    }

    /**
     * Get kosu
     *
     * @return float 
     */
    public function getKosu()
    {
        return $this->kosu;
    }

    /**
     * Set equipe
     *
     * @param string $equipe
     * @return Donnees
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get equipe
     *
     * @return string 
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Donnees
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}
