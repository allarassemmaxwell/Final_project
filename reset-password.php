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
</head>
<body>
    <div class="container" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="row">
            <p class="title">Password Reset</p>
            <form name="forgotPasswordForm" method="POST" onsubmit="return forgotPasswordValidation()">
                <div>
                    <?php include('errors.php'); ?><br>
                </div>
                <div>
                    <input name="email" id="email" type="email" placeholder="Email">
                </div><br>
                <div class="space"></div>
                <div>
                    <button name="reset-password" class="reset-password-submit" type="submit">Reset Password</button>
                </div>
                
                <p class="create-account">Already have account?<a href="login.php"> Login</p>
            </form>             
        </div>
    </div> 


    <!-- JAVASCRIPT -->
    <script src="js/validation.js"></script>
</body>
</html>