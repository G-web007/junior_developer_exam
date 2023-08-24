<?php include "includes/config.php"?>

<?php 
    if(isset($_GET['delete'])){
        $recordId = $_GET['delete'];

        $query = "DELETE FROM products WHERE id = {$recordId}";
        $delete_query = mysqli_query($conn, $query);
        header("Location: index.php");
    }
?>

<?php include "includes/header.php"?>

    <div class="container">
        <div class="row">
            <div class="mx-auto d-block col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-3">Product Management</h3>
                        <hr>
                        <form class="row g-3 needs-validation" id="productForm" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <label for="productName" class="form-label">Product Name:</label>
                                <input type="text" class="form-control" id="productName" name="productName" required>
                            </div>
                            <div class="col-md-4">
                                <label for="unit" class="form-label">Unit:</label>
                                <input type="text" class="form-control" id="unit" name="unit" required>
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label">Price:</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Price" required>
                            </div>
                            <div class="col-md-5">
                                <label for="expiryDate" class="form-label">Expiry Date:</label>
                                <input type="date" class="form-control" id="expiryDate" name="expiryDate" required>
                            </div>
                            <div class="col-md-3">
                                <label for="inventory" class="form-label">Available Inventory:</label>
                                <input type="number" class="form-control" id="inventory" name="inventory" required>
                            </div>
                            <div class="col-md-4">
                                <label for="inventory" class="form-label">Select Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="d-flex col-md-5 mx-auto d-block">
                                <button class="btn btn-primary flex-fill" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="productList"> 
            <!-- Product list will be displayed here -->
        </div>
    </div>

<?php include "includes/footer.php"?>




