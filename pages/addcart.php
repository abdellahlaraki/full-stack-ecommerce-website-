<?php
session_start();
include "../config.php";


if (isset($_POST["add_cart"])) {
    $Client_id = $_SESSION["Account_id"];
    $product_Id = $_POST["product_id"];
    $product_size = $_POST["size"];
    $product_quantity=$_POST["quantity"];
    $query = "SELECT * FROM `cart` WHERE `Id_client`=$Client_id AND `id_product`=$product_Id ";
    $execute = mysqli_query($con, $query);
    $check_product = mysqli_num_rows($execute);
    if ($check_product > 0) {
         header("location:single-product.php?product=$product_Id&msgS=Product already added in cart");
    } else {
        $Query = "INSERT INTO `cart`(`id_product`, `Id_client`, `Product_size`,`Product_quantity`)
     VALUES ('$product_Id','$Client_id','$product_size','$product_quantity')";
        $execute = mysqli_query($con, $Query);
        if (isset($execute)) {
             header("location:cart-page.php?msgS=Product Added to Cart");
        } else {
             header("location:single-product.php?msgF=Failed to add product to cart");
        }
    }
}
