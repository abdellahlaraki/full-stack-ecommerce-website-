<?php
session_start();
include "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="../pages/style.css" />

  <script defer src="main.js"></script>
  <title>index page</title>
</head>

<body>
  <?php include "header.php"; ?>
  <!-- <div class="container">
    <div class="nav">
      <div class="logo">
        <img src="../images/logo.png" />
      </div>
      <nav>
        <ul>
          <li><a href="#">home</a></li>
          <li><a href="#products">Products</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Account</a></li>
        </ul>
      </nav>
      <img src="../images/cart.png" width="30px" height="30px" />
      <img class="menu" src="../images/menu.png" width="30px" height="30px" />
    </div>

  </div> -->
  <?php
  $id_product = $_GET["product"];
  $qeury = "SELECT * FROM `Product` WHERE `Id`=$id_product ";
  $execute = mysqli_query($con, $qeury);
  $check_exist = mysqli_num_rows($execute);
  if ($check_exist > 0) {
    while ($fetch = mysqli_fetch_assoc($execute)) {
  ?>
      <form action="addcart.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="product_id" value="<?php echo $fetch["Id"] ?>">
        <div class="small-container single-product">
          <div class="row">
            <div class="col-2">
              <img id="main-img" src="../admin/Products_img/<?php echo $fetch["Img1"]  ?>"  height="400" width="700" />
              <div class="small-img-row">
              <div class="small-img-col">
                  <img onmouseover="change(this.src)"  id="small-img" src="../admin/Products_img/<?php echo $fetch["Img1"]  ?>" >
                </div>
                <div class="small-img-col">
                  <img onmouseover="change(this.src)"  id="small-img" src="../admin/Products_img/<?php echo $fetch["Img2"]  ?>">
                </div>
                <div class="small-img-col">
                  <img onmouseover="change(this.src)" id="small-img" src="../admin/Products_img/<?php echo $fetch["Img3"]  ?>">
                </div>
                <div class="small-img-col">
                  <img onmouseover="change(this.src)" id="small-img" src="../admin/Products_img/<?php echo $fetch["Img4"]  ?>">
                </div>
                <!-- <div class="small-img-col">
                <img src="../admin/Products_img/">
              </div> -->
              </div>
            </div>
            <div class="col-2">


              <?php
              $id_cat = $fetch["categorie_id"];
              $cat_query = "SELECT `Nom_category` FROM `category` WHERE  `Id_category`=$id_cat";
              $execute_cat = mysqli_query($con, $cat_query);
              $row_cat = mysqli_fetch_assoc($execute_cat);
              ?>
              <p>Home /<?php echo $row_cat["Nom_category"]; ?> </p>
              <h1><?php echo $fetch["Name"]; ?></h1>
              <h4><?php echo $fetch["Price"] . "$"; ?></h4>
              <input type="number" name="quantity" value="1" style="width: 100px;" />
              <select name="size">
                <option selected value="S">S</option>
                <option value="M">M</option>
                <option value="XL">xl</option>
                <option value="XXL">xxl</option>
                <option value="XXL">xxxl</option>
              </select>
              <?php
              if (isset($_SESSION["Account_id"])) {
              ?>
                <!-- <a href="addcart.php?product_id=<?php echo $fetch["Id"] ?>" class="btn">add to cart</a> -->
                <button name="add_cart" class="btn">Add cart</button>

              <?php
              } else {
              ?>
                <a href="Account.php" class="btn">Login</a>
              <?php

              }
              ?>
              <h3>products details <i class="fa-solid fa-indent"></i>
              </h3>
              <p>
                <?php echo $fetch["Description"]; ?>
                <!-- Give your summer wardrobe a style upgrade with the HRX Men’s
                active T-shirt. Team it with a pair of shorts for your morning
                workout or a denims for an evening out with the guys. -->
              </p>

            </div>
          </div>
        </div>
      </form>
  <?php
    }
  }
  ?>


<?php
  //select * from people ORDER BY id DESC LIMIT 3
  $qeury = "SELECT * FROM `Product`   ORDER BY rand() DESC LIMIT 4  ";
  $execute = mysqli_query($con, $qeury);
  $check_exist = mysqli_num_rows($execute);
  ?>
  <!-- ALL  products -->
  <div id="products" class="small-container ">
    <div class="row">
    <?php
      if ($check_exist > 0) {
        while ($fetch = mysqli_fetch_assoc($execute)) {
      ?>
          <div class="col-4">
            <a href="single-product.php?product=<?php echo $fetch["Id"] ?>">
                  <img src="../admin/Products_img/<?php echo $fetch["Img1"]?>" height="300" />
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
      </div> -->
      <!-- <div class="col-4">
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
        <a href="#">view details</a> 
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

<!-- footer -->
<?php include "footer.php"; ?></body>

</html>