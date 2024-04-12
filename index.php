<?php
require_once 'Inventory.php';

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
</head>
<body>
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
        <p>Product: <?php echo $product['name']; ?></p>
        <p>Quantity: <?php echo $product['quantity']; ?></p>
        <p>Price: <?php echo $product['price']; ?></p>
    <?php endif; ?>

    <!-- List all Products -->
    <h2>Products</h2>
    <ul>
        <?php foreach ($products as $product): ?>
            <li><?php echo $product['name']; ?> - <?php echo $product['quantity']; ?> - $<?php echo $product['price']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
