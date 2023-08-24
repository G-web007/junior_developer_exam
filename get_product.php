<?php include "includes/config.php"?>
<?php include "includes/functions.php"?>
<?php
    // Selecting All Products
    $products = queryProducts($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="mx-auto d-block m-5 col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-secondary">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name:</th>
                                        <th>Unit:</th>
                                        <th>Price:</th>
                                        <th>Expiry Date:</th>
                                        <th>Inventory:</th>
                                        <th>Available Cost:</th>
                                        <th>Image:</th>
                                        <th colspan='2' class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($products as $product){
                                    $product_id         = $product['id'];
                                    $product_name       = $product['product_name'];
                                    $product_unit       = $product['unit'];
                                    $product_price      = $product['price'];
                                    $product_expiryDate = $product['expiry_date'];
                                    $product_inventory  = $product['available_inventory'];
                                    $product_cost       = $product['inventory_cost'];
                                    $product_image      = $product['image'];

                                    echo "<tr>";
                                    echo    "<td>$product_id</td>";    
                                    echo    "<td>$product_name</td>";
                                    echo    "<td>$product_unit</td>";
                                    echo    "<td>$product_price</td>";
                                    echo    "<td>$product_expiryDate</td>";
                                    echo    "<td>$product_inventory</td>";
                                    echo    "<td>$product_cost</td>";
                                    echo    "<td><img src='images/$product_image' width='50' class='rounded'></td>";
                                ?>
                                    <td>
                                        <a href="edit_product.php?id=<?php echo $product_id;?>" class="btn btn-info text-white">Edit</a>
                                        <button class='btn btn-danger delete-btn' data-id='<?php echo $product_id; ?>'>Delete</button>
                                    </td>
                                    <?php echo '</tr>';?>
                                <?php }?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>