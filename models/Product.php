<?php

namespace models;

class Product {
    
    private string $name;
    private int $quantity;
    private float $price;

    // public function __construct(
    //     private string $name,
    //     private int $quantity,
    //     private float $price
    // ){}

    public function __construct($name, $quantity, $price) {
        $this->name     = $name;
        $this->quantity = $quantity;
        $this->price    = $price;
    }

    // getters
    public function getName() : string
    {
        return $this->name;
    }

    public function getQuantity() : int {
        return $this->quantity;
    }

    public function getPrice(): float{
        return $this->price;
    }

    // setters
    public function setName(string $name) : void 
    {
        $this->name = $name;
    }

    public function setQuantity(int $quantity): void  {
        $this->quantity = $quantity;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

}
