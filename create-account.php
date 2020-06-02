<?php
    require_once('config/db_connection.php');  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create account || FEM</title>
    <link rel="stylesheet" href="css/style.css">
    
    <!-- IMPORT FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <div class="register">
        <div class="register-content">
            <p class="register-title">Create Account</p>
            <form class="register-form" method="POST">
                <?php include('errors.php'); ?><br>
                <div>
                    <input class="register-input" type="text" name="first_name" id="first_name" placeholder="First name" value="">
                </div><br><br>

                <div>
                    <input class="register-input" type="text" name="last_name" id="last_name" placeholder="Last name" value="">
                </div><br><br>

                <div>
                    <input class="register-input" type="email" name="user_email" id="user_email" placeholder="Email" value="">
                </div><br><br>

                <div>
                    <input class="register-input" type="password" name="password_1" id="password_1" placeholder="Password">
                </div><br><br>

                <div>
                    <input class="register-input" type="password" name="password_2" id="password_2" placeholder="Retype password">
                </div><br><br>
                
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