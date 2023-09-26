<?php

namespace Core\Controller;

use League\Container\Container;

abstract class AbstractController
{
    protected Container $container;

    public function __construct()
    {
        //dd($GLOBALS);
        $this->container = $GLOBALS['container'];
    }
}