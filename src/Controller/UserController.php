<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class UserController
{
    public function index()
    {
        return new Response(
            '<html><body>PAGE DES USERS</body></html>'
        );
    }
}