<?php 

namespace App\Controller;

use Core\Http\Response;

class HomeController
{
    public function __construct(private HomeDependant $homeDependant)
    {
        
    }
    public function index(): Response
    {
        return new Response('index');
    }
    public function show($routeParams): Response
    {
        return new Response("show post {$routeParams['id']}");
    }
}

//do not do that, only test!
class HomeDependant
{
    public function getTest()
    {
        return "test";
    }
}