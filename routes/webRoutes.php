<?php

use App\Controller\HomeController;
use Core\Http\Response;

return [
    [
        'GET', '/', [HomeController::class, 'index']
    ],
    [
        'GET', '/hometest', [HomeController::class, 'test']
    ],
    [
        'GET', '/posts/{id:\d+}', [HomeController::class, 'show']
    ],
    [
        'GET', '/test/{id:\d+}', function($routeParams){
            return new Response("Hello! {$routeParams['id']}");
        }
    ],
    [
        'POST', '/testing/{id:\d+}', function($routeParams){
            return new Response("Hello! {$routeParams['id']}");
        }
    ]
];