<?php

$heading = "Products";

$products = [
    ['id' => 1, 'name' => 'Apple', 'quantity' => 2, 'price' => 1.99],
    ['id' => 2, 'name' => 'Banana', 'quantity' => 1, 'price' => 0.99],
    ['id' => 3, 'name' => 'Carrot', 'quantity' => 6, 'price' => 0.49],
];

return view('products/index', compact('heading', 'products'));
