<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="copyvore_user")
 * @UniqueEntity("email")
 */
class User
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=32)
   * @Assert\NotBlank()
   */
  private $name;

  /**
   * @ORM\Column(type="string", length=32)
   * @Assert\NotBlank()
   */
  private $surname;

  /**
   * @ORM\Column(type="string", length=255, unique=true)
   * @Assert\NotBlank()
   * @Assert\Email()
   */
  private $email;

  /**
   * @ORM\Column(type="string", length=32)
   * @Assert\NotBlank()
   */
  private $password;

  /**
   * @ORM\Column(type="string", length=10, nullable=true)
   */
  private $phone;

  /**
   * @ORM\Column(name="street_number", type="integer", length=6, nullable=true)
   */
  private $streetNumber;

  /**
   * @ORM\Column(type="string", length=64, nullable=true)
   */
  private $street;

  /**
   * @ORM\Column(type="string", length=32, nullable=true)
   */
  private $city;

  /**
   * @ORM\Column(type="string", length=5, nullable=true)
   */
  private $postcode;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="user")
   */
  private $orders;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Reload", mappedBy="user")
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
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName(string $name)
  {
    $this->name = $name;
  }

  /**
   * @return string
   */
  public function getSurname()
  {
    return $this->surname;
  }

  /**
   * @param string $surname
   */
  public function setSurname(string $surname)
  {
    $this->surname = $surname;
  }

  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail(string $email)
  {
    $this->email = $email;
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
   * @return string
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * @param string $phone
   */
  public function setPhone(string $phone)
  {
    $this->phone = $phone;
  }

  /**
   * @return int
   */
  public function getStreetNumber()
  {
    return $this->streetNumber;
  }

  /**
   * @param int $streetNumber
   */
  public function setStreetNumber(int $streetNumber)
  {
    $this->streetNumber = $streetNumber;
  }

  /**
   * @return string
   */
  public function getStreet()
  {
    return $this->street;
  }

  /**
   * @param string $street
   */
  public function setStreet(string $street)
  {
    $this->street = $street;
  }

  /**
   * @return string
   */
  public function getCity()
  {
    return $this->city;
  }

  /**
   * @param string $city
   */
  public function setCity(string $city)
  {
    $this->city = $city;
  }

  /**
   * @return string
   */
  public function getPostcode()
  {
    return $this->postcode;
  }

  /**
   * @param string $postcode
   */
  public function setPostcode(string $postcode)
  {
    $this->postcode = $postcode;
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
    return $this->getSurname() . " " . $this->getName();
  }

  /**
   * @param $copyType CopyType
   *
   * @return int
   */
  public function getCopyNumberByCopyType(CopyType $copyType)
  {
    $reloads = $this->getReloads();
    $orders = $this->getOrders();

    $numberCopiesFromReloads = 0;
    $numberCopiesFromOrders = 0;

    foreach ($reloads as $reload)
    {
      $reloadType = $reload->getReloadType();
      if ($reloadType->getCopyType() == $copyType)
        $numberCopiesFromReloads += $reloadType->getNumber();
    }

    foreach ($orders as $order)
    {
      if ($order->getCopyType() == $copyType)
        $numberCopiesFromOrders += $order->getNumber();
    }

    return $numberCopiesFromReloads - $numberCopiesFromOrders;
  }
}
