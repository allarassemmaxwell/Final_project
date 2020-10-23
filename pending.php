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
    <title>Password Reset || FEM</title>
    <link rel="stylesheet" href="css/sign.css">
</head>
<body>
    <div class="container" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="row">
            <form class="reset-password-form" method="POST" action="login.php" style="padding:15px; padding-top: 40px; color:#737373;">
                <p>
                    We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. 
                </p>
	            <p>Please login into your email account and click on the link we sent to reset your password</p>
            </form>             
        </div>
    </div> 

</body>
</html>