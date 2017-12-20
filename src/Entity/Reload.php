<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReloadRepository")
 * @ORM\Table(name="copyvore_reload")
 */
class Reload
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(name="created_at", type="datetime")
   * @Assert\DateTime()
   */
  private $createdAt;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="reloads")
   * @ORM\JoinColumn(nullable=false)
   */
  private $user;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Admin", inversedBy="reloads")
   * @ORM\JoinColumn(nullable=false)
   */
  private $admin;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\ReloadType")
   * @ORM\JoinColumn(nullable=false)
   */
  private $reloadType;

  public function __construct()
  {
    $this->setCreatedAt(new \DateTime());
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return \DateTime
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * @param \DateTime $createdAt
   */
  public function setCreatedAt(\DateTime $createdAt)
  {
    $this->createdAt = $createdAt;
  }

  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }

  /**
   * @param User $user
   */
  public function setUser(User $user)
  {
    $this->user = $user;
  }

  /**
   * @return Admin
   */
  public function getAdmin()
  {
    return $this->admin;
  }

  /**
   * @param Admin $admin
   */
  public function setAdmin(Admin $admin)
  {
    $this->admin = $admin;
  }

  /**
   * @return ReloadType
   */
  public function getReloadType()
  {
    return $this->reloadType;
  }

  /**
   * @param ReloadType $reloadType
   */
  public function setReloadType(ReloadType $reloadType)
  {
    $this->reloadType = $reloadType;
  }

  public function __toString()
  {
    return $this->getUser() . " " . $this->getReloadType() . " Par " . $this->getAdmin();
  }

  public function getAmount()
  {
    return $this->getReloadType()->getNumber() * $this->getReloadType()->getUnitPrice();
  }
}
