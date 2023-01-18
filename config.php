<?php
$servername="localhost";
$username="root";
$password="";
$dbname="e-commerce";

$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con){
    echo "failed to connect ".mysqli_connect_error($con);
}else{
    //   echo "connected succesfully";
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
