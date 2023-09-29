<?php

use App\Controller\HomeController;
use App\Controller\PostController;
use Core\Http\Response;

return [
    [
        'GET', '/', [HomeController::class, 'index']
    ],
    [
        'GET', '/hometest', [HomeController::class, 'test']
    ],
    [
        'GET', '/home/{id:\d+}', [HomeController::class, 'show']
    ],
    [
        'GET', '/test/{id:\d+}', function($routeParams){
            return new Response("Hello! {$routeParams['id']}");
        }
    ],
    [
        'GET', '/posts', [PostController::class, "create"]
    ],
    [
        'POST', '/testing/{id:\d+}', function($routeParams){
            return new Response("Hello! {$routeParams['id']}");
        }
    ],
    ...APP_ROUTES
];