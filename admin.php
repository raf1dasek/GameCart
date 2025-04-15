<?php
session_start();
//include("connection.php");
//include("functions.php");
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "gamecart";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed:" .mysqli_connect_error());
}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$name = $_POST['name'];
		$password = $_POST['password'];

		$s = " select * from users where Name = '$name' && Password = '$password' ";

        $result = mysqli_query($conn, $s);

        $num = mysqli_num_rows($result);

        if($num == 1)
        {
            header('location:index.php');
        }
        else
        {
            header('location:Login.php');
        }
	}







/*session_start();
    include("connection.php");
    include("functions.php");*/
  
/*if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}*/








  /* if($_SERVER['REQUEST_METHOD']=="POST")
    {
  
     $email = $_POST['email'];  
     $pw = $_POST['password'];
     //read db
     $select = "SELECT *FROM users WHERE Email ='$email' AND Password = '$pw';";
     $res = mysqli_query($conn, $select);


     if(mysqli_num_rows($res) >0){
             $error[] = 'Error';
     } if(!$pw ||  !$email ){
         $errorEmpty[] = 'Error box is Empty';
     } 
     
     else{
         $insert = "INSERT INTO users(Email, Password)
         VALUES ('$email', '$pw');";
         mysqli_query($conn, $insert);
         header("Location: index.php");
         die;
     
     }
  <input type="email" placeholder="E-mail" required>
    }*/



	



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
            <li><a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i> <sup>1</sup></a></li>
            <li><a class="nav-link" href="#"><i class="fa-solid fa-user"></i> </a></li>
        </ul>
        
    </nav>

    <div align="center">
        <div class="wrapper">
            <div class="form-box Login">
                <h2>Admin Login</h2>
                <form action="#">
                    <div class="input-box">
                      
                        <input type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" required>
                   
            
                    
                       <div class="remember-forgot">
                        
                       

                        </div>
                   

                    <button type="submit" class="btn"> Login</button>

                </form>

            </div>
        </div>
    </div>
</body>





</html>