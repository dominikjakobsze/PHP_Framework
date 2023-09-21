<?php

namespace Core\Http;

use Core\Routing\Router;
use Exception;

class Kernel
{
    public function __construct(
        private Router $router
    )
    {
    }
    public function handle(Request $request)
    {
        try{
            [[$controller,$method], $routeParams] = $this->router->dispatch($request);
            return (new $controller())->$method($routeParams);
        }catch(Exception $exception){
            dd($exception);
        }
    }
}