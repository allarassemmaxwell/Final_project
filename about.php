<?php 
	require_once('config/db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About || Family Expense Manager</title>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php" class="active">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="faq.php">Faq</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
        </ul>
    </nav>

    <section class="banner">
        <div class="banner-title">About</div>
    </section>


    
    <div class="row" style="">
        <div style="float: left; width: 50%; height: 400px;">
            <img src="images/expense.png" style="width: 100%;  height: 400px;" alt="">
        </div>

        <div style="float: left; width: 50%; height: 400px;">
            <h1 style="text-align: center; margin-top: 35px; margin-bottom: 25px;">Who we are</h1>
            <p style="margin-left: 15px; margin-right: 15px; text-align: center;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima officiis ullam vero dolorum tenetur, deserunt molestiae ab itaque veniam incidunt similique nam neque consequuntur praesentium sed cupiditate repudiandae non amet.
            </p>
        </div>
    </div>

    <div class="row" style="margin-top: -20px">
        <div style="float: left; width: 50%; height: 400px;">
            <h1 style="text-align: center; margin-top: 35px; margin-bottom: 25px;">Who we are</h1>
            <p style="margin-left: 15px; margin-right: 15px; text-align: center;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima officiis ullam vero dolorum tenetur, deserunt molestiae ab itaque veniam incidunt similique nam neque consequuntur praesentium sed cupiditate repudiandae non amet.
            </p>
        </div>
        <div style="float: left; width: 50%; height: 400px;">
            <img src="images/img.jpg" style="width: 100%;  height: 400px;" alt="">
        </div>
    </div>

    <div class="row" style="margin-top: -20px">
        <div style="float: left; width: 50%; height: 400px;">
            <img src="images/saving-family-expense-with-money-coin-and-light-bulb-.jpg" style="width: 100%;  height: 400px;" alt="">
        </div>

        <div style="float: left; width: 50%; height: 400px;">
            <h1 style="text-align: center; margin-top: 35px; margin-bottom: 25px;">What we do</h1>
            <p style="margin-left: 15px; margin-right: 15px; text-align: center;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima officiis ullam vero dolorum tenetur, deserunt molestiae ab itaque veniam incidunt similique nam neque consequuntur praesentium sed cupiditate repudiandae non amet.
            </p>
        </div>
    </div>


    <div style="background-color: #F7F7F7; PADDING-bottom: 20px;">
        <h1 style="margin-bottom: 100px; text-align: center; padding-top: 40px; margin-top: -20px;">Our team</h1>
        <div class="row">
            <div class="column" style="background-color:#FFB695;">
                <img src="images/ceo.jpeg" style="width: 100px;  height: 100px; border-radius: 50%; margin-top: -70px; margin-left: 40%;" alt="">
                <h2 style='text-align: center; margin-bottom: 30px; color: white; margin-top: 0px;'>AllarassemMaxime</h2>
                <h4 style="margin-top: -20px; text-align: center; color: white;">CEO</h4>
                <p style="color: white; margin: 10px; font-size: 15px; text-align: center; ">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, vero explicabo beatae odio tempora debitis necessitatibus. Nam accusamus ut cum. Quaerat enim quae corporis esse eos nulla exercitationem accusamus. Exercitationem.
                </p>
            </div>
            <div class="column" style="background-color:#96D1CD;">
            <img src="images/user.png" style="width: 100px;  height: 100px; border-radius: 50%; margin-top: -70px; margin-left: 40%;" alt="">
                <h2 style='text-align: center; margin-bottom: 30px; color: white; margin-top: 0px;'>Mobile and responsive</h2>
                <h4 style="margin-top: -20px; text-align: center; color: white;">Developer</h4>
                <p style="color: white; margin: 10px; font-size: 15px; text-align: center; ">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, vero explicabo beatae odio tempora debitis necessitatibus. Nam accusamus ut cum. Quaerat enim quae corporis esse eos nulla exercitationem accusamus. Exercitationem.
                </p>
            </div>
            <div class="column" style="background-color: #00C2FF;">
            <img src="images/user.png" style="width: 100px;  height: 100px; border-radius: 50%; margin-top: -70px; margin-left: 40%;" alt="">
                <h2 style='text-align: center; margin-bottom: 30px; color: white; margin-top: 0px;'>Mobile and responsive</h2>
                <h4 style="margin-top: -20px; text-align: center; color: white;">Marketer</h4>
                <p style="color: white; margin: 10px; font-size: 15px; text-align: center; ">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, vero explicabo beatae odio tempora debitis necessitatibus. Nam accusamus ut cum. Quaerat enim quae corporis esse eos nulla exercitationem accusamus. Exercitationem.
                </p>
            </div>
        </div>
    </div>



    
    

    <!-- START OF FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="container">
                <p class="address">Langata Nairobi Kenya</p>

                <p style="margin-top: 10px;">
                    <li><a href="faq.php" style="color: white; font-size: 13px;">FAQ</a></li>
                    <li><a href="terms-of-use.php" style="color: white; font-size: 13px;">TERMS OF USE</a></li>
                    <li><a href="privacy-policy.php" style="color: white; font-size: 13px;">PRIVACY POLICY</a></li>
                </p>

        
                <p style=" text-align: center; margin-top: 10px; font-size: 13px;">
                    Copyright © 2020 F-E-M. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- END OF FOOTER -->
</body>
</html>
