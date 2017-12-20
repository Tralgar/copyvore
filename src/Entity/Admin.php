<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 * @ORM\Table(name="copyvore_admin")
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
   * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="admin")
   */
  private $orders;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Reload", mappedBy="admin")
   */
  private $reloads;

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
  public function getLogin()
  {
    return $this->login;
  }

  /**
   * @param string $login
   */
  public function setLogin(string $login)
  {
    $this->login = $login;
  }

  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @param string $password
   */
  public function setPassword(string $password)
  {
    $this->password = $password;
  }

  /**
   * @return mixed
   */
  public function getOrders()
  {
    return $this->orders;
  }

  /**
   * @param mixed $orders
   */
  public function setOrders($orders)
  {
    $this->orders = $orders;
  }

  /**
   * @return mixed
   */
  public function getReloads()
  {
    return $this->reloads;
  }

  /**
   * @param mixed $reloads
   */
  public function setReloads($reloads)
  {
    $this->reloads = $reloads;
  }

  public function __toString()
  {
    return $this->getLogin();
  }
}
