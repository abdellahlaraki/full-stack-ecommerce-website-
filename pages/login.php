<?php
session_start();
require "../config.php";
$msgp = $msgu = "";
if (isset($_POST["submit"])) {
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    if (empty($username) ||  empty($password)) {
        if (empty($username)) {
            exit();
        }

        if (empty($password)) {
            exit();
        }
    } else {

        $query = "SELECT * FROM `Account` where Username='$username' and Password='$password' ";
        $execute = mysqli_query($con, $query);
        $check_acount = mysqli_num_rows($execute);
        if ($check_acount > 0) {
            echo "<scrip> alert('logged in succesfully'); </script>";
            header("location:index.php");
            while ($Account = mysqli_fetch_assoc($execute)) {
                $_SESSION["Account_id"] = $Account["Id"];
                $_SESSION["Account_Username"] = $Account["Name"];
            }
        } else {
            echo "not exist";
        }
    }
}
