<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CopyTypeRepository")
 * @UniqueEntity("type")
 */
class CopyType
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=16, unique=true)
   * @Assert\NotBlank()
   */
  private $type;

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getType(): string
  {
    return $this->type;
  }

  /**
   * @param string $type
   */
  public function setType(string $type): void
  {
    $this->type = $type;
  }

  public function __toString(): string
  {
    return $this->getType();
  }
}
