<?php
    $pageTitle = "Add Product";
    include 'Presentation/Extends/layout.php';
?>
<?php
    include 'Presentation/Extends/menu.php'; ?>
<h1>Add Product</h1>
<?php
    if ($_SERVER[ 'REQUEST_METHOD' ] === 'POST') {
        try {
            $name   = $_POST[ 'name' ];
            $amount = $_POST[ 'amount' ];
            $price  = $_POST[ 'price' ];
            
            $productService -> addProduct($name, $amount, $price);
            echo "<span style='color: green;'>Product added successfully.</span>";
            echo "<script>
                    setTimeout(function() {
                       window.location.href = '/'
                    }, 2000);
                </script>";
        } catch (Exception $e) {
            echo "<span style='color: red;'>Error adding product: .{$e->getMessage()} </span>";
        }
    } else {
        ?>
        <form action="/addProduct" method="post">
            <div style="margin-bottom: 10px;">
                <label for="name">Name:</label>
                <input required type="text" id="name" name="name">
            </div>
            <div style="margin-bottom: 10px;">
                <label for="amount">Amount:</label>
                <input required type="number" min="1" id="amount" name="amount">
            </div>
            <div style="margin-bottom: 10px;">
                <label for="price">Price:</label>
                <input required type="number" id="price" min="0.01" step="0.01" name="price">
            </div>
            <div>
                <input type="submit" value="Save">
            </div>
        </form>
        <?php
    }
?>

<?php
    include 'Presentation/Extends/footer.php'; ?>
