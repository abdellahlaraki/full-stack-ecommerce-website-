<?php
require "../config.php";
$id=$_GET["delete_cat"];
echo $id;


$query="DELETE FROM `category` WHERE `Id_category`=$id";
$execute=mysqli_query($con,$query);
if($execute){
    header("location:view_categorie.php?msgS= category deleted succefully");
}else{
    header("location:view_categorie.php?msgS=Failed to delete Product");
}

?>