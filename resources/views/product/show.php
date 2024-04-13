<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Product</title>
</head>
<body>
    <a href="/product"> <- back</a>
    <h3>Product: <?= $product['name'] ?> </h3>
    <p><b>Stock:</b> <?= $product['stock'] ?></p>
    <p><b>Price ($):</b> <?= $product['price'] ?></p>
</body>
</html>
