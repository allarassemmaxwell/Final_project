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
    <title>Service || Family Expense Manager</title>
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
            <li><a href="about.php">About</a></li>
            <li><a href="services.php" class="active">How it works</a></li>
            <li><a href="faq.php">Faq</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
        </ul>
    </nav>

    <section class="banner">
        <div class="banner-title">How it works</div>
    </section>



    <div class="row" style="background-color: #F7F7F7; padding-bottom: 40px; ">
        <h1 style="margin-bottom: 45px; text-align: center;  padding-top: 100px; color: #00ace0;">HOW IT WORKS</h1>
        <div class="column" style="background-color:#fff; border-top: 5px solid #00C2FF; box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);">
            <h2 style='text-align: center; margin-bottom: 35px; color: white; margin-top: 50px; color: #00ace0;'>RECORD YOUR EXPENSES</h2>
            <p style="color: #737373; margin: 10px; font-size: 15px; text-align: center; ">
            Including those that can be easily forgotten, with just one tap. You can set your expenses, pending, recurring or repeated.
            </p>
        </div>
        <div class="column" style="background-color:#fff; border-top: 5px solid #00C2FF; box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);">
            <h2 style='text-align: center; margin-bottom: 35px; color: white; margin-top: 50px; color: #00ace0;'>TRACK YOUR BALANCE</h2>
            <p style="color: #737373; margin: 10px; font-size: 15px; text-align: center; ">
            Check your balance in the dashboard and know where your money is going.
            </p>
        </div>
        <div class="column" style="background-color: #fff; border-top: 5px solid #00C2FF; box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);">
            <h2 style='text-align: center; margin-bottom: 35px; color: white; margin-top: 50px; color: #00ace0;'>SAVE MONEY</h2>
            <p style="color: #737373; margin: 10px; font-size: 15px; text-align: center; ">
                Keep saving money with the best expense tracker and find financial peace of mind.
            </p>
        </div>
        <div class="column" style="background-color:#fff; border-top: 5px solid #00C2FF; box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14); margin-top: 20px;">
            <h2 style='text-align: center; margin-bottom: 35px; color: white; margin-top: 50px; color: #00ace0;'>EXPENSES REPORT</h2>
            <p style="color: #737373; margin: 10px; font-size: 15px; text-align: center; ">
                Check your Report Daily, Wekly, Monthly and Annually.
            </p>
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

    <script src="js/scrolling.js"></script>
</body>
</html>
