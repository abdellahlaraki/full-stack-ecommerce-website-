<?php
require "../config.php";
$id=$_GET["delete_Product"];


$query="DELETE FROM `Product` WHERE `Id`=$id";
$execute=mysqli_query($con,$query);
if($execute){
    header("location:tables.php?msgS= Products deleted succefully");
}else{
    header("location:tables.php?msgS=Failed to delete Product");
}

?>