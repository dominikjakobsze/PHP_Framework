<?php declare(strict_types=1);

use Core\Http\Kernel;
use Core\Http\Request;
use Core\Http\Response;
use Core\Routing\Router;

//Front Controller

require_once dirname(__DIR__) . "/constants.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = Request::createFromGlobals();

$kernel = new Kernel(new Router());

$response = $kernel->handle($request);

$response->send();

dd($response);

// !@ everytime you add new library/package, you must index workspace !@ 
// View => command palette || right click and at the bottom "command palette"
// composer dump-autoload