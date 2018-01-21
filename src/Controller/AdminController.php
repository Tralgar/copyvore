<?php

namespace App\Controller;

use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminBundle;

class AdminController extends BaseAdminBundle
{
  protected function updateEntity($entity)
  {
    exit;
    // UserPasswordEncoderInterface $encoder
    // $user = $this->getUser();
    // $encoded = $encoder->encodePassword($user, $plainPassword);

    // $user->setPassword($encoded);
  }

}