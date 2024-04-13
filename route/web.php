<?php
require_once '../libs/Route.php';

use Libs\Route;
use App\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);

Route::get('/product/:slug', function ($slug) {
    echo 'product: '.$slug;
});

Route::dispatch();
