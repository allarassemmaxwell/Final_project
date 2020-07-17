<?php
    require_once('config/db_connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
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
    <div class="container">
        <div class="row">
            <p class="title">Reset password</p>
            <form class="reset-password-form" method="POST" action="">
                <div>
                    <?php include('errors.php'); ?><br>
                </div>
                <div>
                    <input name="email" type="email" placeholder="Email">
                </div><br>
                <div class="space"></div>
                <div>
                    <button class="reset-password-submit" type="submit">Reset Password</button>
                </div>
                
                <p class="create-account">Already have account?<a href="login.php"> Login</p>
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