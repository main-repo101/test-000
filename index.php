<?php

require_once __DIR__ . "/src/main/php/test_group/test_000/autoload-config.php";

use test_group\test_000\util\Server;
use test_group\test_000\util\Response;
use test_group\test_000\util\Debug;
use test_group\test_000\util\Asset;


$ROUTES = [
    "/" => [
        "url" => Asset::resolveControllerUrl("index.php"),
        "title" => "Home"
    ],
    "/sign-in" => [
        "url" => Asset::resolveControllerUrl("sign-in.php"),
        "title" => "Sign-In"
    ],
    "/sign-up" => [
        "url" => Asset::resolveControllerUrl("sign-up.php"),
        "title" => "Sign-Up"
    ]
];


function route_to_controller(array $routes): void
{

    $REQUEST_PATH = Server::getRequestedPath();

    if (array_key_exists($REQUEST_PATH, $routes)) {
        $_SESSION[Server::SESSION_KEY_STATUS] = Response::OK;
        $REQUEST_ROUTES = $routes[$REQUEST_PATH];
        $PAGE_TITLE = "Test 000" . " - " . $REQUEST_ROUTES["title"]; //REM: [TODO] .|. What??? No way...
        // http_response_code(Response::OK->value);
        require_once $REQUEST_ROUTES["url"];
    } else {
        $_SESSION[Server::SESSION_KEY_STATUS] = Response::NOT_FOUND;
        $PAGE_TITLE = "Test 000" . " - " . Response::NOT_FOUND->value; //REM: [TODO] .|. What??? No way...
        http_response_code(Response::NOT_FOUND->value);
        require_once Asset::resolveControllerUrl("404.php");
        exit();
    }
}


route_to_controller($ROUTES);
