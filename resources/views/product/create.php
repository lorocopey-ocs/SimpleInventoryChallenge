<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <h4>Create a new product</h4>
    <form action="">
        <label for="txtName">Name:</label>
        <input type="text" name="name" id="txtName">
        <br>
        <label for="txtStock">Stock:</label>
        <input type="number" name="stock" id="txtStock" min="0">
        <br>
        <label for="txtPrice">Price($):</label>
        <input type="number" name="price" id="txtPrice" min="0" step="0.01">
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
