<?php

use Services\InventoryService;

$heading = "Products";

$search = $_GET['search'];

$inventory = new InventoryService();
$inventory->loadFromFile('products.json');

$products = $inventory->searchProduct($search);

return view('products/index', [
    'heading' => $heading,
    'products' => $products,
]);
