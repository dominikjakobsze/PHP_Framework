<?php 

namespace App\Controller;

use Core\Http\Response;

class HomeController
{
    public function index(): Response
    {
        return new Response('test');
    }
}