<?php

namespace Core\Http;

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function(RouteCollector $router) {

            $router->addRoute('GET', '/', function(){
                return new Response(content: '<h1>Hi!</h1>');
            });

            $router->addRoute('GET', '/posts/{id:\d+}', function($routeParams){
                dd($routeParams);
                return new Response(content: "<h1> This is post {$routeParams['id']} </h1>");
            });

        });

        $routerInfo = $dispatcher->dispatch(
            $request->server['REQUEST_METHOD'], 
            $request->getNormalizedPath()
        );

        // 0,1,2 => [$status, $handler, $routeParams] = $routerInfo;

        return $routerInfo[1]($routerInfo[2]);
        
        //return $routerInfo[1]($routerInfo[2], $someData); => function($routeParams, $anyNameForSomeData)
    }
}