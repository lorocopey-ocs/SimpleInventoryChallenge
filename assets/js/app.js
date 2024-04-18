$(document).ready(function() {
    // Function to handle adding a product
    $('#addProductForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: formData + '&action=store',
            dataType: 'json',
            success: function(response) {
                // Clear the products table
                $('#productTable tbody').empty();

                // Close Modal Add
                $('#addProductModal').modal('hide');
                
                // Redraw the table with the updated products
                response.forEach(function(product) {
                    $('#productTable tbody').append('<tr><td>' + product.name + '</td><td>' + product.quantity + '</td><td>' + product.price + '</td><td><button class="btn btn-danger delete-product" data-id="'+product.id+'" data-name="'+product.name+'">Delete</button><button class="btn btn-primary edit-product" data-id="'+product.id+'" data-name="'+product.name+'"  data-quantity="'+product.quantity+'"  data-price="'+product.price+'" data-toggle="modal" data-target="#editProductModal">Edit</button></td></tr>');
                });
            }
        });
    });

    // Function to handle deleting a product
    $(document).on('click', '.delete-product', function() {
        var productName = $(this).data('name');
        var productId = $(this).data('id');
        if (confirm('Are you sure you want to delete ' + productName + '?')) {
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: 'productId=' + productId + '&action=destroy',
                dataType: 'json',
                success: function(response) {
                    // Clear the products table
                    $('#productTable tbody').empty();

                    // Redraw the table with the updated products
                    response.forEach(function(product) {
                        $('#productTable tbody').append('<tr><td>' + product.name + '</td><td>' + product.quantity + '</td><td>' + product.price + '</td><td><button class="btn btn-danger delete-product" data-id="'+product.id+'" data-name="'+product.name+'">Delete</button><button class="btn btn-primary edit-product" data-id="'+product.id+'" data-name="'+product.name+'"  data-quantity="'+product.quantity+'"  data-price="'+product.price+'" data-toggle="modal" data-target="#editProductModal">Edit</button></td></tr>');
                    });
                }
            });
        }
    });

    // Function to handle editing a product
    $(document).on('click', '.edit-product', function() {
        var productId       = $(this).data('id');
        var productName     = $(this).data('name');
        var productQuantity = $(this).data('quantity');
        var productPrice    = $(this).data('price');

        $('#editProductId').val(productId);
        $('#editProductName').val(productName);
        $('#editProductQuantity').val(productQuantity);
        $('#editProductPrice').val(productPrice);
    });

    // Function to handle saving changes to a product
    $('#editProductForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: formData + '&action=editProduct',
            dataType: 'json',
            success: function(response) {
                // Clear the products table
                $('#productTable tbody').empty();

                // Close Modal Edit
                $('#editProductModal').modal('hide');

                // Redraw the table with the updated products
                response.forEach(function(product) {
                    $('#productTable tbody').append('<tr><td>' + product.name + '</td><td>' + product.quantity + '</td><td>' + product.price + '</td><td><button class="btn btn-danger delete-product" data-id="'+product.id+'" data-name="'+product.name+'">Delete</button><button class="btn btn-primary edit-product" data-id="'+product.id+'" data-name="'+product.name+'"  data-quantity="'+product.quantity+'"  data-price="'+product.price+'" data-toggle="modal" data-target="#editProductModal">Edit</button></td></tr>');
                });
            }
        });
    });

    // function with jquery keyup input id="searchProduct" search in controller
    $(document).on('keyup','#searchProduct', function(event){
        let search = event.target.value
        if(search){
            $.ajax({
                type: 'GET',
                url: 'index.php',
                data: 'search=' + search +'&action=search',
                dataType: 'json',
                success: function(response) {
                    // Clear the products table
                    $('#productTable tbody').empty();

                    // Redraw the table with the updated products
                    response.forEach(function(product) {
                        $('#productTable tbody').append('<tr><td>' + product.name + '</td><td>' + product.quantity + '</td><td>' + product.price + '</td><td><button class="btn btn-danger delete-product" data-id="'+product.id+'" data-name="'+product.name+'">Delete</button><button class="btn btn-primary edit-product" data-id="'+product.id+'" data-name="'+product.name+'"  data-quantity="'+product.quantity+'"  data-price="'+product.price+'" data-toggle="modal" data-target="#editProductModal">Edit</button></td></tr>');
                    });
                }
            });
        }else{
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: 'action=index',
                dataType: 'json',
                success: function(response) {
                    // Clear the products table
                    $('#productTable tbody').empty();

                    // Redraw the table with the updated products
                    response.forEach(function(product) {
                        $('#productTable tbody').append('<tr><td>' + product.name + '</td><td>' + product.quantity + '</td><td>' + product.price + '</td><td><button class="btn btn-danger delete-product" data-id="'+product.id+'" data-name="'+product.name+'">Delete</button><button class="btn btn-primary edit-product" data-id="'+product.id+'" data-name="'+product.name+'"  data-quantity="'+product.quantity+'"  data-price="'+product.price+'" data-toggle="modal" data-target="#editProductModal">Edit</button></td></tr>');
                    });
                }
            });
        }
    });
});