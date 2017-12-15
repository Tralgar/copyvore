<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReloadTypeRepository")
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
  public function getNumber(): int
  {
    return $this->number;
  }

  /**
   * @param int $number
   */
  public function setNumber(int $number): void
  {
    $this->number = $number;
  }

  /**
   * @return float
   */
  public function getUnitPrice(): float
  {
    return $this->unitPrice;
  }

  /**
   * @param float $unitPrice
   */
  public function setUnitPrice(float $unitPrice): void
  {
    $this->unitPrice = $unitPrice;
  }

  /**
   * @return boolean
   */
  public function getIsAvailable(): boolean
  {
    return $this->isAvailable;
  }

  /**
   * @param boolean $isAvailable
   */
  public function setIsAvailable(boolean $isAvailable = true): void
  {
    $this->isAvailable = $isAvailable;
  }

  /**
   * @return CopyType
   */
  public function getCopyType(): CopyType
  {
    return $this->copyType;
  }

  /**
   * @param CopyType $copyType
   */
  public function setCopyType(CopyType $copyType): void
  {
    $this->copyType = $copyType;
  }

  /**
   * @return float
   */
  public function getAmount(): float
  {
    return $this->getNumber() * $this->getUnitPrice();
  }

  public function __toString(): string
  {
    return $this->getCopyType() . " (" . $this->getNumber() . "x" . $this->getUnitPrice() . "€)";
  }
}
