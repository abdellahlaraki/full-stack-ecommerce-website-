<?php session_start();
require "../config.php";  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="../pages/style.css" />
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
  <title>index page</title>
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
            <li><a href="#">home</a></li>
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
      <div class="row">
        <div class="col-2">
          <h1>
            Give your workout <br />
            a new style!
          </h1>
          <p>
            Success isn’t always about greatness. It’s about consistency.
            Consistent <br />
            hard work gains success.Greatness will come.
          </p>
          <a href="#" class="btn">explore now &#8594;</a>
        </div>
        <div class="col-2">
          <img src="../images/image1.png" />
        </div>
      </div>
    </div>
  </div>
  <!--  featured categories -->
  <div class="categories">
    <div class="small-container">
      <div class="row">
        <div class="col-3">
          <img src="../images/category-1.jpg" alt="" srcset="" />
        </div>
        <div class="col-3">
          <img src="../images/category-2.jpg" alt="" srcset="" />
        </div>
        <div class="col-3">
          <img src="../images/category-3.jpg" alt="" srcset="" />
        </div>
      </div>
    </div>
  </div>
  <!-- featured products -->
  <?php
  //select * from people ORDER BY id DESC LIMIT 3
  $qeury = "SELECT * FROM `Product` ORDER BY Id DESC LIMIT 3 ";
  $execute = mysqli_query($con, $qeury);
  $check_exist = mysqli_num_rows($execute);
  ?>
  <div id="products" class="small-container">
    <h2 class="titel">featured Products</h2>
    <div class="row">
      <?php
      if ($check_exist > 0) {
        while ($fetch = mysqli_fetch_assoc($execute)) {
      ?>
          <div class="col-4">
            <a href="single-product.php?product=<?php echo $fetch["Id"] ?>">
                  <img src="../admin/Products_img/<?php echo $fetch["Img1"]?>" height="400" />
            </a>
            <h4><?php echo $fetch["Name"] ?></h4>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-regular fa-star"></i>
              <i class="fa-regular fa-star"></i>
            </div>
            <p><?php echo $fetch["Price"]."$"?></p>
          </div>
      <?php
        }
      }
      ?>

      <!-- <div class="col-4">
        <img src="../images/product-2.jpg" />
        <h4>red printed t-shirt</h4>
        <div class="rating">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </div>
        <p>50.00 $</p>
      </div>
      <div class="col-4">
        <img src="../images/product-3.jpg" />
        <h4>red printed t-shirt</h4>
        <div class="rating">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </div>
        <p>50.00 $</p>
      </div>
      <div class="col-4">
        <img src="../images/product-4.jpg" />
        <h4>red printed t-shirt</h4>
        <div class="rating">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </div>
        <p>50.00 $</p>
      </div>
      <div class="col-4">
        <img src="../images/product-5.jpg" />
        <h4>red printed t-shirt</h4>
        <div class="rating">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </div>
        <p>50.00 $</p>
      </div>
      <div class="col-4">
        <img src="../images/product-6.jpg" />
        <h4>red printed t-shirt</h4>
        <div class="rating">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </div>
        <p>50.00 $</p>
      </div>
      <div class="col-4">
        <img src="../images/product-7.jpg" />
        <h4>red printed t-shirt</h4>
        <div class="rating">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </div>
        <p>50.00 $</p>
      </div>
      <div class="col-4">
        <img src="../images/product-8.jpg" />
        <h4>red printed t-shirt</h4>
        <div class="rating">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </div>
        <p>50.00 $</p>
      </div> -->
    </div>
  </div>
  <div class="offer">
    <div class="small-container">
      <div class="row">
        <div class="col-2">
          <img src="../images/exclusive.png" class="offer-img" />
        </div>
        <div class="col-2">
          <p>exclusively available on RedStore</p>
          <h4>smart brand 4</h4>
          <small>
            The Mt Sort Bond 4 fectures 38.0% larger (than Mi Bard 3) AMOLED
            color Full- touch display with adjustable brightness on everything
            is clear as can be .
          </small>
          <a href="#" class="btn">buy now &#8594;</a>
        </div>
      </div>
    </div>
  </div>

  <!-- testimonial -->
  <div class="testimonial">
    <div class="small-container">
      <div class="row">
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis
            ipsum assumenda odit, veritatis tempore.
          </p>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <img src="../images/user-1.png" />
          <h3>sean parker</h3>
        </div>
        <!--  -->
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis
            ipsum assumenda odit, veritatis tempore.
          </p>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <img src="../images/user-2.png" />
          <h3>sean parker</h3>
        </div>

        <!--  -->
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis
            ipsum assumenda odit, veritatis tempore.
          </p>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <img src="../images/user-3.png" />
          <h3>sean parker</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- brands -->
  <div class="brand">
    <div class="small-container">
      <div class="row">
        <div class="col-5">
          <img src="../images/logo-coca-cola.png"/>
        </div>
        <div class="col-5">
          <img src="../images/logo-godrej.png"/>
        </div>
        <div class="col-5">
          <img src="../images/logo-oppo.png"/>
        </div>
        <div class="col-5">
          <img src="../images/logo-paypal.png"/>
        </div>
        <div class="col-5">
          <img src="../images/logo-philips.png"/>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <?php include "footer.php"; ?>
</body>

</html>