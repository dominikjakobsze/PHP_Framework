<?php

namespace Core\Exceptions;

use Exception;

class ResponseException extends Exception
{

    public const HTTP_BAD_REQUEST = 400;
    public const NEED_TO_AUTHENTICATE = 401;
    public const LACK_OF_PERMISSIONS = 403;
    public const NOT_FOUND = 404;
    public const INTERNAL_ERROR = 500;

    public function __construct(string $message = null, int $code)
    {
        parent::__construct(message: $message, code: $code);
    }
}