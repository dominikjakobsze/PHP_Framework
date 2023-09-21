<?php

namespace Core\Routing;

use Core\Exceptions\ExceptionMethodNotAllowed;
use Core\Exceptions\ExceptionRouteNotFound;
use Core\Http\Request;
use Exception;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Router 
{
    public function dispatch(Request $request)
    {
        $dispatcher = $this->registerRoutes();
        $routeInfo = $this->handleRouteInfo($dispatcher, $request);
        $this->handleRouteStatus($routeInfo[0]);
        [$status, [$controller, $method], $routeParams] = $this->handleRouteInfo($dispatcher, $request);
        return [[$controller,$method], $routeParams];
    }

    private function handleRouteStatus(int $status): Exception|null
    {
        if($status == 0){
            throw new ExceptionRouteNotFound(message: "Not Found", code: 404);
        }
        if($status == 2){
            throw new ExceptionMethodNotAllowed(message: "Method Not Allowed", code: 405);
        }
        return null;
    }

    private function registerRoutes(): Dispatcher
    {
        return simpleDispatcher(function(RouteCollector $router) {
            $webRoutes = require_once BASE_PATH . '/routes/webRoutes.php';
            foreach($webRoutes as $route){
                $router->addRoute($route[0], $route[1], $route[2]);
            }
        });
    }

    private function handleRouteInfo(Dispatcher $dispatcher, Request $request): array
    {
        return $dispatcher->dispatch(
            httpMethod: $request->server['REQUEST_METHOD'], 
            uri: $request->getNormalizedPath()
        );
    }
}