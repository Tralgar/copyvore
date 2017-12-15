<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 * @UniqueEntity("login")
 */
class Admin
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=32, unique=true)
   * @Assert\NotBlank()
   */
  private $login;

  /**
   * @ORM\Column(type="string", length=32)
   * @Assert\NotBlank()
   */
  private $password;

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
  public function getLogin(): string
  {
    return $this->login;
  }

  /**
   * @param string $login
   */
  public function setLogin(string $login): void
  {
    $this->login = $login;
  }

  /**
   * @return string
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * @param string $password
   */
  public function setPassword(string $password): void
  {
    $this->password = $password;
  }

  public function __toString(): string
  {
    return $this->getLogin();
  }
}
