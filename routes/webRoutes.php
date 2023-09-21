<?php

use App\Controller\HomeController;
use Core\Http\Response;

return [
    [
        'GET', '/', [HomeController::class, 'index']
    ],
    [
        'GET', '/posts/{id:\d+}', [HomeController::class, 'show']
    ],
    [
        'GET', '/test/{id:\d+}', function($routeParams){
            return new Response("Hello! {$routeParams['id']}");
        }
    ]
];