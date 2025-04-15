<?php
session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "gamecart";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
    echo "Failed to Connect";
}

if(isset($_POST['add_product'])){
    $producId = $_GET["ProductID"];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;

    $sql = "INSERT INTO product(ProdName, Price, ImageLink) VALUES('$product_name', '$product_price', '$product_image')";
    mysqli_query($conn, $sql);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="stylec.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <title>Games</title>
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

    <main>
        <h2>ALL GAMES</h2>
        <div class="container">
            <?php
            $query = "SELECT * FROM `product` ORDER BY ProductID Asc ";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="product">
                        <form action="games.php?action=add&ProductID=<?php echo $row["ProductID"] ?>" method="post">
                            <div class="product">
                                <img src="uploaded_img/<?php echo $row["ImageLink"]; ?>" height="100" alt=" ">
                                <h3>
                                    <?php echo $row["ProdName"] ?>
                                </h3>
                                <p>$
                                    <?php echo $row["Price"]; ?>
                                </p>

                               
                                <input type="hidden" name="hidden_image" value="<?php echo $row["ImageLink"]; ?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["ProdName"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
                                <input type="submit" name="add" value="Add to Cart">
                            </div>
                        </form>

                    </div>
                    <?php

                }
            }
            ?>
        </div>




    </main>
</body>
</html>
