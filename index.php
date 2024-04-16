<?php

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    if ($uri === '/' || $uri === '/listProducts') {
        include './Presentation/Product/list.php';
    } elseif ($uri === '/addProduct') {
        include './Presentation/Product/add.php';
    } elseif ($uri === '/findProduct') {
        include './Presentation/Product/find.php';
    } else {
        echo "Not Found";
    }

