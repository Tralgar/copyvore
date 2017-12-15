<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
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
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName(string $name): void
  {
    $this->name = $name;
  }

  /**
   * @return string
   */
  public function getSurname(): string
  {
    return $this->surname;
  }

  /**
   * @param string $surname
   */
  public function setSurname(string $surname): void
  {
    $this->surname = $surname;
  }

  /**
   * @return string
   */
  public function getEmail(): string
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail(string $email): void
  {
    $this->email = $email;
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

  /**
   * @return string
   */
  public function getPhone(): string
  {
    return $this->phone;
  }

  /**
   * @param string $phone
   */
  public function setPhone(string $phone): void
  {
    $this->phone = $phone;
  }

  /**
   * @return int
   */
  public function getStreetNumber(): int
  {
    return $this->streetNumber;
  }

  /**
   * @param int $streetNumber
   */
  public function setStreetNumber(int $streetNumber): void
  {
    $this->streetNumber = $streetNumber;
  }

  /**
   * @return string
   */
  public function getStreet(): string
  {
    return $this->street;
  }

  /**
   * @param string $street
   */
  public function setStreet(string $street): void
  {
    $this->street = $street;
  }

  /**
   * @return string
   */
  public function getCity(): string
  {
    return $this->city;
  }

  /**
   * @param string $city
   */
  public function setCity(string $city): void
  {
    $this->city = $city;
  }

  /**
   * @return string
   */
  public function getPostcode(): string
  {
    return $this->postcode;
  }

  /**
   * @param string $postcode
   */
  public function setPostcode(string $postcode): void
  {
    $this->postcode = $postcode;
  }

  public function getCopyNumberByCopyType(CopyType $copyType): int
  {
    $numberCopiesFromReloads = 0;
    $numberCopiesFromOrders = 0;
    $reloadTypes = $this->getDoctrine()
                        ->getRepository(CopyType::class)
                        ->findBy(['copyType' => $copyType]);

    $reloads = $this->getDoctrine()
                    ->getRepository(Reload::class)
                    ->findBy(['user' => $this, 'reloadTypes' => $reloadTypes]);

    $orders = $this->getDoctrine()
                   ->getRepository(Order::class)
                   ->findBy(['user' => $this, 'copyType' => $copyType]);

    foreach ($reloads as $reload)
    {
      $numberCopiesFromReloads += $reload->getReloadType()->getNumber();
    }

    foreach ($orders as $order)
    {
      $numberCopiesFromOrders += $order->getNumber();
    }

    return $numberCopiesFromReloads - $numberCopiesFromOrders;
  }

  public function __toString(): string
  {
    return $this->getSurname() . " " . $this->getName();
  }
}
