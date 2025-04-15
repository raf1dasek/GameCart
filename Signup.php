<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
    
     $name = $_POST['name']; 
     $email = $_POST['email'];  
     $pw = $_POST['password'];
     $pwR = $_POST['passrepeat'];
     $phone = $_POST['phone'];
     $addr = $_POST['address'];
     $usr= $_POST['UserType'];

     $select = "SELECT *FROM users WHERE Name = '$name' AND Password = '$pw';";
     $res = mysqli_query($conn, $select);
     if(mysqli_num_rows($res) >0){
             $error[] = 'Error';
     } if($pw != $pwR){
             $errorPw[] = 'Error';
     } if(!$pw || !$name || !$phone || !$email || !$addr){
         $errorEmpty[] = 'Error box is Empty';
     } if(!$pwR){
         $errorPwR[] = 'Error PwR is Empty';
     }
     
     else{
         $insert = "INSERT INTO users(Name,Email, Password, Phone, Address,UserType )
         VALUES ('$name', '$email', '$pw', '$phone', '$addr', '$usr');";
         mysqli_query($conn, $insert);
         header("Location: Login.php");
     
     }

    }

?>

<!DOCTYPE html>
<html>


<head>
    <title>Signup</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
     <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-color: whitesmoke;
            font: Arial;
            font-size: 18px;
            border-color: rgba(211, 243, 147, 0.448);
            color: black;
            margin-top: 1px;
            margin-left: 1px;

        }

        .MainThing {
            border-radius: 10px;
            padding: 1px;
            height: 100%;
            width: 100%;
            margin-top: 0px;
        }



        .wrapper {
            position: relative;
            width: 400px;
            height: 440px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .remember-forgot {
            font-size: .9em;
            color: black;
            font-weight: 500;
            display: flex;
            justify-content: space-between;
        }

        .btn {
            width: 60%;
            height: 45px;
            background: black;
            border: none;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            color: white;
            font-weight: 500;
        }

        .login-register {
            font-size: .9em;
            color: black;
            text-align: center;
            font-weight: 500;
            margin: 25px 0 10px;
        }
    </style>

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


    <div align="center">
        <div class="wrapper">
            <div class="form-box Login">
                <h2>SignUp</h2>
                <form action="Signup.php" method="post">
                    <div class="input-box">
                        <input type="name" name="name" placeholder="Name" required>
                     
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="E-mail" required>
                       
                    </div>
                    
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" required>
                       
                    </div>
                    <div class="input-box">
                        <input type="password" name="passrepeat" placeholder="Password(Type again)" required>
                     
                    </div>
                    <div class="input-box">
                        <input type="tel" name="phone" placeholder="PhoneNo" required>
                       
                    </div>
                    <div class="input-box">
                        <input type="text" name="address" placeholder="Address" required>
                        
                    </div>
                    <div>
                        <select name="UserType" >
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                        </div>
                    <button type="submit" class="btn"> SignUp</button>

                </form>

            </div>
        </div>
    </div>
</body>









</html>