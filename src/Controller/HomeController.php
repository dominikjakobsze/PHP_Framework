<?php 

namespace App\Controller;

use Core\Controller\AbstractController;
use Core\Exceptions\ResponseException;
use Core\Http\JsonResponse;
use Core\Http\Response;
use Core\Http\ResponseInterface;

class HomeController extends AbstractController
{
    // 'GET', '/', [HomeController::class, 'index']
    public function index(): Response
    {
        return $this->renderTemplate(templatePath: 'index.html.twig', additionalArgs: ["test"=>"test"]);
    }

    // 'GET', '/posts/{id:\d+}', [HomeController::class, 'show']
    public function show($routeParams): Response
    {
        throw new ResponseException(message: "Need to authenticate", code: ResponseException::NEED_TO_AUTHENTICATE);
    }

    // 'GET', '/hometest', [HomeController::class, 'test']
    public function test(): ResponseInterface
    {
        return new JsonResponse(
            content: [
                "test" => [1,2,3],
                "get_params" => $_GET
            ],
            status: 200,
            headers: []
        );
    }
}