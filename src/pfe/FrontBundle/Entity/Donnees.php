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
     * @var \Date
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
     * @ORM\ManyToOne(targetEntity="Ligne", inversedBy="donnees")
     * @ORM\JoinColumn(name="Ligne_id", referencedColumnName="id")
     */
    private $ligne;



    /**
     * @var string
     *
     * @ORM\Column(name="mudas_logistique", type="string", length=255, nullable=true)
     */
    private $mudas_logistique;

    /**
     * @var string
     *
     * @ORM\Column(name="mudas_maintenance", type="string", length=255, nullable=true)
     */
    private $mudas_maintenance;

    /**
     * @var string
     *
     * @ORM\Column(name="mudas_qualite", type="string", length=255, nullable=true)
     */
    private $mudas_qualite;

    /**
     * @var string
     *
     * @ORM\Column(name="mudas_changement_Ref", type="string", length=255, nullable=true)
     */
    private $mudas_changement_Ref;

    /**
     * @var string
     *
     * @ORM\Column(name="mudas_divers", type="string", length=255, nullable=true)
     */
    private $mudas_divers;







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

    /**
     * Set mudas_logistique
     *
     * @param string $mudasLogistique
     * @return Donnees
     */
    public function setMudasLogistique($mudasLogistique)
    {
        $this->mudas_logistique = $mudasLogistique;

        return $this;
    }

    /**
     * Get mudas_logistique
     *
     * @return string 
     */
    public function getMudasLogistique()
    {
        return $this->mudas_logistique;
    }

    /**
     * Set mudas_maintenance
     *
     * @param string $mudasMaintenance
     * @return Donnees
     */
    public function setMudasMaintenance($mudasMaintenance)
    {
        $this->mudas_maintenance = $mudasMaintenance;

        return $this;
    }

    /**
     * Get mudas_maintenance
     *
     * @return string 
     */
    public function getMudasMaintenance()
    {
        return $this->mudas_maintenance;
    }

    /**
     * Set mudas_qualite
     *
     * @param string $mudasQualite
     * @return Donnees
     */
    public function setMudasQualite($mudasQualite)
    {
        $this->mudas_qualite = $mudasQualite;

        return $this;
    }

    /**
     * Get mudas_qualite
     *
     * @return string 
     */
    public function getMudasQualite()
    {
        return $this->mudas_qualite;
    }

    /**
     * Set mudas_changement_Ref
     *
     * @param string $mudasChangementRef
     * @return Donnees
     */
    public function setMudasChangementRef($mudasChangementRef)
    {
        $this->mudas_changement_Ref = $mudasChangementRef;

        return $this;
    }

    /**
     * Get mudas_changement_Ref
     *
     * @return string 
     */
    public function getMudasChangementRef()
    {
        return $this->mudas_changement_Ref;
    }

    /**
     * Set mudas_divers
     *
     * @param string $mudasDivers
     * @return Donnees
     */
    public function setMudasDivers($mudasDivers)
    {
        $this->mudas_divers = $mudasDivers;

        return $this;
    }

    /**
     * Get mudas_divers
     *
     * @return string 
     */
    public function getMudasDivers()
    {
        return $this->mudas_divers;
    }
}
