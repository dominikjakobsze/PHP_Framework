<?php

namespace Core\Tests;

use Core\Container\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function test_a_service_can_be_retrieved_from_the_container()
    {
        $container = new Container();

        $container->add("dependant-class", DependantClass::class);

        $this->assertInstanceOf(DependantClass::class, $container->get("dependant-class"));
    }

    public function test_exception_is_thrown()
    {
        $container = new Container();

        $container->add("dependant");
    }
}

//help classes
class DependantClass
{
    
}

// run tests => vendor/bin/phpunit core/Tests --colors