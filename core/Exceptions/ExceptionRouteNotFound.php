<?php

namespace Core\Exceptions;

use Exception;

class ExceptionRouteNotFound extends Exception
{
    public function __construct()
    {
        parent::__construct(message: "Not Found", code: 404);
    }
}