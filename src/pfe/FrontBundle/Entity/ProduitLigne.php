<?php

namespace pfe\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitLigne
 *
 * @ORM\Table(name="produit_ligne", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"}), @ORM\UniqueConstraint(name="NAME_UNIQUE", columns={"id-prod"})})
 * @ORM\Entity
 */
class ProduitLigne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="id-prod", type="string", length=45, nullable=false)
     */
    private $idProd = '';

    /**
     * @var string
     *
     * @ORM\Column(name="id_ligne", type="string", length=255, nullable=false)
     */
    private $idLigne;



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
     * Set idProd
     *
     * @param string $idProd
     * @return ProduitLigne
     */
    public function setIdProd($idProd)
    {
        $this->idProd = $idProd;

        return $this;
    }

    /**
     * Get idProd
     *
     * @return string 
     */
    public function getIdProd()
    {
        return $this->idProd;
    }

    /**
     * Set idLigne
     *
     * @param string $idLigne
     * @return ProduitLigne
     */
    public function setIdLigne($idLigne)
    {
        $this->idLigne = $idLigne;

        return $this;
    }

    /**
     * Get idLigne
     *
     * @return string 
     */
    public function getIdLigne()
    {
        return $this->idLigne;
    }
}
