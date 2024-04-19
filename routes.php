<?php

$router->get('/', 'src/controllers/HomeController.php');
$router->get('/products', 'src/controllers/products/IndexController.php');
$router->post('/products/create', 'src/controllers/products/CreateController.php',);
$router->delete('/products/delete', 'src/controllers/products/DeleteController.php');

dd($router->routes);
