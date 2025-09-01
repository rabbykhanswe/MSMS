<?php

$hostname = "localhost";
$username = "root"; 
$password = "";
$database = "msms";

$conn = mysqli_connect($hostname, $username, $password, $database); 

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    include 'index.php';
}

?>