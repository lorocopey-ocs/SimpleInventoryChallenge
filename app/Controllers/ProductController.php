<?php

namespace App\Controllers;
use App\Services\ProductService;

class ProductController extends Controller
{
    public ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService;
    }

    public function index()
    {
        return $this->productService->lists();
    }

    public function create()
    {

    }

    public function show()
    {

    }

    public function delete()
    {

    }
}
