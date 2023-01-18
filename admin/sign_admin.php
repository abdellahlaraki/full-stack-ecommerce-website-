<?php
session_start();
require "../config.php";

if(isset($_POST["submit"])){
$username=$_POST["admin"];
$password=$_POST["password"];
$query="SELECT * FROM `admin` WHERE `admin`='$username' AND `Password`='$password'";
$execute=mysqli_query($con,$query);
$check_acount=mysqli_num_rows($execute);
if($check_acount>0){
    echo "<scrip> alert('logged in succesfully'); </script>";
    header("location:index.php");
    while($Account=mysqli_fetch_assoc($execute)){
        $_SESSION["Admin_id"]=$Account["Id"];
        $_SESSION["Admin_Username"]=$Account["Name"];
    }
}else{
    echo "not exist";
}
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>sign in</title>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h5>welcom back ,<span>admin</span> </h5>
    </div>

    <!-- Login Form -->
    <form  method="post">
      <input type="text" id="login" na class="fadeIn second" name="admin" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>

    

  </div>
</div>
</body>
</html>