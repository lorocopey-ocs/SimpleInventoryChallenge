<?php
    function generateProductTable($products)
    : void {
        if ($products) {
            echo "<table width='60%' border='1'>";
            echo "<tr bgcolor='#faebd7'><th>Code</th><th>Name</th><th>Amount</th><th>Price</th><th>Actions</th></tr>";
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>" . $product -> getId() . "</td>";
                echo "<td>" . $product -> getName() . "</td>";
                echo "<td>" . $product -> getAmount() . "</td>";
                echo "<td>" . $product -> getPrice() . "</td>";
                echo "<td><a href='/deleteProduct?id=" . $product -> getId() . "'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "There are no products.";
        }
    }


