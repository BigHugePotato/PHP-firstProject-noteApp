<?php

$routes = require "routes.php";

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

function abort($code = 404)
{
    http_response_code($code);

    if ($code == 404) {
        require "./views/404.php";
    } elseif ($code == 403) {
        require "./views/403.php";
    } else {
        echo "Error: HTTP status code {$code}";
    }

    die();
}


function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

routeToController($uri, $routes);