<?php

namespace Oclinicals;

class Inventory
{
    private $products = [];

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function removeProduct(Product $product)
    {
        $index = array_search($product, $this->products);
        if ($index !== false) {
            unset($this->products[$index]);
        }
    }

    public function saveToFile($filename)
    {
        $data = [];
        foreach ($this->products as $product) {
            $data[] = [
                "name" => $product->getName(),
                "price" => $product->getPrice(),
                "quantity" => $product->getQuantity(),
            ];
        }
        file_put_contents($filename, json_encode($data));
    }

    public function loadFromFile($filename)
    {
        $data = json_decode(file_get_contents($filename), true);
        foreach ($data as $product) {
            $this->products[] = new Product(
                $product["name"],
                $product["price"],
                $product["quantity"]
            );
        }
    }

    public function getProducts()
    {
        return $this->products;
    }
}
