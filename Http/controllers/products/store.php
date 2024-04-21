<?php

use Core\Validator;
use Services\ProductService;
use Services\InventoryService;
use DataTransferObjects\ProductData;
use Http\Requests\CreateProductRequest;

// Receiving data from the form
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$request = new CreateProductRequest();

if (! $request->validate($name, $price, $quantity)) {
    return view('products/create', [
        'heading' => "Create product",
        'errors' => $request->errors(),
    ]);
}

$data = ProductData::fromArray($_POST);

$product = new ProductService(name: $data->name, price: $data->price, quantity: $data->quantity);
$inventory = new InventoryService();

$inventory->addProduct($product);
$inventory->loadFromFile(filename: 'products.json');
$inventory->saveToFile(filename: 'products.json');

header("Location: /products");
exit();
