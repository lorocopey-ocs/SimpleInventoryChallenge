<?php
require_once('Inventory.php');

$inventory = new Inventory();

// Function to display the menu and read user input
function showMenu() {
    echo "1. Add Product\n";
    echo "2. Remove Product\n";
    echo "3. Search Product\n";
    echo "4. List Products\n";
    echo "5. Exit\n";
    echo "Select an option: ";
    return trim(fgets(STDIN));
}

// Function to add a product to the inventory
function addProduct() {
    global $inventory;
    echo "Product Name: ";
    $name = trim(fgets(STDIN));
    echo "Quantity: ";
    $quantity = intval(trim(fgets(STDIN)));
    echo "Price: ";
    $price = floatval(trim(fgets(STDIN)));
    $inventory->addProduct($name, $quantity, $price);
    echo "Product added successfully.\n";
}

// Function to remove a product from the inventory
function removeProduct() {
    global $inventory;
    echo "Product Name to remove: ";
    $name = trim(fgets(STDIN));
    if ($inventory->removeProduct($name)) {
        echo "Product removed successfully.\n";
    } else {
        echo "Product does not exist in the inventory.\n";
    }
}

// Function to search for a product in the inventory
function searchProduct() {
    global $inventory;
    echo "Product Name to search: ";
    $name = trim(fgets(STDIN));
    $product = $inventory->searchProduct($name);
    if ($product) {
        echo "Name: {$product->name}, Quantity: {$product->quantity}, Price: {$product->price}\n";
    } else {
        echo "Product does not exist in the inventory.\n";
    }
}

// Function to list all products in the inventory
function listProducts() {
    global $inventory;
    $products = $inventory->listProducts();
    if (empty($products)) {
        echo "Inventory is empty.\n";
    } else {
        foreach ($products as $product) {
            echo "Name: {$product->name}, Quantity: {$product->quantity}, Price: {$product->price}\n";
        }
    }
}

// Main
while (true) {
    $option = showMenu();
    switch ($option) {
        case '1':
            addProduct();
            break;
        case '2':
            removeProduct();
            break;
        case '3':
            searchProduct();
            break;
        case '4':
            listProducts();
            break;
        case '5':
            exit();
        default:
            echo "Invalid option. Please try again.\n";
    }
}
?>
