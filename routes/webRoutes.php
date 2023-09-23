<?php

use App\Controller\HomeController;
use Core\Exceptions\ExceptionRouteMediaNotFound;
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
    ],
    [
        'POST', '/testing/{id:\d+}', function($routeParams){
            return new Response("Hello! {$routeParams['id']}");
        }
    ],
    [
        'GET', '/{media:img|video|gif}/{path:.+}', function($routeParams){
            $media = $routeParams['media'];
            $path = $routeParams['path'];
            $mediaPath = BASE_PATH."/resources/{$media}/{$path}";
            if (file_exists($mediaPath)) {
                header("Content-Type: ".mime_content_type($mediaPath));
                readfile($mediaPath);
                exit();
            }
            throw new ExceptionRouteMediaNotFound();
        }
    ]
];