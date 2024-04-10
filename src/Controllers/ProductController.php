<?php

require_once 'Services/ProductService.php';
require_once 'Services/CorsService.php';
require_once 'Services/HTTPResponseService.php';
require_once 'Exceptions/ProductNotFoundException.php';

class ProductController {

    public ProductService $productService;

    function __construct(){
        $this->productService = new ProductService();
    }

    public function addProduct() {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->productService->save($data);
        
        header('Access-Control-Allow-Origin: *');
        header("Content-type: application/json; charset=utf-8");
        CorsService::addRestHeaders();
        
        echo json_encode($result);
    }
    
    public function deleteProduct(string $id) {
        CorsService::addRestHeaders();
        try{
            $this->productService->delete($id);
            HTTPResponseService::OK(['message'=>'The Record was deleted successfully']);
        }catch(ProductNotFoundException $productNotFound){
            HTTPResponseService::NotFound($productNotFound->getMessage());
        }
    }
    
    public function getProducts() {
        CorsService::addRestHeaders();
        if(isset($_GET['productName'])){
            echo json_encode($this->productService->filterByProductName($_GET['productName']));
        }else{
            echo json_encode($this->productService->findAll());
        }
    }

}

