<?php
namespace controllers;

use Exception;
use models\Product;

require_once './models/Product.php';

class ProductController {
    private $inventory = [];

    public function __construct() {
        //Initialize the inventory with some example products
        $this->inventory[] = new Product('Product 1', 10, 20.00);
        $this->inventory[] = new Product('Product 2', 5, 15.00);
        $this->inventory[] = new Product('Product 3', 20, 30.00);
    }

    public function store($name, $quantity, $price) {
        // Add a new product to inventory
        try {
            // Create a new Product object and add it to the inventory
            $this->inventory[] = new Product($name, $quantity, $price);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function destroy($key) {
        try {
            // Check if the key exists in the inventory
            if (!array_key_exists($key, $this->inventory)) {
                throw new Exception('Invalid product ID');
            }else{
                // Delete a product the inventory
                unset($this->inventory[$key]);

                // Reindex the array after removing an element
                $this->inventory = array_values($this->inventory);
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function search($searchTerm) {
        try {
            // Check if the search term is empty
            if (empty($searchTerm)) {
                throw new Exception('Search term cannot be empty');
            }else{
                // Create an array to store the search results
                $searchResults = [];

                // Convert the search term to lowercase to do a case-insensitive search
                $searchTerm = strtolower($searchTerm);

                // Iterate over inventory and find products that match the search term
                foreach ($this->inventory as $key => $product) {
                    // Convert the product name to lowercase
                    $productName = strtolower($product->getName());

                    // Check if the product name contains the search term
                    if (strpos($productName, $searchTerm) !== false) {
                        // If the product matches, add it to the search results
                        $searchResults[] = [
                            'id'       => $key,
                            'name'     => $product->getName(),
                            'quantity' => $product->getQuantity(),
                            'price'    => $product->getPrice()
                        ];
                    }
                }
                // Convert search results to JSON format and return them
                return json_encode($searchResults);
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function listProducts() {
        
        // Create an array to store product data
        $productData = [];
    
        // Iterate over products and data
        foreach ($this->inventory as $key => $product) {
            $productData[] = [
                'id'        => $key,
                'name'      => $product->getName(),
                'quantity'  => $product->getQuantity(),
                'price'     => $product->getPrice()
            ];
        }
    
        // Return product data as a serialized array as JSON
        return json_encode($productData);
    }

    public function getInventory() {
        return $this->inventory;
    }

    public function editProduct($productId, $productName, $productQuantity, $productPrice) {
        // Search for the selected product
        $existingProduct = $this->inventory[$productId];
    
        // Edit 
        $existingProduct->setName($productName);
        $existingProduct->setQuantity($productQuantity);
        $existingProduct->setPrice($productPrice);
       
        return true;
    }
}
?>
