<?php
require "../config.php";
$id=$_GET["delete_account"];

$query="DELETE FROM `Account` WHERE `Id`=$id";
$execute=mysqli_query($con,$query);
if($execute){
    header("location:Clients_Accounts.php?msgS= Account deleted succefully");
}else{
    header("location:Clients_Accounts.php?msgS=Failed to delete Account");
}
?>