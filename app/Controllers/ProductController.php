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
        $data = $_POST;
        $products = $this->productService->add($data);
        return $this->view(route: 'product.index', params: ["products" => $products]);
    }

    public function show($id)
    {
        $product = $this->productService->findById(id: $id, type: 'value');
        return $this->view(route: 'product.show', params: ['product' => $product]);
    }

    public function delete($id)
    {
        $product = $this->productService->findById(id: $id, type: 'value');
        return $this->view(route: 'product.delete', params: ["product" => $product]);
    }

    public function destroy($id)
    {
        $products = $this->productService->delete(id: $id);

        return $this->redirect(route: '/product');
    }
}
