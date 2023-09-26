<?php

namespace Core\Exceptions;

use Exception;
use Core\Exceptions\ExceptionRouteInterface;

class ExceptionRouteMediaNotFound extends Exception implements ExceptionRouteInterface
{
    public function __construct()
    {
        parent::__construct(message: "Media Not Found", code: 503);
    }
}