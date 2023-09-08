<?php declare(strict_types=1);
//Front Controller

require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = Request::createFromGlobals();

dd("test");