<?php declare(strict_types=1);

use Core\Http\Kernel;
use Core\Http\Request;
use Core\Routing\Router;

//Front Controller

require_once dirname(__DIR__) . "/constants.php";
require_once dirname(__DIR__) . "/vendor/autoload.php";

// http://localhost:7400/img/name.png
// make a handler for that

// // Matches /user/42, but not /user/xyz
// $r->addRoute('GET', '/user/{id:\d+}', 'handler');

// // Matches /user/foobar, but not /user/foo/bar
// $r->addRoute('GET', '/user/{name}', 'handler');

// // Matches /user/foo/bar as well
// $r->addRoute('GET', '/user/{name:.+}', 'handler');

// $requestUri = $_SERVER['REQUEST_URI'];
// if (strpos($requestUri, '/img/') === 0) {
//     $imagePath = BASE_PATH."/public/img/name.png";
//     if (file_exists($imagePath)) {
//         $imageInfo = getimagesize($imagePath);
//         if ($imageInfo !== false) {
//             header('Content-Type: ' . $imageInfo['mime']);
//         }
//         readfile($imagePath);
//         exit;
//     }
// }

$request = Request::createFromGlobals();

$kernel = new Kernel(new Router());

$response = $kernel->handle($request);

$response->send();

dd($response);

// !@ everytime you add new library/package, you must index workspace !@ 
// View => command palette || right click and at the bottom "command palette" and then type "index workspace"
// composer dump-autoload