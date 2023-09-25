<?php

namespace Core\Routing;

use Core\Http\Request;

interface RouterInterface
{
    public function dispatch(Request $request);
}