<?php

namespace pfe\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ligne
 *
 * @ORM\Table(name="ligne")
 * @ORM\Entity
 */
class Ligne
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
     * @var string
     *
     * @ORM\Column(name="nom_ligne", type="string", length=20, nullable=false)
     */
    private $nomLigne;

    /**
     * @var string
     *
     * @ORM\Column(name="Zone", type="string", length=50, nullable=false)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="Poste", type="string", length=20, nullable=false)
     */
    private $poste;

    /**
     * @var integer
     *
     * @ORM\Column(name="superviseur", type="integer", nullable=false)
     */
    private $superviseur;

    /**
     * @var integer
     *
     * @ORM\Column(name="teamleader", type="integer", nullable=false)
     */
    private $teamleader;

    /**
     * @var integer
     *
     * @ORM\Column(name="objectifligne", type="integer", nullable=false)
     */
    private $objectifligne;



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
     * Set nomLigne
     *
     * @param string $nomLigne
     * @return Ligne
     */
    public function setNomLigne($nomLigne)
    {
        $this->nomLigne = $nomLigne;

        return $this;
    }

    /**
     * Get nomLigne
     *
     * @return string 
     */
    public function getNomLigne()
    {
        return $this->nomLigne;
    }

    /**
     * Set zone
     *
     * @param string $zone
     * @return Ligne
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return string 
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set poste
     *
     * @param string $poste
     * @return Ligne
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string 
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set superviseur
     *
     * @param integer $superviseur
     * @return Ligne
     */
    public function setSuperviseur($superviseur)
    {
        $this->superviseur = $superviseur;

        return $this;
    }

    /**
     * Get superviseur
     *
     * @return integer 
     */
    public function getSuperviseur()
    {
        return $this->superviseur;
    }

    /**
     * Set teamleader
     *
     * @param integer $teamleader
     * @return Ligne
     */
    public function setTeamleader($teamleader)
    {
        $this->teamleader = $teamleader;

        return $this;
    }

    /**
     * Get teamleader
     *
     * @return integer 
     */
    public function getTeamleader()
    {
        return $this->teamleader;
    }

    /**
     * Set objectifligne
     *
     * @param integer $objectifligne
     * @return Ligne
     */
    public function setObjectifligne($objectifligne)
    {
        $this->objectifligne = $objectifligne;

        return $this;
    }

    /**
     * Get objectifligne
     *
     * @return integer 
     */
    public function getObjectifligne()
    {
        return $this->objectifligne;
    }
}
