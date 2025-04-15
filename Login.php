<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
    
     $name = $_POST['name']; 
     $pw = $_POST['password'];
 
     $select = "SELECT * FROM users WHERE Name = '$name' AND Password = '$pw';";
     $res = mysqli_query($conn, $select);
     if(mysqli_num_rows($res) >0){
        
          $row= mysqli_fetch_array($res);
          if($row['UserType'] == 'admin'){
            $_SESSION['admin_name']=$row['name'];
            
            header('location:admin_page.php');

          }elseif ($row['UserType'] == 'user') {
            $_SESSION['user_name']=$row['name'];

            header('location:games.php');
          }


          }else{
            $error[]='incorrect name or password';
          }
     } 

    

?>




<!DOCTYPE html>
<html>


<head>
    <title>Login</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <a href="Signup.php"></a>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-color: white;
            font: Arial;
            font-size: 18px;
            border-color: rgb(147, 208, 243);
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
                <h2>Login</h2>
                <form action="Login.php" method="post">
                    <div class="input-box">
                      
                        <input type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" required>
                   
            
                    
                       <div class="remember-forgot">
                        
                       

                        </div>
                    <div>
                    <a href="Signup.php">Don't have an account?Signup!</a>
                    </div>

                    <button type="submit" class="btn"> Login</button>

                </form>

            </div>
        </div>
    </div>
</body>





</html>