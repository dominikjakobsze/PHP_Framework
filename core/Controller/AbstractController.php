<?php

namespace Core\Controller;

use League\Container\Container;

abstract class AbstractController
{
    public function __construct(protected ?Container $container = null)
    {
        
    }
}