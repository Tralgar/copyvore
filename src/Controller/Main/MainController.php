<?php

namespace App\Controller\Main;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends Controller
{
  /**
   * @Route("/", name="main")
   */
  public function index()
  {
    return $this->render('index.html.twig');
  }
}