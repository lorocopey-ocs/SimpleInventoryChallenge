<?php
require_once '../libs/Route.php';

use Libs\Route;

Route::get('/', function () {
    echo 'Lista de production';
});

Route::get('/product', function () {
    echo 'Lista de production';
});

Route::get('/product/:slug', function ($slug) {
    echo 'production: '.$slug;
});

Route::dispatch();
