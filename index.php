<?php
session_start();



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>GAME CART</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
           
           
        </div>
        <img src="Artboard 1.png" class="image">

        <ul class="menu">
            <li><a href="index.php" class="active">Home</a> </li>
            <li><a href="games.php">Games</a></li>
            
            <?php
            if(isset($_SESSION['user'])){
                echo $_SESSION['user'];
                echo "<li><a href='logout.php'>Logout</a></li>";

            }else{
                echo "<li><a href='Login.php'>Login</a></li>";
            }

            ?>
            <li><a href="Signup.php">Sign up</a></li>
            <li><a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            
           
        </ul>
        
    </nav>
    

    <section class="content">
        <h1>Best Deal !!!</h1>
        <p>All The Games You Need In One Place</p>
        <button>BUY NOW! </button>
    </section>
    <h1 class="pheading">NEW GAMES</h1>


    <section class="sec">
        <div class="products">

            <!--card sec.-->
            <div class="card">
                <div class="img"><img src="game3.jpg" alt=""></div>
                <div class="desc">Racing </div>
                <div class="title">NFS Rivals</div>
                <div class="box">
                    <div class="price">$30</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <!--card sec. ends-->
            <!--card sec.-->
            <div class="card">
                <div class="img"><img src="game1.jpg" alt=""></div>
                <div class="desc">Racing </div>
                <div class="title">NFS Heat</div>
                <div class="box">
                    <div class="price">$30</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <!--card sec. ends-->
            <!--card sec.-->
            <div class="card">
                <div class="img"><img src="game2.jpg" alt=""></div>
                <div class="desc">Racing </div>
                <div class="title">NFS The Run</div>
                <div class="box">
                    <div class="price">$30</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <!--card sec. ends-->
            <!--card sec.-->
            <div class="card">
                <div class="img"><img src="game4.png" alt=""></div>
                <div class="desc">Racing </div>
                <div class="title">NFS Shift</div>
                <div class="box">
                    <div class="price">$30</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <!--card sec. ends-->
            <!--card sec.-->
            <div class="card">
                <div class="img"><img src="game8.png" alt=""></div>
                <div class="desc">Shooting </div>
                <div class="title">Assasins Creed IV</div>
                <div class="box">
                    <div class="price">$30</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <!--card sec. ends-->
            <!--card sec.-->
            <div class="card">
                <div class="img"><img src="game5.png" alt=""></div>
                <div class="desc">Shooting</div>
                <div class="title">Call of Duty II</div>
                <div class="box">
                    <div class="price">$30</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <!--card sec. ends-->
            <!--card sec.-->
            <div class="card">
                <div class="img"><img src="game6.png" alt=""></div>
                <div class="desc">Shooting</div>
                <div class="title">Call of Duty MW3</div>
                <div class="box">
                    <div class="price">$30</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <!--card sec. ends-->
            <!--card sec.-->
            <div class="card">
                <div class="img"><img src="game7.png" alt=""></div>
                <div class="desc">Shooting</div>
                <div class="title">Assasins Creed</div>
                <div class="box">
                    <div class="price">$30</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <!--card sec. ends-->

            <footer>
                <p>COPYRIGHTS @ <a href="">GAME CART</a></p>
            </footer>



        </div>
    </section>

</body>

</html>