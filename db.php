<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dedb1";
    $conn = new mysqli($servername, $username, $password, $database);
    
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Database Connected succesfully"

//kjo e bon lidhjen e databazes edhe e bojm include ne login edhe te register.php 
?>