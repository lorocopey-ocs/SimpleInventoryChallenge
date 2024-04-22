<?php

namespace Services;

class InventoryService
{
    private array $products = [];


    public function addProduct(ProductService $product)
    {
        $this->products[] = $product;
    }

    public function findProduct($name)
    {
        foreach ($this->products as $product) {
            if ($product->getName() === $name) {
                return $product;
            }
        }
        return null;
    }

    public function removeProduct(ProductService $product): void
    {
        foreach ($this->products as $key => $value) {
            if ($value->getName() === $product->getName()) {
                unset($this->products[$key]);
            }
        }

        $this->saveToFile('products.json');
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

    public function getProducts(): array
    {
        $data = [];
        foreach ($this->products as $product) {
            $data[] = $product->toArray();
        }
        return $data;
    }

    public function searchProduct(string $name): ?array
    {
        foreach ($this->products as $product) {
            if (strtolower($product->getName()) === strtolower($name)) {
                $this->products = [];
                $this->products[] = $product->toArray();
                return $this->products;
            }
        }

        return null;
    }
}
