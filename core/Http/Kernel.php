<?php

namespace Core\Http;

use Closure;
use Core\Exceptions\ExceptionRouteInterface;
use Core\Exceptions\ResponseException;
use Core\Routing\RouterInterface;
use Exception;
use League\Container\Container;

class Kernel
{
    public function __construct(
        private RouterInterface $router,
        private Container $container
    )
    {
    }
    public function handle(Request $request): ResponseInterface
    {
        try{
            $initAction = $this->router->dispatch($request, $this->container);
            if($initAction[0] instanceof Closure){
                [$func, $routeParams] = $initAction;
                return $func($routeParams);
            }else{
                [[$controller,$method], $routeParams] = $initAction;
                return ($controller)->$method($routeParams);
            }
        }
        catch(ExceptionRouteInterface $exception){
            return new Response(
                content: $exception->getMessage(),
                status: $exception->getCode(),
                headers: []
            );
        }
        catch(ResponseException $exception){
            return new Response(
                content: "{$exception->getMessage()} {$exception->getCode()}",
                status: $exception->getCode(),
                headers: []
            );
        }
        // catch(Exception $exception){
        //     return new Response(
        //         content: "unexpected error",
        //         status: 500,
        //         headers: []
        //     );
        // }
    }
}