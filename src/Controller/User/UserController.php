<?php

namespace App\Controller\User;

use App\Entity\CopyType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class UserController extends Controller
{
  /**
   * @Route("/account/", name="account")
   */
  public function account(AuthorizationCheckerInterface $authChecker)
  {
    if ($authChecker->isGranted('ROLE_ADMIN'))
    {
      return $this->redirectToRoute('admin');
    }

    $user = $this->getUser();

    return $this->render('account/show.html.twig', ['user' => $user, 'availableCopies' => $this->getAvailableCopies($user)]);
  }

  public function availableCopies(User $user)
  {
    return $this->render('user/copies.html.twig', ['availableCopies' => $this->getAvailableCopies($user)]);
  }

  private function getAvailableCopies(User $user)
  {
    $availableCopies = [];
    $copyTypes = $product = $this->getDoctrine()
                                 ->getRepository(CopyType::class)
                                 ->findAll();

    foreach ($copyTypes as $copyType)
    {
      $availableCopies[(string) $copyType] = $user->getCopyNumberByCopyType($copyType);
    }

    return $availableCopies;
  }

}