<?php 
	require_once('config/db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service || Family Expense Manager</title>
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
            <li><a href="about.php">About</a></li>
            <li><a href="services.php" class="active">Services</a></li>
            <li><a href="faq.php">Faq</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
        </ul>
    </nav>

    <section class="banner">
        <div class="banner-title">Services</div>
    </section>



    <div style="background-color: #F7F7F7; padding: 35px 0;">
    <h1 style="text-align: center; margin: 25px 0px;">Our Services</h1>
    <div class="row" style="padding-top: 20px">
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
    </div>

    <div class="row">
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
    </div>
    <br><br>
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
