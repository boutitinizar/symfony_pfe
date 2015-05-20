<?php

namespace pfe\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestResult
 *
 * @ORM\Table(name="test_result")
 * @ORM\Entity
 */
class TestResult
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
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_HEURE", type="datetime", nullable=false)
     */
    private $dateHeure;

    /**
     * @var string
     *
     * @ORM\Column(name="CODE_PRODUCT", type="string", length=45, nullable=false)
     */
    private $codeProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="SERIAL_NUMBER", type="string", length=45, nullable=false)
     */
    private $serialNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="MOVEMENT", type="string", length=45, nullable=false)
     */
    private $movement;

    /**
     * @var string
     *
     * @ORM\Column(name="STATUS", type="string", length=45, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="DEFAULT", type="string", length=45, nullable=true)
     */
    private $default;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTION", type="string", length=256, nullable=true)
     */
    private $description;



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
     * Set dateHeure
     *
     * @param \DateTime $dateHeure
     * @return TestResult
     */
    public function setDateHeure($dateHeure)
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    /**
     * Get dateHeure
     *
     * @return \DateTime 
     */
    public function getDateHeure()
    {
        return $this->dateHeure;
    }

    /**
     * Set codeProduct
     *
     * @param string $codeProduct
     * @return TestResult
     */
    public function setCodeProduct($codeProduct)
    {
        $this->codeProduct = $codeProduct;

        return $this;
    }

    /**
     * Get codeProduct
     *
     * @return string 
     */
    public function getCodeProduct()
    {
        return $this->codeProduct;
    }

    /**
     * Set serialNumber
     *
     * @param string $serialNumber
     * @return TestResult
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * Get serialNumber
     *
     * @return string 
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Set movement
     *
     * @param string $movement
     * @return TestResult
     */
    public function setMovement($movement)
    {
        $this->movement = $movement;

        return $this;
    }

    /**
     * Get movement
     *
     * @return string 
     */
    public function getMovement()
    {
        return $this->movement;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return TestResult
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set default
     *
     * @param string $default
     * @return TestResult
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Get default
     *
     * @return string 
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return TestResult
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
}
