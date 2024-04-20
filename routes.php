<?php

$router->get('/', 'src/controllers/home.php');
$router->get('/products', 'src/controllers/products/index.php');
$router->get('/products/create', 'src/controllers/products/create.php',);
$router->post('/products/store', 'src/controllers/products/store.php');
$router->delete('/products/delete', 'src/controllers/products/delete.php');

//dd($router->routes);
