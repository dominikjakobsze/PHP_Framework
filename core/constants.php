<?php

use Core\Exceptions\ExceptionRouteMediaNotFound;

return[
    define('BASE_PATH', dirname(__DIR__)),
    define('APP_ENV', "dev"),
    define('APP_BACKEND_URL', "http://localhost:7400"),
    define('APP_FRONTEND_URL', "http://localhost:7400"),
    define(
        'APP_ROUTES',
        [
            [
                'GET', '/{media:img|video|gif|js|styles|node_modules}/{path:.+}', function($routeParams){
                    $media = $routeParams['media'];
                    $path = $routeParams['path'];
                    $mediaPath = BASE_PATH."/resources/{$media}/{$path}";
                    if($media === "node_modules"){
                        $mediaPath = BASE_PATH."/{$media}/{$path}";
                    }
                    if (file_exists($mediaPath)) {

                        header("Access-Control-Allow-Origin: ".APP_FRONTEND_URL);

                        http_response_code(200);

                        if($media === "js" || $media === "node_modules"){
                            header("Content-Type: application/javascript");
                        }
                        else if($media === "styles"){
                            header("Content-Type: text/css");
                        }
                        else{
                            header("Content-Type: ".mime_content_type($mediaPath));
                        }
                        readfile($mediaPath);
                        exit();
                    }
                    throw new ExceptionRouteMediaNotFound();
                }
            ]
        ]
    )
];