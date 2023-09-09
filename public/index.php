<?php declare(strict_types=1);

use Core\Http\Request;

//Front Controller

require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = Request::createFromGlobals();

dd($request);