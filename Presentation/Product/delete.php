<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        try {
    
            echo "<script>
                    setTimeout(function() {
                        var element = document.getElementById('message');
                        if (element) {
                            element.style.display = 'none';
                        }
                    }, 1000);
                </script>";
            
            $productService->removeById($id);
            echo "<span id='message' style='color: green;'>Product deleted successfully.</span>";
            include 'Presentation/Product/list.php';
        } catch (Exception $e) {
            echo "<span id='message' style='color: red;'>Error deleting product: .{$e->getMessage()} </span>";
        }
    } else {
        echo "<span id='message' style='color: red;'>Invalid request. Please provide a product ID to delete.</span>";
    }
?>
<?php
