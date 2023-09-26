<?php declare(strict_types=1);

use Core\Config\ContainerService;
use Core\Http\Kernel;
use Core\Http\Request;
use Core\Routing\Router;

//Front Controller

require_once dirname(__DIR__) . "/constants.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

$container = (new ContainerService)->getContainer();

$request = Request::createFromGlobals();

$kernel = $container->get(Kernel::class);

$response = $kernel->handle($request);

$response->send();

APP_ENV === "dev" ? dd($response) : null;

// !@ everytime you add new library/package, you must index workspace !@ 
// View => command palette || right click and at the bottom "command palette" and then type "index workspace"
// you change something in autoload => composer dump-autoload