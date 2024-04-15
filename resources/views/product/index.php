<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>List Product</title>
</head>
<body>
<div>
    <a href="/product/create">Add Product</a>
    <h5>List Products</h5>
    <form action="/product" method="get">
        <input type="text" name="search" id="txtSearch">
        <button type="submit">search</button>
    </form>
    <table>
        <thead>
        <th>Name</th>
        <th>Stock</th>
        <th>Price $</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product->name ?></td>
            <td><?= $product->stock ?></td>
            <td><?= $product->price ?></td>
            <td><a href="/product/<?= $product->id ?>">show</a></td>
            <td><a href="/product/<?= $product->id ?>/delete">delete</a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
