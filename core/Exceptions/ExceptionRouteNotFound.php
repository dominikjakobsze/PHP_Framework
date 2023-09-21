<?php

namespace Core\Exceptions;

use Exception;
use Core\Exceptions\ExceptionRouteInterface;

class ExceptionRouteNotFound extends Exception implements ExceptionRouteInterface
{
    public function __construct()
    {
        parent::__construct(message: "Not Found", code: 404);
    }
}