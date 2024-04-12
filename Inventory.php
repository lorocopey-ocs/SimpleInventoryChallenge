<?php

require_once 'Product.php';

class Inventory {
    private $products = [];

    public function addProduct($name, $quantity, $price) {
        $product = new Product($name, $quantity, $price);
        $this->products[$name] = $product;
    }

    public function deleteProduct($name) {
        if (isset($this->products[$name])) {
            unset($this->products[$name]);
            return true;
        }
        return false;
    }

    public function searchProduct($name) {
        if (isset($this->products[$name])) {
            $product = $this->products[$name];
            return "Name: {$product->name}, Quantity: {$product->quantity}, Price: {$product->price}";
        }
        return "Product not found.";
    }

    public function listProducts() {
        $list = "Product List:\n";
        foreach ($this->products as $product) {
            $list .= "Name: {$product->name}, Quantity: {$product->quantity}, Price: {$product->price}\n";
        }
        return $list;
    }
}

?>
