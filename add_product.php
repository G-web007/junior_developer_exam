
<?php include "includes/config.php"?>
<?php include "includes/functions.php"?>
<?php
    $product_name       = $_POST['productName'];
    $product_unit       = $_POST['unit'];
    $product_price      = floatval($_POST['price']);
    $product_expiryDate = $_POST['expiryDate'];
    $product_inventory  = intval($_POST['inventory']);

    $product_image = $_FILES["image"]["name"];
    $product_image_temp = $_FILES["image"]["tmp_name"];

    move_uploaded_file($product_image_temp, "images/$product_image");

    // Calculate available inventory cost
    $inventory_cost = $product_inventory * $product_price;

    $query = "INSERT INTO products(product_name, unit, price, expiry_date, available_inventory, inventory_cost, image)";
    $query .= "VALUES('{$product_name}', '{$product_unit}', '{$product_price}', '{$product_expiryDate}', '{$product_inventory}', '{$inventory_cost}', '{$product_image}')";
    $create_posts_query = mysqli_query($conn, $query);
    queryfailed($create_posts_query);
?>
