<?php require "../config.php";
$msgU = $msgE = $msgP = $msgC = $msgM = "";
if (isset($_POST["register"])) {
    $UserName = $_POST["Username_R"];
    $Email = $_POST["email_R"];
    $Password = $_POST["Password_R"];
    $ConfirmP = $_POST["Confirm_password_R"];

    if (empty($UserName) || empty($Email) || empty($Password) || empty($ConfirmP)) {
        if (empty($UserName)) {
            $msgU = "* empty feild";
        }
        if (empty($Email)) {
            $msgE = "* empty feild";
        }
        if (empty($Password)) {
            $msgP = "* empty feild";
        }
        if (empty($ConfirmP)) {
            $msgC = "* empty feild";
        }
    } else if ($Password != $ConfirmP) {
        $msgM = "password dont Matches";
    } else {
        $Query = "INSERT INTO `Account`(`Username`, `Email`, `Password`) VALUES ('$UserName','$Email','$Password');";
        $execute_Query = mysqli_query($con, $Query);
        if ($execute_Query) {
            // header("location:account_page.php?msgS=Account Created Suucesfully");
            echo "<script> alert('Account Created Suucesfully') </script>";
        }else{
            header("location:account_page.php?msgS=Failed to  Create an account ");
   
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="../pages/style.css" />
    <title>index page</title>
</head>

<body>
    <div class="container">
        <div class="nav">
            <div class="logo">
                <img src="../images/logo.png" />
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">home</a></li>
                    <li><a href="AllProduct.php">Products</a></li>

                </ul>
            </nav>
            <img src="../images/cart.png" width="30px" height="30px" />
            <img class="menu" src="../images/menu.png" width="30px" height="30px" />
        </div>
    </div>

    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="../images/image1.png">
                </div>
                <div class="col-2">
                    <div class="form-container">

                        <div class="form-btn">
                            <span onclick="login()">login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>
                        <form action="login.php" method="post" id="login-form">
                            <input type="text" name="Username" placeholder="Username">
                            <input type="password" name="Password" placeholder="Password">
                            <input type="submit" name="submit" class="btn account-p" value="Log in">
                        </form>
                        
                        <form method="post" id="register-form">
                        <span style="color: red;text-align:start;float:left;font-size:10px"><?php echo $msgM; ?></span>

                            <input type="text" name="Username_R" placeholder="Username"> <br>
                            <span style="color: red;text-align:start;float:left;font-size:10px"><?php echo $msgU; ?></span>
                            <input type="email" name="email_R" placeholder="email">
                            <span style="color: red;text-align:start;float:left;font-size:10px"><?php echo $msgE; ?></span>

                            <input type="password" name="Password_R" placeholder="Password"><br>
                            <span style="color: red;text-align:start;float:left;font-size:10px"><?php echo $msgP; ?></span>

                            <input type="password" name="Confirm_password_R" placeholder="Confirm password"> <br>
                            <span style="color: red;text-align:start;float:left;font-size:10px"><?php echo $msgC; ?></span>

                            <input type="submit" name="register" class="btn account-p" value="Sign up">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <script>
        const R = document.getElementById("register-form");
        const L = document.getElementById("login-form");
        const I = document.getElementById("Indicator");

        function register() {
            L.style.transform = "translateX(0px)";
            R.style.transform = "translateX(0px)";
            I.style.transform = "translateX(90px)";
        }

        function login() {
            L.style.transform = "translateX(300px)";
            R.style.transform = "translateX(300px)";
            I.style.transform = "translateX(10px)";
        }
    </script>
    <!-- footer -->
    <?php include "footer.php"; ?>
</body>

</html>