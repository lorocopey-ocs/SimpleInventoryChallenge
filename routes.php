<?php

$router->get('/', 'controllers/home.php');
$router->get('/products', 'controllers/products/index.php');
$router->get('/products/create', 'controllers/products/create.php',);
$router->post('/products/store', 'controllers/products/store.php');
$router->delete('/products/delete', 'controllers/products/delete.php');

//dd($router->routes);
