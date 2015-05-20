<?php

namespace pfe\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CodeProduit
 *
 * @ORM\Table(name="code_produit", uniqueConstraints={@ORM\UniqueConstraint(name="NAME_UNIQUE", columns={"NAME"}), @ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class CodeProduit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NAME", type="string", length=45, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTION", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Ligne", mappedBy="CodeProduit")
     */
    private $CodeProduit;



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
}
