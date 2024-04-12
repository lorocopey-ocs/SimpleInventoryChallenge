<?php
require_once 'functions.php';

class Inventory {
    private $inventoryFile = 'inventory.txt';

    // Method to add a product to inventory
    public function addProduct($name, $quantity, $price) {
        $data = "$name,$quantity,$price";
        appendToFile($this->inventoryFile, $data);
    }
    
    // Method to delete a product from inventory
    public function deleteProduct($name) {
        $products = $this->listProducts();
        foreach ($products as $key => $product) {
            if ($product['name'] === $name) {
                unset($products[$key]);
                break;
            }
        }
        // Convert $products array to string before writing to file
        $dataToWrite = array_map(function ($product) {
            return implode(',', $product);
        }, $products);
        writeToFile($this->inventoryFile, $dataToWrite);
    }

    // Method to search for a product in inventory
    public function searchProduct($name) {
        $products = $this->listProducts();
        foreach ($products as $product) {
            if ($product['name'] === $name) {
                return $product;
            }
        }
        return null;
    }

    // Method to list all products in inventory
    public function listProducts() {
        $lines = readFromFile($this->inventoryFile);
        $products = [];
        foreach ($lines as $line) {
            $data = explode(',', $line);
            // Check if array has at least three elements
            if (count($data) >= 3) {
                $products[] = [
                    'name' => $data[0],
                    'quantity' => $data[1],
                    'price' => $data[2]
                ];
            }
        }
        return $products;
    }
}
?>
