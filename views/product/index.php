<?php
include 'views/product/create.php';
include 'views/product/edit.php';
?>
<h2>Product List</h2>
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addProductModal">
    Add Product
</button>
<input type="text" id="searchProduct" class="form-control" placeholder="Search by name">
<table id="productTable" class="table table-striped" >
    <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price per Unit</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($productController->getInventory() as $key => $product): ?>
      <tr>
        <td><?php echo $product->getName(); ?></td>
        <td><?php echo $product->getQuantity(); ?></td>
        <td><?php echo $product->getPrice(); ?></td>
        <td>
          <button class="btn btn-danger delete-product" data-id="<?php echo $key; ?>" data-name="<?php echo $product->getName(); ?>">Delete</button>
          <button class="btn btn-primary edit-product" data-id="<?php echo $key; ?>" data-name="<?php echo $product->getName(); ?>" data-quantity="<?php echo $product->getQuantity(); ?>" data-price="<?php echo $product->getPrice(); ?>" data-toggle="modal" data-target="#editProductModal">Edit</button>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

