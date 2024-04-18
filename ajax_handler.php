<?php
use controllers\ProductController;

require_once 'controllers/ProductController.php';
// Log in if not logged in
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the controller instance is already stored in the session
if (!isset($_SESSION['productController'])) {
    //If not stored, create a new controller instance and store it in the session
    $_SESSION['productController'] = new ProductController();
}

$productController = $_SESSION['productController'];

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'index':
                echo $productController->listProducts();
                exit;
            case 'store':
                $productName     = $_POST['productName'];
                $productQuantity = $_POST['productQuantity'];
                $productPrice    = $_POST['productPrice'];
                $productController->store($productName, $productQuantity, $productPrice);

                // Return the updated inventory as JSON
                echo $productController->listProducts();
                exit;
            case 'destroy':
                $productId = $_POST['productId']; 
                $productController->destroy($productId);
                // Return updated inventory as JSON
                echo $productController->listProducts();
                exit;
            case 'editProduct':
                    $productName      = $_POST['editProductName'];
                    $productQuantity  = $_POST['editProductQuantity'];
                    $productPrice     = $_POST['editProductPrice'];
                    $productId        = $_POST['editProductId'];
                    $productController->editProduct($productId,$productName, $productQuantity, $productPrice);

                    // Return updated inventory as JSON
                    echo $productController->listProducts();
                    exit;
        }
    }
}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'search':
                $search = $_GET['search'];
                echo $productController->search($search);
                exit;
        }
    }
}

?>