<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    public function showUserAction(Request $request)
    {
        $id = $request->query->get('id');

        return $this->redirectToRoute('easyadmin', array(
            'action' => 'show',
            'id' => $id,
        ));
    }
}