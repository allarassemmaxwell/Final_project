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
    <title>Home || Family Expense Manager</title>
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
            <a href="index.php" style="color:white;">F E M</a>
        </label>
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">How it works</a></li>
            <li><a href="faq.php">Faq</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
        </ul>
    </nav>

    <section class="carousel"></section>


    <section class="faq-container">
        <h1 style="margin-bottom: 35px; text-align: center;  padding-top: 25px; color: #00ace0;">ABOUT US</h1>
        <p style="margin-left: 15px; margin-right: 15px; text-align: center; color: #737373;">
        Family Expense Manager System is a simple personal finance manager. It was created on 2020 by Allarassem Ndotoumbaye Maxime
        a technology student passionate for simple solutions to daily problems. 
        The company is localized in Nairobi, Kenya.
            <div style="text-align: center; margin-top: 25px">
                <button class="button" onclick="window.location.href='about.php'">View More</button>
            </div>
        </p>
    </section>


    <div class="row" style="background-color: #F7F7F7; padding-bottom: 40px; margin-top: 30px;">
        <h1 style="margin-bottom: 45px; text-align: center;  padding-top: 100px; color: #00ace0;">HOW IT WORKS</h1>
        <div class="column" style="background-color:#fff;">
            <!-- <img src="images/how-to-create-an-expense-budget.jpg" alt=""> -->
            <h2 style='text-align: center; margin-bottom: 35px; color: white; margin-top: 50px; color: #00ace0;'>RECORD YOUR EXPENSES</h2>
            <p style="color: #737373; margin: 10px; font-size: 15px; text-align: center; ">
            Including those that can be easily forgotten, with just one tap. You can set your expenses, pending, recurring or repeated.
            </p>
        </div>
        <div class="column" style="background-color:#fff;">
            <!-- <img src="images/img.jpg" alt=""> -->
            <h2 style='text-align: center; margin-bottom: 35px; color: white; margin-top: 50px; color: #00ace0;'>TRACK YOUR BALANCE</h2>
            <p style="color: #737373; margin: 10px; font-size: 15px; text-align: center; ">
            Check your balance in the dashboard and know where your money is going.
            </p>
        </div>
        <div class="column" style="background-color: #fff;">
            <!-- <img src="images/img.jpg" alt=""> -->
            <h2 style='text-align: center; margin-bottom: 35px; color: white; margin-top: 50px; color: #00ace0;'>SAVE MONEY</h2>
            <p style="color: #737373; margin: 10px; font-size: 15px; text-align: center; ">
                Keep saving money with the best expense tracker and find financial peace of mind.
            </p>
        </div>
    </div>



    
    <div style=" whidth: 100%; height: 100px; background-color: #fff">
        <div style="float: left; margin-left: 20px; margin-top: 35px; font-size: 17px; text-align: center; color: #737373">
        Do you want to get in touch
        </div>
        <div style="float: right; margin-right: 20px; margin-top: 25px">
           <button class="button" onclick="window.location.href='contact.php'">Contact Us</button>
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

    <script src="js/scrolling.js"></script>
</body>
</html>
