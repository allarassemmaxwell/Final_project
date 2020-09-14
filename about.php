<?php 
	require_once('config/db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="keywords" content="Family Expense Manager, Family Budget" />
		<meta name="description" content="Family Expense Manager System">
        <meta name="author" content="Allarassem N Maxime">
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/logo.png">
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
<nav id="nav">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
        <i class="fa fa-bars"></i>
        </label>
        <label class="logo">
            <a href="index.php" style="color:white;">
                <img src="images/logo.png" style="width:90px; margin-top:10px;" alt="logo">
            </a>
        </label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php" class="active">About</a></li>
            <li><a href="services.php">How it works</a></li>
            <li><a href="faq.php">Faq</a></li>
            <li><a href="contact.php" >Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
        </ul>
    </nav>

    <section class="banner">
        <div class="banner-title">About</div>
    </section>


    <section class="faq-container">
        <h1 style="margin-bottom: 35px; text-align: center;  padding-top: 25px; color: #00ace0;">Meet us</h1>
        <p style="margin-left: 15px; margin-right: 15px; text-align: center; color: #737373;">
        Family Expense Manager System is a simple personal finance manager. It was created on 2020 by Allarassem Ndotoumbaye Maxime
        a technology student passionate for simple solutions to daily problems. 
        The company is localized in Nairobi, Kenya.<br><br>

        The idea was born when I realized that, for many times, 
        i was out of money in the end of month. I could see that 
        it was a common problem of a lot of people. I never knew where the money was going.
        </p>
    </section>


    <section class="faq-container" style="margin-top: -20px;">
        <h1 style="margin-bottom: 35px; text-align: center;  padding-top: 25px; color: #00ace0;">Vision</h1>
        <p style="margin-left: 15px; margin-right: 15px; text-align: center; color: #737373;">
        Become the best and most complete personal finance website and financial education platform.
        </p>
    </section>


    <section class="faq-container" style="margin-top: -20px;">
        <h1 style="margin-bottom: 35px; text-align: center;  padding-top: 25px; color: #00ace0;">Mission</h1>
        <p style="margin-left: 15px; margin-right: 15px; text-align: center; color: #737373;">
        We dedicate our time on helping people. We make their dreams come true by making a financial plan and manage their personal finances.
        </p>
    </section>


    <section class="faq-container" style="margin-top: -20px;">
        <h1 style="margin-bottom: 35px; text-align: center;  padding-top: 25px; color: #00ace0;">Mission</h1>
        <p style="margin-left: 15px; margin-right: 15px; text-align: center; color: #737373;">
        Quality, security, people values, work as a team in a collaborative way and a cool work place.
        </p>
    </section><br><br>





    <div style="background-color: #F7F7F7; PADDING-bottom: 20px;">
        <h1 style="margin-bottom: 100px; text-align: center; padding-top: 40px; margin-top: -20px; color: #00ace0;">Our team</h1>
        <div class="row">
            <div class="column" style="background-color:#fff; height: 150px; border-bottom: 5px solid #00C2FF; box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);">
                <img src="images/ceo.jpeg" style="width: 100px;  height: 100px; border-radius: 50%; margin-top: -70px; margin-left: 40%;" alt="">
                <h2 style='text-align: center; margin-bottom: 30px; color: #00ace0; margin-top: 15px; font-size: 17px;'>Allarassem N Maxime</h2>
                <h4 style="margin-top: -20px; text-align: center; color: #00ace0;">CEO</h4>
                <!-- <p style="color: white; margin: 10px; font-size: 15px; text-align: center; ">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, vero explicabo beatae odio tempora debitis necessitatibus. Nam accusamus ut cum. Quaerat enim quae corporis esse eos nulla exercitationem accusamus. Exercitationem.
                </p> -->
            </div>
            <!-- <div class="column" style="background-color:#96D1CD;">
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
            </div> -->
        </div>
    </div>



    
    

    <!-- START OF FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="container">
                <p>Langata Nairobi Kenya</p>

                <p style="margin-top: 10px;">
                    <li><a href="terms-of-use.php" class="terms">TERMS OF USE</a></li>
                    <li><a href="privacy-policy.php" class="terms">PRIVACY AND POLICY</a></li>
                </p>
        
                <p>
                Copyright © 2020 F-E-M. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- END OF FOOTER -->

    

    <style>
        .faq-container {
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 30px;
        }


    @media only screen and (min-width: 300px) {
        .faq-container {
            border-radius: 5px; 
            padding: 20px; 
            width: 85%; 
            margin-left: auto; 
            margin-right: auto; 
            margin-top: 50px; 
            margin-bottom: 20px;
        }
    }


    @media only screen and (min-width: 600px) {
        .faq-container {
            border-radius: 5px; 
            padding: 20px; 
            width: 80%; 
            margin-left: auto; 
            margin-right: auto; 
            margin-top: 50px; 
            margin-bottom: 20px;
        }
    }


    @media only screen and (min-width: 800px) {
        .faq-container {
            border-radius: 5px; 
            padding: 20px; 
            width: 65%; 
            margin-left: auto; 
            margin-right: auto; 
            margin-top: 50px; 
            margin-bottom: 20px;
        }
    }


    @media screen and (min-width: 1024px) {
        .faq-container {
            border-radius: 5px; 
            padding: 20px; 
            width: 50%; 
            margin-left: auto; 
            margin-right: auto; 
            margin-top: 50px; 
            margin-bottom: 20px;
        }
    }
</style>


<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/scrolling.js"></script>
</body>
</html>
