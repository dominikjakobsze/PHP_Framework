<?php

namespace Core\Exceptions;

use Exception;

class ExceptionMethodNotAllowed extends Exception
{
    public function __construct()
    {
        parent::__construct(message: "Method Not Allowed", code: 405);
    }
}   