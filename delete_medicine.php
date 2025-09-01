<?php
include 'conn.php';

$id = $_GET['deleteid'];

$sql = "delete from medicines where id = $id";

$result = mysqli_query($conn,$sql);

if($result){
    header('location:medicine.php');
    exit();
}
else{
    echo "Delete Error, Please try again later.";
}


?>