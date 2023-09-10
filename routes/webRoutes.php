<?php

use App\Controller\HomeController;

return [
    [
        'GET', '/', [HomeController::class, 'index']
    ],
    [
        'GET', '/posts/{id:\d+}', [HomeController::class, 'show']
    ]
];