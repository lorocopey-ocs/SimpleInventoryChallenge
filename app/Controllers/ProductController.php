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

    /**
     * List product
     * Return a list de products with all data or filter by name
     * the list show in the view the product/index
     * route: "/" or "/product"
     * @param array $request by default is empty, also it can contain the variable 'search'
    */
    public function index(array $request = [])
    {
        $products = $this->productService->lists();
        if (!empty($request)) {
           $products = $this->productService->searchByName($products, $request['search']);
        }

        return $this->view(route: 'product.index', params: ["products" => $products]);
    }

    public function create()
    {
        return $this->view(route: 'product.create');
    }

    public function store()
    {
        $data = $_POST;
        $this->productService->add($data);
        $this->redirect(route: '/');
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
        $this->productService->delete(id: $id);

        return $this->redirect(route: '/');
    }
}
