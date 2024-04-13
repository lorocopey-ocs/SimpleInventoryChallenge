<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete product</title>
</head>
<body>
    <div>
        <form action="/product/<?= $product['id'] ?>/delete" method="post">
            <h3>Delete Product</h3>
            <p>Are you sure delete the product <?= $product['name']?> ?</p>
            <button type="submit">Delete</button>
            <a href="/product"> Back</a>
        </form>
    </div>
</body>
</html>
