<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReloadTypeRepository")
 */
class ReloadType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=10)
     * @Assert\NotBlank()
     */
    private $number;

    /**
     * @ORM\Column(name="unit_price", type="decimal", precision=4, scale=2)
     * @Assert\NotBlank()
     */
    private $unitPrice;

    /**
     * @ORM\Column(name="is_available", type="boolean", options={"default" : true})
     */
    private $isAvailable;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CopyType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $copyType;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param mixed $unitPrice
     */
    public function setUnitPrice($unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return mixed
     */
    public function getisAvailable()
    {
        return $this->isAvailable;
    }

    /**
     * @param mixed $isAvailable
     */
    public function setIsAvailable($isAvailable): void
    {
        $this->isAvailable = $isAvailable;
    }

    /**
     * @return mixed
     */
    public function getCopyType()
    {
        return $this->copyType;
    }

    /**
     * @param mixed $copyType
     */
    public function setCopyType($copyType): void
    {
        $this->copyType = $copyType;
    }
}
