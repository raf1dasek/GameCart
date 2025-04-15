<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "gamecart";

$conn = mysqli_connect($servername, $username, $password, $database_name);

if (!$conn) {
    echo "Failed to Connect";
}
 
if (isset($_GET["action"]) && $_GET["action"] =="delete") {
    $product_name = $_GET["ProdName"];
    $deleteQuery = "DELETE FROM `product` WHERE ProdName = '$product_name'";
    mysqli_query($conn, $deleteQuery);
    
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="stylec.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
    <h2>CART</h2>
    <div class="table_container">
        <table>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th> 
                <th>Total Price</th>
                <th>Remove Item</th>
            </tr>
            <?php
            $query = "SELECT * FROM `product` ORDER BY ProductID Asc ";
            $result = mysqli_query($conn, $query);
            $total = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><img src="uploaded_img/<?php echo $row["ImageLink"]; ?>" height="100" alt=""></td>
                        <td>
                            <?php echo $row["ProdName"]; ?>
                        </td>
                        <td>
                            <?php echo $row["Price"]; ?>
                        </td>
                        
                        <td>
                            <?php echo number_format($row["Price"]); ?>
                        </td>
                        <td><a href="cart.php?action=delete&ProdName=<?php echo $row["ProdName"]; ?>" class="btn"> <i class="fas fa-trash"></i></a>
                       
                        </td>
                        <?php
                        $total = $total + ($row["Price"]);
                }
                
            }
            ?>
            </tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>
                    <?php echo number_format($total); ?>
                </td>
                <td><a href="checkout.php"><button>Checkout</button></a></td>
                
            
                
            </tr>

        </table>
    </div>
    
</body>

</html>