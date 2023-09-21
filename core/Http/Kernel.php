<?php

namespace Core\Http;

use Closure;
use Core\Routing\Router;
use Exception;

class Kernel
{
    public function __construct(
        private Router $router
    )
    {
    }
    public function handle(Request $request): Response
    {
        try{
            $initAction = $this->router->dispatch($request);
            if($initAction[0] instanceof Closure){
                [$func, $routeParams] = $initAction;
                return $func($routeParams);
            }else{
                [[$controller,$method], $routeParams] = $initAction;
                return (new $controller())->$method($routeParams);
            }
        }catch(Exception $exception){
            return new Response(
                content: $exception->getMessage(),
                status: $exception->getCode(),
                headers: []
            );
        }
    }
}