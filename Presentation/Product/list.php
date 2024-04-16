<?php
    $pageTitle = "List Products";
    include 'Presentation/Extends/layout.php';
?>
<?php
    include 'Presentation/Extends/menu.php'; ?>
<?php
    require_once 'productTable.php';
    $products = $productService -> listProducts();
    echo "<h2>Products in Inventory:</h2>";
    generateProductTable($products);
?>

<?php
    include 'Presentation/Extends/footer.php'; ?>
