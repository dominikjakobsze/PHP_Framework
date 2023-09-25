<?php

namespace Core\Routing;

use Core\Http\Request;
use League\Container\Container;

interface RouterInterface
{
    public function dispatch(Request $request, Container $container);
}