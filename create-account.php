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
    <title>Create Account || FEM</title>
    <link rel="stylesheet" href="css/sign.css">
    
    <!-- Web Fonts  -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        
    <!-- IMPORT FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <p class="title">Create Account</p>
            <form class="register-form" method="POST">
                <?php include('errors.php'); ?><br>
                <div>
                    <input type="text" name="first_name" id="first_name" placeholder="First name" value="">
                </div><br>

                <div>
                    <input type="text" name="last_name" id="last_name" placeholder="Last name" value="">
                </div><br>

                <div>
                    <input type="email" name="user_email" id="user_email" placeholder="Email" value="">
                </div><br>

                <div>
                    <input type="password" name="password_1" id="password_1" placeholder="Password">
                </div><br>

                <div>
                    <input type="password" name="password_2" id="password_2" placeholder="Retype password">
                </div><br>
                
                <div class="space"></div>
                <button class="register-submit" type="submit" name="register_submit">Create Account</button>
                
                <p class="go-to-login">Already have account?<a href="login.php"> Login</a></p>
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