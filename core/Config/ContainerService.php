<?php

namespace Core\Config;

use League\Container\Container;

class ContainerService
{
    public function getContainer()
    {
        return new Container();
    }
}

