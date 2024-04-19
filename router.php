<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => 'src/controllers/HomeController.php',
    // '/products' => 'src/controllers/ProductController.php',
];

route($uri, $routes);
