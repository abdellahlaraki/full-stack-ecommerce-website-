<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" /> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->


  <style>
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      /* background-color: #f9f9f9; */
      min-width: 160px;
      /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
      padding: 12px 0;
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
  </head>
<body>
<div class="header">
    <div class="container">
      <div class="nav">
        <div class="logo">
          <img src="../images/logo.png" />
        </div>
        <nav>
          <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="AllProduct.php">Products</a></li>
            <!-- <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li> -->
            <?php
            if (isset($_SESSION["Account_id"])) {
            ?>
              <li>
                <div class="dropdown">
                  Account
                  <div class="dropdown-content">
                    <a href="Logout.php">Log out</a>
                  </div>
                </div>
              </li>
            <?php
            }
            ?>
            <li><a href="../admin/sign_admin.php">admin</a></li>

          </ul>
        </nav>
        <?php

        if (isset($_SESSION["Account_id"])) {
        ?>

          <a href="cart-page.php"><img src="../images/cart.png" width="30px" height="30px" /></a>
        <?php
        } else {
        ?>
          <a href="account_page.php">login</a>
        <?php
        }
        ?>
        <img class="menu" src="../images/menu.png" width="30px" height="30px">
      </div>
      
    </div>
  </div>
  <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>