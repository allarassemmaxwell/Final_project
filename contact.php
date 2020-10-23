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
    <title>Contact || Family Expense Manager</title>
    <link rel="stylesheet" href="css/index.css"> 
</head>
<body style="background-color: #F7F7F7;">
    <nav id="nav">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <img src="images/icons/menu.svg" style="width: 25px;">
        </label>
        <label class="logo">
            <a href="index.php" style="color:white;">
                <img src="images/logo.png" style="width:90px; margin-top:10px;" alt="logo">
            </a>
        </label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">How it works</a></li>
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



    
    <form class="contact-form" name="contactForm" method="POST" onsubmit="return contactValidation()">
        <div>
            <?php include('errors.php'); ?><br>
        </div>
        <div>
            <?php include('success.php'); ?><br>
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="text" name="first_name" id="first_name" placeholder="First Name">
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="text" name="last_name" id="last_name" placeholder="Last Name">
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="email" name="email" id="email" placeholder="Email">
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="text" name="subject" id="subject" placeholder="Subject">
        </div>
        <div>
            <textarea name="message" id="message" rows="10" placeholder="Message"></textarea>
        </div>
        <button class="button" type="submit" name="add-contact" style="margin-top: 15px;">Send message</button><br><br><br>
    </form>    
    

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
                <p>
                    Icons made by <a style="color:white;" href="https://www.flaticon.com/authors/kiranshastry" title="Kiranshastry">Kiranshastry</a> from <a style="color:white;" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- END OF FOOTER -->


    


    <!-- JAVASCRIPT -->
    <script src="js/validation.js"></script>
    <script src="js/scrolling.js"></script>

    
</body>
</html>
