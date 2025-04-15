<?php

@include 'connection.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $city = $_POST['city'];
   $country = $_POST['country'];
  

   $cart_query = mysqli_query($conn, "SELECT * FROM `product`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['ProdName'] ;
         $product_price = number_format($product_item['Price'] );
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, flat,  city,  country,  total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$city','$country','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>ORDER SUMMARY</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.",  ".$city.",  ".$country."  </span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
           
         </div>
            <a href='index.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CHECKOUT</title>
   <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="stylec.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="styleco.css">

</head>
<body>

<nav class="navbar">
        <div class="logo">
           
           
        </div>
        <img src="Artboard 1.png" class="image">

        <ul class="menu">
            <li><a href="index.php" class="active">Home</a> </li>
            <li><a href="games.php">Games</a></li>
            <li><a href="Login.php">Login</a></li>
            <li><a href="Signup.php">Sign up</a></li>
            <li><a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> </a></li>
           
        </ul>
        
    </nav>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
      $query = "SELECT * FROM `product` ORDER BY ProductID Asc ";
      $result = mysqli_query($conn, $query);
      $total = 0;
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)){
            $total = $total + ( $row["Price"]);
            ?>
          
          <span><?= $row['ProdName']; ?></span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> Grand Total : $<?= $total; ?>/- </span>


   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Name</span>
            <input type="text"  name="name" required>
         </div>
         <div class="inputBox">
            <span>Number</span>
            <input type="tel"  name="number" required>
         </div>
         <div class="inputBox">
            <span>E-mail</span>
            <input type="email"  name="email" required>
         </div>
         <div class="inputBox">
            <span>Payment Method</span>
            <select name="method">
               <option value="COD" selected>COD</option>
               <option value="credit card">Credit Card</option>
              
            </select>
         </div>
         <div class="inputBox">
            <span>Address</span>
            <input type="text"  name="flat" required>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text"  name="city" required>
         </div>
       
         <div class="inputBox">
            <span>Country</span>
            <input type="text" name="country" required>
         </div>
         
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>
   
</body>
</html>