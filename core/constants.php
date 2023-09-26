<?php

use Core\Exceptions\ExceptionRouteMediaNotFound;

return[
    define('BASE_PATH', dirname(__DIR__)),
    define('APP_ENV', "dev"),
    define(
        'APP_ROUTES',
        [
            [
                'GET', '/{media:img|video|gif|js|styles}/{path:.+}', function($routeParams){
                    $media = $routeParams['media'];
                    $path = $routeParams['path'];
                    $mediaPath = BASE_PATH."/resources/{$media}/{$path}";
                    if (file_exists($mediaPath)) {

                        http_response_code(200);

                        if($media === "js"){
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