<?php

use Core\Exceptions\ExceptionRouteMediaNotFound;

return[
    define('BASE_PATH', dirname(__DIR__)),
    define('APP_ENV', "dev"),
    define('APP_BACKEND_URL', "http://localhost:7400"),
    define('APP_FRONTEND_URL', "http://localhost:7400")
];