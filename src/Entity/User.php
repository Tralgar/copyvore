<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
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
     * @ORM\Name
     * @ORM\Column(type="string", length=32)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Surname
     * @ORM\Column(type="string", length=32)
     * @Assert\NotBlank()
     */
    private $surname;

    /**
     * @ORM\Email
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Surname
     * @ORM\Column(type="string", length=32)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @ORM\Phone
     * @ORM\Column(type="string", length=16)
     */
    private $phone;

    /**
     * @ORM\StreetNumber
     * @ORM\Column(type="integer", length=6)
     */
    private $streetNumber;

    /**
     * @ORM\Street
     * @ORM\Column(type="string", length=64)
     */
    private $street;

    /**
     * @ORM\City
     * @ORM\Column(type="string", length=32)
     */
    private $city;

    /**
     * @ORM\Postcode
     * @ORM\Column(type="string", length=5)
     */
    private $postcode;
}
