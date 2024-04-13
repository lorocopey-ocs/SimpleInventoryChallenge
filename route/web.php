<?php
require_once '../libs/Route.php';

use Libs\Route;
use App\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/:slug', function ($slug) {
    echo 'product: '.$slug;
});

Route::dispatch();
