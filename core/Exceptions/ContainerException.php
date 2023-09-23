<?php

namespace Core\Exceptions;

use Exception;
use Core\Exceptions\ContainerExceptionInterface;

class ContainerException extends Exception implements ContainerExceptionInterface
{
    public function __construct()
    {
        parent::__construct(message: "Container Exception", code: 503);
    }
}