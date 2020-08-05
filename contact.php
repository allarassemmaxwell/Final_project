<?php 
	require_once('config/db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact || Family Expense Manager</title>
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
            <li><a href="services.php">Services</a></li>
            <li><a href="faq.php">Faq</a></li>
            <li><a href="contact.php" class="active" >Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
        </ul>
    </nav>

    <section class="banner">
        <div class="banner-title">Contact</div>
    </section>

    <style>
        /* ERROR */
        .error {
            padding: 10px;
            border: 1px solid #a94442; 
            color: #a94442; 
            background: #f2dede; 
            margin-bottom: 10px;
            font-size: 13px;
        }

        /* SUCCESS */
        .success {
            padding: 10px;
            border: 1px solid #3c763d;
            color: #3c763d; 
            background: #dff0d8; 
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
        }
    </style>



    
    <form class="contact-form" name="contact-form" method="POST" action="">
        <div>
            <?php include('errors.php'); ?><br>
        </div>
        <div>
            <?php include('success.php'); ?><br>
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="text" name="first_name" placeholder="First Name" value="">
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="text" name="last_name" placeholder="Last Name" value="">
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="email" name="email" placeholder="Email" value="">
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="text" name="subject" placeholder="Subject" value="">
        </div>
        <div>
            <textarea name="message" id="" rows="10" placeholder="Message"></textarea>
        </div>
        <button class="button" type="submit" name="add-contact" style="margin-top: 15px;">Send message</button><br><br><br>
    </form>    
    

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


    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
