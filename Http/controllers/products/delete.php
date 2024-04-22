<?php

use Services\InventoryService;

$inventory = new InventoryService();
$inventory->loadFromFile('products.json');

$productName = $_POST['name'];

$product = $inventory->findProduct($productName);

$inventory->removeProduct($product);

header("Location: /products");
exit();