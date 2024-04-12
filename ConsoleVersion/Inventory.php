<?php
require_once('Product.php');

class Inventory {
    private $products = [];

    public function addProduct($name, $quantity, $price) {
        $product = new Product($name, $quantity, $price);
        $this->products[$name] = $product;
    }

    public function removeProduct($name) {
        if (isset($this->products[$name])) {
            unset($this->products[$name]);
            return true;
        }
        return false;
    }

    public function searchProduct($name) {
        if (isset($this->products[$name])) {
            return $this->products[$name];
        }
        return null;
    }

    public function listProducts() {
        return $this->products;
    }
}
?>
