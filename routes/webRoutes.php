<?php

use Core\Http\Response;

return [
    [
        'GET', '/', [HomeController::class, 'index']
    ]
];