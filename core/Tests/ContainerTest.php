<?php

namespace Core\Tests;

use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function test_a_service_can_be_retrieved_from_the_container()
    {
        $this->assertTrue(true);
    }
}

// run tests => vendor/bin/phpunit core/Tests --colors