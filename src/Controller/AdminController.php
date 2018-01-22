<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends BaseAdminController
{
  private $encoder;

  public function __construct(UserPasswordEncoderInterface $encoder)
  {
    $this->encoder = $encoder;
  }

  protected function persistUserEntity(User $user)
  {
    $encodedPassword = $this->encoder->encodePassword($user, $user->getPassword());
    $user->setPassword($encodedPassword);

    parent::persistEntity($user);
  }

  protected function persistAdminEntity(Admin $admin)
  {
    $encodedPassword = $this->encoder->encodePassword($admin, $admin->getPassword());
    $admin->setPassword($encodedPassword);

    parent::persistEntity($admin);
  }

}