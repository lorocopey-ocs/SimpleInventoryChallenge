<?php

use Core\Validator;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // if (empty($errors)) {
    //     // Save the product
    // } else {
    //     // Handle validation errors
    //     return $errors;
    // }
}

$heading = "Create product";

// return view('add-product', compact('heading', 'errors'));
return view('products/create', [
    'heading' => $heading,
    'errors' => $errors ?? [],
]);
