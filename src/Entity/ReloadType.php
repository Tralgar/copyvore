<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReloadTypeRepository")
 * @ORM\Table(name="copyvore_reload_type")
 * @UniqueEntity(
 *     fields={"copyType", "number", "unitPrice"},
 *     message="Cette combinaison de recharge (Type de copie, nombre et prix unitaire) existe déjà !"
 * )
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

  public function __construct()
  {
    $this->setIsAvailable(true);
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return int
   */
  public function getNumber()
  {
    return $this->number;
  }

  /**
   * @param int $number
   */
  public function setNumber(int $number)
  {
    $this->number = $number;
  }

  /**
   * @return float
   */
  public function getUnitPrice()
  {
    return $this->unitPrice;
  }

  /**
   * @param float $unitPrice
   */
  public function setUnitPrice(float $unitPrice)
  {
    $this->unitPrice = $unitPrice;
  }

  /**
   * @return bool
   */
  public function getIsAvailable()
  {
    return $this->isAvailable;
  }

  /**
   * @param bool $isAvailable
   */
  public function setIsAvailable(bool $isAvailable = true)
  {
    $this->isAvailable = $isAvailable;
  }

  /**
   * @return CopyType
   */
  public function getCopyType()
  {
    return $this->copyType;
  }

  /**
   * @param CopyType $copyType
   */
  public function setCopyType(CopyType $copyType)
  {
    $this->copyType = $copyType;
  }

  /**
   * @return string
   */
  public function getAmount()
  {
    return $this->getNumber() * $this->getUnitPrice();
  }

  public function __toString()
  {
    return $this->getCopyType() . " (" . $this->getNumber() . "x" . $this->getUnitPrice() . "€)";
  }
}
