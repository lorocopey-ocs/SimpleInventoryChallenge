<?php

require_once 'Controllers/ProductController.php';

class Route {

  public static function handleRequest($uri, $method) {
    $productController = new ProductController();
    // Split URI into parts
    $uriParts = explode('/', trim($uri, '/'));
    //echo json_encode( $_GET['productName']);
    //probably it is the index
    if(count($uriParts) == 1){
      return;
    }

    // Check for "product" route
    if ($uriParts[1] === 'product') {
      // Check for "get-products" method
      if (preg_match("/get-products/", $uriParts[2]) && $method === 'GET') {
        $productController->getProducts();
      }

      if ($uriParts[2] === 'add-products' && $method === 'POST') {
        $productController->addProduct();
      }

      if ($uriParts[2] === 'delete-product' && $method === 'DELETE') {
        $productController->deleteProduct($uriParts[3]);
      }

    }

    exit();
  }
}

