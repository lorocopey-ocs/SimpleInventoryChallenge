<?php

namespace Services;

class InventoryService
{
    private array $products = [];

    public function addProduct(ProductService $product)
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

    public function saveToFile($filename): void
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
            $this->products[] = new ProductService(
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
