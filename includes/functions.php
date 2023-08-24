<?php 
    function queryfailed($result){
        global $conn;

        if(!$result){
            die("Query Failed" . mysqli_error($conn));
        }
    }

    function queryProducts($conn)
    {
        $query = "SELECT * FROM products ORDER BY id DESC";
        $products = mysqli_query($conn, $query);
        if(!$products){
            die("Query Failed" . mysqli_error($conn));
        }

        return $products;
    }
?>