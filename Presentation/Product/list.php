<?php
    $pageTitle = "List Productos";
    include 'Presentation/Extends/layout.php';
?>
<?php include 'Presentation/Extends/menu.php'; ?>
<h1>Listar Productos</h1>
<?php
    $products = $productService->listProducts();
    if ($products) {
        echo "<h2>Productos en el Inventario:</h2>";
        echo "<table width='60%' border='1'>";
        echo "<tr bgcolor='#faebd7'><th>Name</th><th>Amount</th><th>Price</th></tr>";
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>" . $product->getName() . "</td>";
            echo "<td>" . $product->getAmount() . "</td>";
            echo "<td>" . $product->getPrice() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay productos en inventario.";
    }
?>

<?php include 'Presentation/Extends/footer.php'; ?>
