<?php
require "../config.php";
$id=$_GET["delete_order"];
echo $id;


$query="DELETE FROM `Orders` WHERE `Id_order`=$id";
$execute=mysqli_query($con,$query);
if($execute){
    header("location:index.php?msgS= Order deleted succefully");
}else{
    header("location:index.php?msgS=Failed to delete Product");
}

?>