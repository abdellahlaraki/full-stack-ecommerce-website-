<?php
include "../config.php";
session_start();
$client_id=$_SESSION["Account_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="../pages/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

  <title>index page</title>
</head>

<body>
  
  
    <?php include "header.php"; ?>
     <div style="margin-top: 40px;" class="container"> 
     
     <?php
        // $msgS=$_GET["msgS"];
         if(isset($_GET["msgS"])){
?><div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Message!</strong>  <?php echo $_GET["msgS"]; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
        
        
} ?>
    
   </div> 
<?php
if(isset($_SESSION["Account_id"])){
  ?>
  <form action=""  method="post">
  <div class="small-container cart-page">
    <table>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>

      <?php
      $query = "SELECT * FROM Product JOIN cart WHERE Id=Id_product AND Id_client=$client_id";
      $execute = mysqli_query($con, $query);
      $check_cart = mysqli_num_rows($execute);
      if ($check_cart > 0) {
        while ($fetch = mysqli_fetch_assoc($execute)) {
      ?>
          <tr>
            <td>
              <div class="cart-info">
                <img src="../admin/Products_img/<?php echo $fetch["Img1"] ?>"  />
                <div>
                  <p><?php echo $fetch["Name"] ?></p>
                  <small><?php echo $fetch["Product_size"]?></small> <br />
                  <a href="delete_cart.php?cart_id=<?php echo $fetch["Id_cart"]; ?>">Remove</a>
                </div>
              </div>
            </td>
            <td><input type="number" style="width: 50px;" readonly value="<?php echo $fetch["Product_quantity"] ?>" /></td>
            <td><?php echo $fetch["Price"]?>$</td>
          </tr>
      <?php
        }
      }
      ?>
      <!-- <tr>
        <td>
          <div class="cart-info">
            <img src="../images/buy-2.jpg" alt="" srcset="" />
            <div>
              <p>Red printed T-shirt</p>
              <small>50.00 $</small> <br />
              <a href="#">Remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="1" /></td>
        <td>50.00 $</td>
      </tr> -->
      <!-- <tr>
        <td>
          <div class="cart-info">
            <img src="../images/buy-3.jpg" alt="" srcset="">
            <div>
              <p>Red printed T-shirt</p>
              <small>50.00 $</small> <br>
              <a href="#">Remove</a>
            </div>

          </div>
        </td>
        <td><input type="number" value="1"></td>
        <td>50.00 $</td>
      </tr> -->
    </table>
    <?php  $Total="SELECT SUM(Price) as Total FROM Product JOIN cart  WHERE Id=Id_product  AND Id_client=$client_id;";
    $execut_T=mysqli_query($con,$Total);
    $check_Price=mysqli_num_rows($execut_T);
    $fetch_total=mysqli_fetch_assoc($execut_T);
    $price=$fetch_total["Total"];
    $tax=10;
    $total_price=$price+($price*$tax);
    
    ?>
    <div class="total-price">
      <table>
        <tr>
          <td>Subtotal</td>
          
          <td><?php echo $price.".00"; ?>$</td>
        </tr>
        <tr>
          <td>tax</td>
          <td><?php echo $tax."%";  ?></td>
        </tr>
        <tr>
          <td>total</td>
          <td><?php echo $total_price.".00$"; ?> </td>
        </tr>
      </table>

    </div>
    <?php
    if(isset($client_id)){
      ?>
      <div class="place-order">
      <a href="payment.php">place order</a>
    </div>
    <?php
    }else{
      ?>
      <div class="place-order">
      <a href="../pages/login.php">Login</a>
    </div>
      <?php

    }
    ?>
    
  </div>
  </form>

  <?php
}else{
  echo "your not logged in ";
}

?>

  <!-- footer -->
  <?php include "footer.php"; ?>
</body>

</html>