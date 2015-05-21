<?php

namespace pfe\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CodeProduit
 *
 * @ORM\Table(name="code_produit")
 * @ORM\Entity
 */
class CodeProduit
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
     * @ORM\Column(name="NAME", type="string", length=45, nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTION", type="string", length=45, nullable=false)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Ligne", mappedBy="CodeProduit")
     */
    private $Ligne;



    /**
     * Set id
     *
     * @param integer $id
     * @return CodeProduit
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set name
     *
     * @param string $name
     * @return CodeProduit
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
     * Set description
     *
     * @param string $description
     * @return CodeProduit
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
     * Constructor
     */
    public function __construct()
    {
        $this->CodeProduit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add CodeProduit
     *
     * @param \pfe\FrontBundle\Entity\Ligne $codeProduit
     * @return CodeProduit
     */
    public function addCodeProduit(\pfe\FrontBundle\Entity\Ligne $codeProduit)
    {
        $this->CodeProduit[] = $codeProduit;

        return $this;
    }

    /**
     * Remove CodeProduit
     *
     * @param \pfe\FrontBundle\Entity\Ligne $codeProduit
     */
    public function removeCodeProduit(\pfe\FrontBundle\Entity\Ligne $codeProduit)
    {
        $this->CodeProduit->removeElement($codeProduit);
    }

    /**
     * Get CodeProduit
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodeProduit()
    {
        return $this->CodeProduit;
    }



    /**
     * Add Ligne
     *
     * @param \pfe\FrontBundle\Entity\Ligne $ligne
     * @return CodeProduit
     */
    public function addLigne(\pfe\FrontBundle\Entity\Ligne $ligne)
    {
        $this->Ligne[] = $ligne;

        return $this;
    }

    /**
     * Remove Ligne
     *
     * @param \pfe\FrontBundle\Entity\Ligne $ligne
     */
    public function removeLigne(\pfe\FrontBundle\Entity\Ligne $ligne)
    {
        $this->Ligne->removeElement($ligne);
    }

    /**
     * Get Ligne
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLigne()
    {
        return $this->Ligne;
    }

    public function  __toString(){
        return $this->name;
    }
}
