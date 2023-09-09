<?php declare(strict_types=1);

use Core\Http\Kernel;
use Core\Http\Request;
use Core\Http\Response;
use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

//Front Controller

require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = Request::createFromGlobals();

$kernel = new Kernel();

$dispatcher = simpleDispatcher(function(RouteCollector $router) {
    $router->addRoute('GET', '/', function(){
        return new Response(content: '<h1>Hi!</h1>');
    });
});

dd($request);

$routerInfo = $dispatcher->dispatch();

//$response = $kernel->handle($request);

//$response->send();

//dd($response);

// !@ everytime you add new library/package, you must index workspace !@ 
// View => command palette || right click and at the bottom "command palette"