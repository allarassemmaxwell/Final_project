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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password || FEM</title>
    <link rel="stylesheet" href="css/sign.css">
    
    <!-- Web Fonts  -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        
    <!-- IMPORT FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <div class="container" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="row">
            <p class="title">Reset Your Password</p>
            <form class="reset-password-new-password-form" method="POST">
                <div>
                    <?php include('errors.php'); ?><br>
                </div>
                <div>
                    <input name="new_password" id="new_password" type="password" placeholder="New password">
                </div><br><br>
                
                <div>
                    <input name="c_password" id="c_password" type="password" placeholder="Conform password">
                </div><br>
                <div class="space"></div>
                <div>
                    <button name="new-password" class="reset-password-submit" type="submit">Reset Password</button>
                </div>
                
                <!-- <p class="create-account">Already have account?<a href="login.php"> Login</p> -->
            </form>             
        </div>
    </div> 


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