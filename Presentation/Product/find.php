<?php
    $pageTitle = "Find Product";
    include 'Presentation/Extends/layout.php';
?>
<?php
    include 'Presentation/Extends/menu.php'; ?>
<h1>Find Product</h1>
<?php
    require_once 'productTable.php';
    if ($_SERVER[ 'REQUEST_METHOD' ] === 'POST') {
        $name     = $_POST[ 'name' ];
        $products = $productService -> findProduct($name);
        generateProductTable($products);
    } else {
        ?>
        <form action="/findProduct" method="post">
            Product Name to Search: <input required type="text" name="name">
            <input type="submit" value="Find">
        </form>
        <?php
    }
?>
<?php
    include 'Presentation/Extends/footer.php'; ?>

