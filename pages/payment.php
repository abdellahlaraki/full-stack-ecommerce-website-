<?php
include "../config.php";
session_start();
$client_id = $_SESSION["Account_id"];
// echo $client_id;
$current_date = date("Y-m-d H:i:s");
$user_V=$Adresse_V=$Phone_number_V=$country_V=$city_V="";

if (isset($_POST["Proceed"])) {
  $username = $_POST["UserName"];
  $Adresse = $_POST["Adresse"];
  $Phone_number = $_POST["phone_num"];
  $country = $_POST["country"];
  $city = $_POST["city"];
  $ID_Product=$_POST["ID_Product"];
  $TOTAL_PRICE=$_POST["TOTAL_PRICE"];
   $size=$_POST["size"];
   $quantity=$_POST["quantity"];
  // echo $quantity;
  // echo $size;

  if(empty($username) ||empty($Adresse) ||empty($Phone_number) ||empty($country) ||empty($city)  ){

    if(empty($username)){
      $user_V="username feild empty";
      
    }
     if(empty($Adresse)){
       $Adresse_V="adresse feild empty";
      

     }
     if(empty($Phone_number)){
       $Phone_number_V="phone  feild empty";
      

     }
     if(empty($country)){
       $country_V="country feild empty";
      

     }
     if(empty($city)){
       $city_V="city feild empty";
      

     }

  }else{
    $sql_order = "INSERT INTO `Orders`(`UserName`, `Adresse`, `PhoneNumber`, `Country`, `City`, `Total_price`, `Order_time`, `ID_Product`, `Id_client`, `Payement_methode`,`Product_Size`, `Product_quantity`) 
    VALUES ('$username','$Adresse','$Phone_number','$country','$city','$TOTAL_PRICE','$current_date','$ID_Product','$client_id','COD','$size','$quantity') ";
    $execute_q = mysqli_query($con, $sql_order);
    if ($execute_q) {
 $delete_query="DELETE FROM `cart` WHERE `id_product`=$ID_Product AND `Id_client`=$client_id ";
 $execute_delere_query=mysqli_query($con,$delete_query);
 if($execute_delere_query){
   header("location:payment.php?msgS=Order has completed succesfully");
 }
      echo "good";
    } else {
      header("location:payment.php?msgS=Failed to order");
    }
  }
    
    
  }
// }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="payment/payment.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>

<body>
 <?php include "header.php"; ?>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        
        <div class="block-heading">
        <?php
        // $msgS=$_GET["msgS"];
         if(isset($_GET["msgS"])){
?><div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Message!</strong>  <?php echo $_GET["msgS"]; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
        
        
} ?>
          <h2>Payment</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
        </div>
        <form action="payment.php" method="post">
          <div class="products">
            <h3 class="title">Checkout</h3>
            <?php
            $Query = "SELECT * FROM Product JOIN cart WHERE Id=Id_product AND Id_client=$client_id limit 1";
            $execute = mysqli_query($con, $Query);
            $check_exist = mysqli_num_rows($execute);
            if ($check_exist > 0) {
              while ($fetch = mysqli_fetch_assoc($execute)) {
                $price=$fetch["Price"];
                $tax = 10;
                $total_price = $price + ($price * $tax);
            ?>
                <div class="item total">
                <input name="price" value="<?php echo $fetch["Price"];  ?>"  readonly type="hidden">
                <input name="ID_Product" value="<?php echo $fetch["Id"];  ?>"  readonly type="hidden">
                <input name="size" value="<?php echo $fetch["Product_size"];  ?>"  readonly type="hidden">
                <input name="quantity" value="<?php echo $fetch["Product_quantity"];  ?>"  readonly type="hidden">


                  <span  class="price"><?php echo $fetch["Price"];  ?></span>
                  <p class="item-name"><?php echo $fetch["Name"]; ?></p>
                  <p class="item-description"><?php echo $fetch["Product_size"]; ?></p>
                  <p class="item-description"><?php echo $fetch["Product_quantity"]; ?></p>
                </div>
            
           
            <input type="hidden" value="<?php echo $total_price; ?>" name="TOTAL_PRICE" id="">
            <div class="total">Total<span class="price"><?php echo $total_price . "$"; ?></span></div>
            <?php
              }
            }
            ?>
          </div>
          <div class="card-details">
            <h3 class="title">Client information Details</h3>
            <div class="row">
              <div class="form-group col-sm-5">
                <label for="card-holder">Your Username</label>
                <input type="text" name="UserName" class="form-control" placeholder="Your Username" aria-label="Card Holder" aria-describedby="basic-addon1"> 
                <span style="color: red;" ><?php echo $user_V; ?></span>
              </div>
              <div class="form-group col-sm-5">
                <label for="card-holder">Your Adresse</label>
                <input type="text" name="Adresse" class="form-control" placeholder="Your Adresse">
                <span style="color: red;" ><?php echo $Adresse_V; ?></span>
              </div>
              <div class="form-group col-sm-5">
                <label for="">Your Phone Number</label>
                <input type="number" name="phone_num" class="form-control" placeholder="Your Phone Number">
                <span style="color: red;" ><?php echo $Phone_number_V; ?></span>
              </div>
              <div class="form-group col-sm-5">
                <label for="card-number">Country</label>
                <input id="card-number" name="country" type="text" class="form-control" placeholder="Country">
                <span style="color: red;" ><?php echo $Phone_number_V; ?></span>
              </div>
              <div class="form-group col-sm-7">
                <label for="cvc">City</label>
                <input id="cvc" type="text" name="city" placeholder="City" class="form-control">
                <span style="color: red;" ><?php echo $city_V; ?></span>
              </div>
              

              <!-- <div class="form-group col-sm-4">
                <label for="cvc">Current date</label>
                <input id="cvc" type="hidden" readonly value="" name="DATE" class="form-control">
              </div> -->
              <div class="form-group col-sm-12">
                <button  name="Proceed" class="btn btn-primary btn-block">Proceed OFFLINE</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
  <!-- footer -->
  <?php include "footer.php"; ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>