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
        });
        
        $routerInfo = $dispatcher->dispatch($request->server['REQUEST_METHOD'], $request->server['REQUEST_URI']);

        // [$status, $handler, $vars] = $routerInfo;

        return $routerInfo[1]($routerInfo[2]);
    }
}