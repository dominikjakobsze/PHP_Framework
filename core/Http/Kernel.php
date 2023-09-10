<?php

namespace Core\Http;

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        // $webRoutes = require_once BASE_PATH . '/routes/webRoutes.php';
        // //dd($webRoutes);
        // foreach($webRoutes as $route){
        //     //dd(...$route);
        // }
        $dispatcher = simpleDispatcher(function(RouteCollector $router) {

            /*
                return [
                    [
                        'GET', '/', [HomeController::class, 'index']
                    ]
                ];
                $router->addRoute($route[0], $route[1], $route[2]);
                $route[0] = GET
                $route[1] = /
                $route[2] = [HomeController::class, 'index']
            */

            $webRoutes = require_once BASE_PATH . '/routes/webRoutes.php';
            foreach($webRoutes as $route){
                $router->addRoute($route[0], $route[1], $route[2]);
                // $router->addRoute(...$route);
            }

        });

        $routerInfo = $dispatcher->dispatch(
            httpMethod: $request->server['REQUEST_METHOD'], 
            uri: $request->getNormalizedPath()
        );

        // 0,1,2 => [$status, $handler, $routeParams] = $routerInfo;

        [$status, [$controller, $method], $routeParams] = $routerInfo;

        $result = new $controller();
        
        return $result->$method($routeParams);

        //return $routerInfo[1]($routerInfo[2]);
        
        //return $routerInfo[1]($routerInfo[2], $additionalData); => function($routeParams, $anyNameForAdditionalData)
    }
}