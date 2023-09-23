<?php

namespace Core\Tests;

use Core\Container\Container;
use Core\Exceptions\ContainerException;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function test_a_service_can_be_retrieved_from_the_container()
    {
        $container = new Container();

        $container->add("dependant-class", DependantClass::class);

        $this->assertInstanceOf(DependantClass::class, $container->get("dependant-class"));
    }

    public function test_exception_is_thrown_a_service_cannot_be_found()
    {
        $container = new Container();

        $this->expectException(ContainerException::class);

        $container->add("dependant-class");
    }

    public function test_a_container_has_a_service()
    {
        $container = new Container();

        $container->add("dependant-class", DependantClass::class);

        $this->assertTrue($container->has("dependant-class"));
    }

    public function test_a_container_does_not_have_a_service()
    {
        $container = new Container();

        $this->assertFalse($container->has("dependant-class"));
    }
}

//help classes
class DependantClass
{
    public function example(){
        dd("test");
    }
}

// run tests => vendor/bin/phpunit core/Tests --colors