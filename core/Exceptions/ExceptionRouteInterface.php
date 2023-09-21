<?php

namespace Core\Exceptions;

interface ExceptionRouteInterface
{
    public function getMessage();
    public function getCode();
}