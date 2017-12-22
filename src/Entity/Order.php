<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ORM\Table(name="copyvore_order")
 * @Assert\Callback(
 *   callback = "validate"
 * )
 */
class Order
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
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $label;

  /**
   * @ORM\Column(name="created_at", type="datetime")
   * @Assert\DateTime()
   */
  private $createdAt;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="orders")
   * @ORM\JoinColumn(nullable=false)
   */
  private $user;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Admin", inversedBy="orders")
   * @ORM\JoinColumn(nullable=false)
   */
  private $admin;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\CopyType")
   * @ORM\JoinColumn(nullable=false)
   */
  private $copyType;

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
   * @return int
   */
  public function getNumber()
  {
    return $this->number;
  }

  /**
   * @param int $number
   */
  public function setNumber(int $number)
  {
    $this->number = $number;
  }

  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }

  /**
   * @param string $label
   */
  public function setLabel(string $label)
  {
    $this->label = $label;
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
   * @return CopyType
   */
  public function getCopyType()
  {
    return $this->copyType;
  }

  /**
   * @param CopyType $copyType
   */
  public function setCopyType(CopyType $copyType)
  {
    $this->copyType = $copyType;
  }

  public function __toString()
  {
    return $this->getUser() . " " . $this->getNumber() . "x" . $this->getCopyType() . " Par " . $this->getAdmin();
  }

  public function validate(ExecutionContextInterface $context)
  {
    $copyNumber = $this->getUser()->getCopyNumberByCopyType($this->getCopyType());
    if ($this->getNumber() > $copyNumber)
    {
      $copyNumber *= (-1);
      $context->buildViolation("Cet utilisateur n\'a pas assez de recharge, il manque $copyNumber copies " . $this->getCopyType()->getType() . "!")
              ->atPath('copyType')
              ->addViolation();

      $context->buildViolation('Cet utilisateur n\'a pas assez de recharge pour ce le type de copie choisis !')
              ->atPath('number')
              ->addViolation();
    }
  }

}
