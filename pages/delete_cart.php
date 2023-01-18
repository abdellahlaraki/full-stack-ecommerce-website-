<?php
session_start();
include "../config.php";
$id_client=$_SESSION["Account_id"];
$id_cart=$_GET["cart_id"];
$Query="DELETE FROM `cart` WHERE `Id_cart` =$id_cart AND `Id_client`=$id_client";
$execute=mysqli_query($con,$Query);
if($execute){
    header("location:cart-page.php?msgS=Product deleted succesfully");
}else{
    header("location:cart-page.php?msgS=Failed to delete the product");

}

?>