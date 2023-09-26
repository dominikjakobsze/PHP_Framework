<?php 

namespace App\Controller;

use Core\Controller\AbstractController;
use Core\Exceptions\ResponseException;
use Core\Http\Response;

class HomeController extends AbstractController
{
    public function index(): Response
    {
        return new Response(
            content: ($this->container->get('twig'))->render('index.html', ['the' => 'variables', 'go' => 'here']),
            status: 200,
            headers: []
        );
    }
    public function show($routeParams): Response
    {
        throw new ResponseException(message: "login", code: ResponseException::NEED_TO_AUTHENTICATE);
        return new Response("show post {$routeParams['id']}");
    }
}

//do not do that, only test!
class HomeDependant
{
    public function getTest()
    {
        return "HomeDependant::class test::method => autowired class to HomeController";
    }
}