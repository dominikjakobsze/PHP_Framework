<?php

namespace Core\Routing;

class Router {
    public function dispatch()
    {

    $dispatcher = simpleDispatcher(function(RouteCollector $router) {

        $webRoutes = require_once BASE_PATH . '/routes/webRoutes.php';
        foreach($webRoutes as $route){
            $router->addRoute($route[0], $route[1], $route[2]);
        }

    });

    $routerInfo = $dispatcher->dispatch(
        httpMethod: $request->server['REQUEST_METHOD'], 
        uri: $request->getNormalizedPath()
    );

    [$status, [$controller, $method], $routeParams] = $routerInfo;

    $result = new $controller();
    
    return $result->$method($routeParams);

    }
}