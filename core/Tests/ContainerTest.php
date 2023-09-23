<?php

namespace Core\Tests;

use Core\Container\Container;
use PHPUnit\Framework\TestCase;
use Core\Tests\DependantClass;

class ContainerTest extends TestCase
{
    public function test_a_service_can_be_retrieved_from_the_container()
    {
        $container = new Container();

        $container->add("dependant-class");

        $this->assertInstanceOf(DependantClass::class, $container->get("dependant-class"));
    }
}

// run tests => vendor/bin/phpunit core/Tests --colors