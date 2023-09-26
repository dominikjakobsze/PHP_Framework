<?php 

namespace App\Controller;

use Core\Controller\AbstractController;
use Core\Exceptions\ResponseException;
use Core\Http\Response;
use Twig\Environment;

class HomeController extends AbstractController
{
    public function __construct(private HomeDependant $homeDependant, private Environment $twig)
    {
        
    }
    public function index(): Response
    {
        dd($this->container->get(Environment::class));
        return new Response('index');
    }
    public function show($routeParams): Response
    {
        throw new ResponseException(message: "login", code: ResponseException::NEED_TO_AUTHENTICATE);
        return new Response("show post {$routeParams['id']}, {$this->homeDependant->getTest()}");
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