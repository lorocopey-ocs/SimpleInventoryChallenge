<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Delete the product
    // return redirect('products');


    $productID = $_POST['id'];
    echo "Delete the product with ID: $productID";
}
