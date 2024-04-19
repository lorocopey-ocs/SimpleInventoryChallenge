<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = require base_path("routes.php");

route($uri, $routes);
