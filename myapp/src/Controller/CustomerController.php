<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class CustomerController
{
    public function index(): Response
    {
        return new Response(
            '<html lang="en"><body><h1>Hello Customer</h1></body></html>'
        );
    }
}