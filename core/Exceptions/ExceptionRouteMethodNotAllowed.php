<?php

namespace Core\Exceptions;

use Exception;
use Core\Exceptions\ExceptionRouteInterface;

class ExceptionRouteMethodNotAllowed extends Exception implements ExceptionRouteInterface
{
    public function __construct()
    {
        parent::__construct(message: "Route Method Not Allowed", code: 405);
    }
}   