<?php declare(strict_types=1);

use Core\Http\Request;
use Core\Http\Response;

//Front Controller

require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = Request::createFromGlobals();

$response = new Response(content: '', status: 404, headers: []);

$response->send();

dd($response);