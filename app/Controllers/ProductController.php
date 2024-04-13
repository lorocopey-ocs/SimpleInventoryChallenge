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
        $products = $this->productService->lists();
        return $this->view(route: 'product.index', params: ["products" => $products]);
    }

    public function create()
    {
        return $this->view(route: 'product.create');
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function delete()
    {

    }
}
