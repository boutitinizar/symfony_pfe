<?php

namespace pfe\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CodeProduit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="pfe\FrontBundle\Entity\CodeProduitRepository")
 */
class CodeProduit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * @ORM\ManyToMany(targetEntity="Ligne", mappedBy="CodeProduit")
     */
    private $Ligne;

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
        $this->Ligne = new \Doctrine\Common\Collections\ArrayCollection();
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
}
