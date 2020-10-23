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
    <title>FAQ || Family Expense Manager</title>
    <link rel="stylesheet" href="css/index.css">   
</head>
<body>
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
            <li><a href="faq.php" class="active">Faq</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
        </ul>
    </nav>

    <section class="banner">
        <div class="banner-title">FAQ</div>
    </section>




    <section class="faq-container" style="margin-bottom: 50px;">
        <h1 style="color: #00ace0; text-align: center; margin-bottom: 50px; margin-top: -10px">FREQUENTLY ASKED QUESTIONS</h1>

        <button class="accordion">Why do I need an expense tracker system?</button>
        <div class="panel">
            <p style="color: #737373; padding: 20px;">With an expense tracker system you can manage all your transactions without using papers. You can do this on the go and optimize your time.</p>
        </div>
        
        <button class="accordion">What is Family Expense Manager?</button>
        <div class="panel">
            <p style="color: #737373; padding: 20px;">Family Expense Manager is a free web application that can help you create manage your budgets, 
            so you can set what you want to spend over a period of time you can decide. You can track your spending.</p>
        </div>  

        <button class="accordion">Why should I use Family Expense Manager?</button>
        <div class="panel">
            <p style="color: #737373; padding: 20px;">If you'd like to feel more in control of your money, then Family Expense Manager is right for you – 
            it can help you get to grips with what you’re spending and saving. 
            It can show you forecasts, so you can see where your money is being used.</p>
        </div>

        <button class="accordion">How do I know it's safe?</button>
        <div class="panel">
            <p style="color: #737373; padding: 20px;">Family Expense Manager is a web based application, meaning all your data is saved on the cloud. None of your information or details
        are shared with anyone else. It doesn't connect with banks, so your details are secured.</p>
        </div>   

        <button class="accordion">How can I get in touch?</button>
        <div class="panel">
            <p style="color: #737373; padding: 20px;">Out Contact section contains a form that you'll need to get in touch with us.</p>
        </div>   

    
    </section>
    
    

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


    <script src="js/scrolling.js"></script>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active2");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            } 
        });
        }
    </script>
</body>
</html>



