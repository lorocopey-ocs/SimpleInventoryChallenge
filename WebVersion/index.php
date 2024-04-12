<?php
require_once 'Inventory.php';

$products = []; 

$inventory = new Inventory();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add Product form submitted
    if (isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        // Call method to add product
        $inventory->addProduct($name, $quantity, $price);
    }
    // Delete Product form submitted
    elseif (isset($_POST['delete_product'])) {
        $name = $_POST['name'];

        // Call method to delete product
        $inventory->deleteProduct($name);
    }
    // Search Product form submitted
    elseif (isset($_POST['search_product'])) {
        $name = $_POST['name'];

        // Call method to search product
        $product = $inventory->searchProduct($name);
    }
}

// Call method to list products
$products = $inventory->listProducts();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inventory Management System</h1>

        <!-- Add Product Form -->
        <h2>Add Product</h2>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name" required><br>
            <label>Quantity:</label>
            <input type="number" name="quantity" required><br>
            <label>Price:</label>
            <input type="number" name="price" step="0.01" required><br>
            <button type="submit" name="add_product">Add Product</button>
        </form>

        <!-- Delete Product Form -->
        <h2>Delete Product</h2>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name" required><br>
            <button type="submit" name="delete_product">Delete Product</button>
        </form>

        <!-- Search Product Form -->
        <h2>Search Product</h2>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name" required><br>
            <button type="submit" name="search_product">Search Product</button>
        </form>

        <!-- Display Search Result -->
        <?php if (isset($product)): ?>
            <h2>Search Result</h2>
            <ul>
                <li><strong>Name:</strong> <?php echo $product['name']; ?></li>
                <li><strong>Quantity:</strong> <?php echo $product['quantity']; ?></li>
                <li><strong>Price:</strong> $<?php echo $product['price']; ?></li>
            </ul>
        <?php endif; ?>

        <!-- List all Products -->
        <h2>Products</h2>
        <ul>
            <?php foreach ($products as $product): ?>
                <li><?php echo $product['name']; ?> - <?php echo $product['quantity']; ?> - $<?php echo $product['price']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
