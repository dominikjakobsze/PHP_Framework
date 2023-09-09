<?php declare(strict_types=1);

use Core\Http\Kernel;
use Core\Http\Request;
use Core\Http\Response;

//Front Controller

require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = Request::createFromGlobals();

$kernel = new Kernel();

$response = $kernel->handle($request);

$response->send();

dd($response);