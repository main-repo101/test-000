<?php

require_once __DIR__ . "/src/main/php/test_group/test_000/autoload-config.php";

use test_group\test_000\util\Server;


$ROUTES = [
    "/" => [
        "url" => "controller/index.php",
        "title" => "Home"
    ],
    "/sign-in" => [
        "url" => "controller/sign-in.php",
        "title" => "Sign-In"
    ],
    "/sign-up" => [
        "url" => "controller/sign-up.php",
        "title" => "Sign-Up"
    ]
];


function route_to_controller(array $routes): void
{

    $REQUEST_PATH = Server::getRequestedPath();

    if (array_key_exists($REQUEST_PATH, $routes)) {
        $REQUEST_ROUTES = $routes[$REQUEST_PATH];
        $PAGE_TITLE = "Test 000" . " - " . $REQUEST_ROUTES["title"]; //REM: [TODO] .|. What??? No way...
        require_once $REQUEST_ROUTES["url"];
    } else {
        $PAGE_TITLE = "Test 000" . " - 404"; //REM: [TODO] .|. What??? No way...
        http_response_code(404);
        require_once "controller/404.php";
        exit();
    }
}


route_to_controller($ROUTES);
