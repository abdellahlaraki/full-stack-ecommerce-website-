<?php require "../config.php";

session_start();
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
<?php include "header.php"; ?>
  <!-- <div class="header">
    <div class="container">
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
        <img class="menu" src="../images/menu.png" width="30px" height="30px">
      </div>
    </div>
  </div> -->

  <!-- ALL  products -->
  <div id="products" class="small-container">
    <div class="row row-2">
      <a href="AllProduct.php" style="text-decoration: none;">
        <h3>All products</h3>
      </a>

      <form action="" method="post">
        <div class="select" style="width: 300px;display:flex;">

          <select class="form-select" name="category" aria-label="Default select example" style="width: 100%;">
            <option selected>Products</option>

            <?php
            $qeury = "SELECT * FROM `category` ";
            $execute = mysqli_query($con, $qeury);
            $check_cat = mysqli_num_rows($execute);

            if ($check_cat > 0) {
              while ($row = mysqli_fetch_assoc($execute)) {
            ?>
                <option value="<?php echo $row["Id_category"]; ?>"><?php echo $row["Nom_category"]; ?></option>
            <?php
              }
            }
            ?>

          </select>
          <div class="input-group-append">
            <button style="background-color: white;border:none;margin:0 20px;" name="search_product" class="btn btn-primary">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>

    </div>
    <?php
    if (isset($_POST["search_product"])) {
      $id_category=$_POST["category"];
      $qeury = "SELECT * FROM `Product` where  categorie_id=$id_category ";
      $execute = mysqli_query($con, $qeury);
      $check_exist = mysqli_num_rows($execute);
    ?>
      <div class="row">
        <?php
        if ($check_exist > 0) {
          while ($row = mysqli_fetch_assoc($execute)) {
        ?>
            <div class="col-4">
              <a href="single-product.php?product=<?php echo $row["Id"] ?>">
                <img src="../admin/Products_img/<?php echo $row["Img1"]; ?>" height="320" />
              </a>
              <h4><?php echo $row["Name"] ?></h4>
              <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <p><?php echo $row["Price"] ?>$</p>
            </div>
        <?php

          }
        }else{
          echo "there's no product in this category";
        }
      } else {


        $qeury = "SELECT * FROM `Product` ";
        $execute = mysqli_query($con, $qeury);
        $check_exist = mysqli_num_rows($execute);
        ?>
        <div class="row">
          <?php
          if ($check_exist > 0) {
            while ($row = mysqli_fetch_assoc($execute)) {
          ?>
              <div class="col-4">
                <a href="single-product.php?product=<?php echo $row["Id"] ?>">
                  <img src="../admin/Products_img/<?php echo $row["Img1"]; ?>" height="320" />
                </a>
                <h4><?php echo $row["Name"] ?></h4>
                <div class="rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </div>
                <p><?php echo $row["Price"] ?>$</p>
              </div>
        <?php

            }
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
      </div>
      <div class="col-4">
        <img src="../images/product-9.jpg" />
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
        <img src="../images/product-10.jpg" />
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
        <img src="../images/product-11.jpg" />
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
        <img src="../images/product-12.jpg" />
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
        <!-- <div class="page-num">
          <span>1</span>
          <span>2</span>
          <span>3</span>
          <span>4</span>
          <span>&#8594;</span>

        </div> -->

      </div>





      <!-- footer -->
      <?php include "footer.php"; ?>
</body>

</html>