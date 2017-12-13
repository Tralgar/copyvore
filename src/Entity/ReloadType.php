<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     *
     */
    private $copyType;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=10)
     */
    private $number;

    /**
     * @ORM\UnitPrice
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private $unitPrice;

    /**
     * @ORM\IsAvailable
     * @ORM\Column(type="boolean", options={"default" : true})
     */
    private $isAvailable;
}
