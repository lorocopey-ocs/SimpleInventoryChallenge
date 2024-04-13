<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Create Product</title>
</head>
<body>
<div>
    <button>Add Product</button>
    <h5>List Products</h5>
    <table>
        <thead>
        <th>Name</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td><?= $product['stock'] ?></td>
            <td><?= $product['price'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
