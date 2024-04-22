<?php

use Services\InventoryService;

$heading = "Products";

$inventory = new InventoryService();
$inventory->loadFromFile('products.json');

$products = $inventory->getProducts();

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $products = $inventory->searchProduct($search);
}

return view('products/index', compact('heading', 'products'));
