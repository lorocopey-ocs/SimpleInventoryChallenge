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

    /**
     * View Create
     * Redirect to view of create
    **/
    public function create()
    {
        return $this->view(route: 'product.create');
    }

    /**
     * Save Product
     * Keep the data sent from form of view create
     * and redirect to the view "home"
     */
    public function store()
    {
        $data = $_POST;
        $this->productService->add($data);
        $this->redirect(route: '/');
    }

    /**
     * Show details of a product
     * search a product by id
     * @param $id
     * @return false|string
     */
    public function show($id)
    {
        $product = $this->productService->findById(id: $id, type: 'value');
        return $this->view(route: 'product.show', params: ['product' => $product]);
    }

    /**
     * View delete product
     * Look for a product to send the info to the view.
     * The view only is to verify before it deletes the product
     * @param $id
     * @return false|string
     */
    public function delete($id)
    {
        $product = $this->productService->findById(id: $id, type: 'value');
        return $this->view(route: 'product.delete', params: ["product" => $product]);
    }

    /**
     * Delete a product
     * Delete a product by id, that product cannot be recovered.
     * @param $id
     */
    public function destroy($id)
    {
        $this->productService->delete(id: $id);

        return $this->redirect(route: '/');
    }
}
