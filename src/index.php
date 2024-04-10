<?php

require_once 'Route.php';
// Get request method
$method = $_SERVER['REQUEST_METHOD'];
// Get request URI
$uri = $_SERVER['REQUEST_URI'];
Route::handleRequest($uri, $method);
?>

<html>
   <head>
        <title>Test</title>
        <script src="js/index.js"></script>
   </head>
   <body>
        <div id="main">
          <h1>Simple Inventory App</h1>
          <button onclick="showAddInput()">Agregar Producto</button>
          <button onclick="showSearchInput()">Buscar Producto</button>
          <button onclick="getAllProducts()">Listar Producto</button>
        </div>
        <div id="add-input" style="display:none">
          <br><br><br>
          <label for="productName">Product Name</label>
          <input type="text" id="productName" name="productName">
          <label for="price">Unitary Price</label>
          <input type="number" id="price" name="price">
          <label for="quantity">Quantity</label>
          <input type="number" id="quantity" name="quantity">
          <button onclick="createNewProduct()">Add</button>
        </div>
        <div id="search-product" style="display:none">
          <br><br><br>
          <label for="searchProductName">Search for Product Name: </label>
          <input type="text" id="searchProductName" name="searchProductName">
          <button onclick="searchProduct()">buscar</button>
        </div>
        <div id="delete-product" style="display:none">
          <br><br><br>
          <label for="productId">Enter product Id to delete</label>
          <input type="text" id="productId" name="productId">
          <button onclick="deleteProduct()">Eliminar</button>
          <br>
          <span id="delete-notification" style="display:None">Deleted successfully</span>
        </div>
        <br><br>
        <div id="list-all"></div>
   </body>
</html>
