<?php include "includes/config.php"?>
<?php 

if(isset($_POST['id'])){
    $recordId = $_POST['id'];

    $query = "DELETE FROM products WHERE id = {$recordId}";
    $delete_query = mysqli_query($conn, $query);
    if(!$delete_query){
        die("Query Failed" .mysqli_error($conn));
    }
}

?>
