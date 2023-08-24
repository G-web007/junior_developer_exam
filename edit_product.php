<?php include "includes/config.php"?>
<?php include "includes/functions.php"?>
<?php 

if(isset($_GET['id'])){
    $productId = $_GET['id'];
}

$query = "SELECT * FROM products WHERE id = $productId";
$products = mysqli_query($conn, $query);
queryfailed($products);

if(isset($_POST['submit'])){
    $product_name       = $_POST['productName'];
    $product_unit       = $_POST['unit'];
    $product_price      = floatval($_POST['price']);
    $product_date       = $_POST['expiryDate'];
    $product_inventory  = intval($_POST['inventory']);

    $product_image = $_FILES["image"]["name"];
    $product_image_temp = $_FILES["image"]["tmp_name"];

    move_uploaded_file($product_image_temp, "images/$product_image");
    if(empty($product_image)){
        $query = "SELECT * FROM products WHERE id ={$productId}"; 
        $select_image = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($select_image)){
                $product_image = $row['image'];
        }
    }

    // Calculate available inventory cost
    $inventory_cost = $product_inventory * $product_price;

    $query = "UPDATE `products` SET"; 
    $query .= "`product_name`='{$product_name}',`unit`='{$product_unit}',`price`='{$product_price}',`expiry_date`='{$product_date}',`available_inventory`='{$product_inventory}',`inventory_cost`='{$inventory_cost}',`image`='{$product_image}'"; 
    $query .= "WHERE id = {$productId}";
    $update_query = mysqli_query($conn, $query);
    queryfailed($update_query);
    header("Location: index.php");
}
?>
<?php include "includes/header.php"?>

    <div class="container">
        <div class="row">
            <div class="mx-auto d-block col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-3">Edit Product</h3>
                        <hr>
                        <?php 
                            foreach($products as $product){
                                $product_name      = $product['product_name']; 
                                $product_unit      = $product['unit'];
                                $product_price     = floatval($product['price']); 
                                $product_date      = $product['expiry_date'];
                                $product_inventory = intval($product['available_inventory']);
                                $product_cost      = $product['inventory_cost'];
                                $product_image     = $product['image'];
                            }
                        ?>
                        <form action=""  method="post" class="row g-3 needs-validation" id="editForm" enctype="multipart/form-data">
                            <input type="hidden" id="userId" class="form-control">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                    <img class="mx-auto d-block rounded" src="images/<?php echo $product_image;?>" width="100" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="productName" class="form-label">Product Name:</label>
                                <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $product_name;?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="unit" class="form-label">Unit:</label>
                                <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $product_unit;?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label">Price:</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $product_price;?>" required>
                            </div>
                            <div class="col-md-3">
                                <label for="expiryDate" class="form-label">Expiry Date:</label>
                                <input type="date" class="form-control" id="expiryDate" name="expiryDate" value="<?php echo $product_date;?>" required>
                            </div>
                            <div class="col-md-3">
                                <label for="inventory" class="form-label">Available Inventory:</label>
                                <input type="number" class="form-control" id="inventory" name="inventory" value="<?php echo $product_inventory;?>" required>
                            </div>
                            <div class="col-md-3">
                                <label for="inventory_cost" class="form-label">Available Inventory:</label>
                                <input type="text" class="form-control" id="inventory_cost" name="inventory_cost" value="<?php echo $product_cost;?>">
                            </div>
                            <div class="col-md-3">
                                <label for="inventory" class="form-label">Select Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="d-flex col-md-5 mx-auto d-block">
                                <button class="btn btn-primary flex-fill" name="submit" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>

</script>
<?php include "includes/footer.php"?>

