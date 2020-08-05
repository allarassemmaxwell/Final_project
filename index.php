<?php 
	require_once('config/db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home || Family Expense Manager</title>
    <link rel="stylesheet" href="css/index.css">

    <!-- Web Fonts  -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        
    <!-- IMPORT FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <label class="logo">
            <a href="index.php" style="color:white;">F E M</a>
        </label>
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="faq.php">Faq</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
        </ul>
    </nav>

    <section class="carousel"></section>


    <div class="row" style="">
    <h1 style="margin-bottom: 35px; text-align: center;  padding-top: 50px;">About Us</h1>
        <div style="float: left; width: 40%; height: 400px;">
            <img src="images/expense.png" style="width: 100%;  height: 400px;" alt="">
        </div>

        <div style="float: left; width: 60%; height: 400px;">
            <h1 style="text-align: center; margin-top: 35px; margin-bottom: 25px;">Who we are</h1>
            <p style="margin-left: 15px; margin-right: 15px; text-align: center;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima officiis ullam vero dolorum tenetur, deserunt molestiae ab itaque veniam incidunt similique nam neque consequuntur praesentium sed cupiditate repudiandae non amet.
            <div style="text-align: center; margin-top: 25px">
                <button class="button">View More</button>
            </div>
            </p>
        </div>
    </div>


    <div class="row" style="background-color: #F7F7F7;  margin-top: -20px; padding-bottom: 20px;">
        <h1 style="margin-bottom: 35px; text-align: center;  padding-top: 50px;">Our Services</h1>
        <div class="column" style="background-color:#FFB695;">
            <img src="images/img.jpg" alt="">
            <h2 style='text-align: center; margin-bottom: 30px; color: white; margin-top: 0px;'>Mobile and responsive</h2>
            <p style="color: white; margin: 10px; font-size: 15px; text-align: center; ">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, vero explicabo beatae odio tempora debitis necessitatibus. Nam accusamus ut cum. Quaerat enim quae corporis esse eos nulla exercitationem accusamus. Exercitationem.
            </p>
        </div>
        <div class="column" style="background-color:#96D1CD;">
            <img src="images/img.jpg" alt="">
            <h2 style='text-align: center; margin-bottom: 30px; color: white; margin-top: 0px;'>Mobile and responsive</h2>
            <p style="color: white; margin: 10px; font-size: 15px; text-align: center; ">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, vero explicabo beatae odio tempora debitis necessitatibus. Nam accusamus ut cum. Quaerat enim quae corporis esse eos nulla exercitationem accusamus. Exercitationem.
            </p>
        </div>
        <div class="column" style="background-color: #00C2FF;">
            <img src="images/img.jpg" alt="">
            <h2 style='text-align: center; margin-bottom: 30px; color: white; margin-top: 0px;'>Mobile and responsive</h2>
            <p style="color: white; margin: 10px; font-size: 15px; text-align: center; ">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, vero explicabo beatae odio tempora debitis necessitatibus. Nam accusamus ut cum. Quaerat enim quae corporis esse eos nulla exercitationem accusamus. Exercitationem.
            </p>
        </div>

        <div style="text-align: center;">
            <button class="button" style="margin-top: 35px;">View More</button>
        </div>
        
    </div>



    
    <div style=" whidth: 100%; height: 100px; background-color: red">
        <div style="float: left; margin-left: 20px; margin-top: 35px; font-size: 17px; text-align: center; color: white">
        Do you want to get in touch
        </div>
        <div style="float: right; margin-right: 20px; margin-top: 25px">
           <a href="contact.php">
           <button class="button">Contact Us</button>
           </a>
        </div>
    </div>


    

    <!-- START OF FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="container">
                <p>Langata Nairobi Kenya</p>

                <p style="margin-top: 10px;">
                    <li><a href="terms-of-use.php" class="terms">TERMS OF USE</a></li>
                    <li><a href="privacy-policy.php" class="terms">PRIVACY POLICY</a></li>
                </p>
        
                <p>
                Copyright © 2020 F-E-M. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- END OF FOOTER -->
</body>
</html>
