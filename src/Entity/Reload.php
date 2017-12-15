<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReloadRepository")
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
   * @ORM\ManyToOne(targetEntity="App\Entity\User")
   * @ORM\JoinColumn(nullable=false)
   */
  private $user;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Admin")
   * @ORM\JoinColumn(nullable=false)
   */
  private $admin;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\ReloadType")
   * @ORM\JoinColumn(nullable=false)
   */
  private $reloadType;

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
  public function getCreatedAt() : \DateTime
  {
    return $this->createdAt;
  }

  /**
   * @param \DateTime $createdAt
   */
  public function setCreatedAt(\DateTime $createdAt): void
  {
    $this->createdAt = $createdAt;
  }

  /**
   * @return User
   */
  public function getUser(): User
  {
    return $this->user;
  }

  /**
   * @param User $user
   */
  public function setUser(User $user): void
  {
    $this->user = $user;
  }

  /**
   * @return Admin
   */
  public function getAdmin(): Admin
  {
    return $this->admin;
  }

  /**
   * @param Admin $admin
   */
  public function setAdmin(Admin $admin): void
  {
    $this->admin = $admin;
  }

  /**
   * @return ReloadType
   */
  public function getReloadType(): ReloadType
  {
    return $this->reloadType;
  }

  /**
   * @param ReloadType $reloadType
   */
  public function setReloadType(ReloadType $reloadType): void
  {
    $this->reloadType = $reloadType;
  }

  public function __toString(): string
  {
    return $this->getUser() . " " . $this->getReloadType() . " Par " . $this->getAdmin();
  }
}
