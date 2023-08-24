<?php 

$servername= 'localhost';
$username = 'root';
$password = '';
$dbname = 'developer_exam';

//CREATE CONNECTION
$conn = new mysqli($servername, $username, $password, $dbname);

// CREATE CONNECTION
if(mysqli_connect_error()){
    die("Database Connection Failed" . mysqli_connect_error());
}

// echo "SUCCESSFULLY CONNECTED";

?>
