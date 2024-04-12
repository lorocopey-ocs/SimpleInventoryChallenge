<?php

require_once 'Inventory.php';

// Example of usage
echo "Product Inventory\n";
$inventory = new Inventory();

// Add product
echo "Adding products...\n";

$inventory->addProduct("Shirt", 10, 20);
$inventory->addProduct("Pants", 5, 30);
$inventory->addProduct("Shoes", 15, 40);
$inventory->addProduct("Tie", 20, 10);

// List products
echo "Listing products...\n";
echo $inventory->listProducts();

// Search product
$product = "Shirt";
echo "Searching for product: ". $product . "\n";
echo $inventory->searchProduct($product) . "\n";

// Delete product
$product = "Pants";
echo "Deleting product ". $product ."\n";
$inventory->deleteProduct($product);

// List products after deletion
echo $inventory->listProducts();

?>
