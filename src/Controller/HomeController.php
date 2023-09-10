<?php 

namespace App\Controller;

use Core\Http\Response;

class HomeController
{
    public function index(): Response
    {
        return new Response('index');
    }
    public function show($routeParams): Response
    {
        return new Response("show post {$routeParams['id']}");
    }
}