<?php

use Core\Validator;
use Services\InventoryService;
use Services\ProductService;

$errors = [];

// Validating fields before save
if (! Validator::string(value: $_POST['name'], max: 255)) {
    $errors['name'] = "The name field is required with a right length [1-255]";
}

if (! Validator::string(value: $_POST['price'], max: 1000)) {
    $errors['price'] = "Price is required";
} elseif (! Validator::number(value: $_POST['price'])) {
    $errors['price'] = "Price must be a number";
}

if (! Validator::string(value: $_POST['quantity'], max: 1000)) {
    $errors['quantity'] = "Quantity is required";
} elseif (! Validator::number(value: $_POST['quantity'])) {
    $errors['quantity'] = "Quantity must be a number";
}

if (! empty($errors)) {
    return view('products/create', [
        'heading' => "Create product",
        'errors' => $errors,
    ]);
}


$product = new ProductService(name: $_POST['name'], price: $_POST['price'], quantity: $_POST['quantity']);
$inventory = new InventoryService();

$inventory->addProduct($product);
$inventory->saveToFile(filename: 'products.json');

header("Location: /products");
exit();
