<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function list()
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        foreach ($users as $user) {
            $user->url = $this->generateUrl('user_show', ['id' => $user->getId()]);
        }

        return $this->render('user/list.html.twig', ['users' => $users]);
    }

    public function show(int $id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Aucun utilisateur trouvé pour l\'id ' . $id);
        }

        return $this->render('user/show.html.twig', ['user' => $user]);
    }

    public function new()
    {
        $em = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername("Tralgar");
        $user->setEmail("leo.poupet@gmail.com");
        $user->setPassword("test");
        $user->setIsActive(true);

        $em->persist($user);
        $em->flush();

        return $this->render('user/new.html.twig');
    }
}