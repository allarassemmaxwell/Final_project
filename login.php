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
    <title>Login || FEM</title>
    <link rel="stylesheet" href="css/sign.css">
</head>
<body>
    <div class="container" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="row">
            <p class="title">Sign in</p>
            <form name="loginForm" method="POST" onsubmit="return loginValidation()">
                <div>
                    <?php include('errors.php'); ?><br>
                </div>
                <div>
                    <?php include('success.php'); ?><br>
                </div>
                <div>
                    <input type="email" name="user_email" id="user_email" placeholder="Email" value="<?php echo $user_email; ?>">
                </div><br>
                <div>
                    <input type="password" id="user_password" name="user_password" placeholder="Password">
                </div><br><br>

                <p class="forgot"><a href="reset-password.php">Forgot Password?</a></p>
                <button class="login-submit" type="submit" name="login_submit">Sign in</button>

                <p class="create-account">Don't have account? <a href="create-account.php"> Create now</a></p>
            </form>                         
        </div>
    </div> 

    <!-- JAVASCRIPT -->
    <script src="js/validation.js"></script>
</body>
</html>