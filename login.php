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
    
        <!-- Web Fonts  -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        
    <!-- IMPORT FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>

    <div class="container" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="row">
            <p class="title">Sign in</p>
            <form class="login-form" method="POST" action="">
                <div>
                    <?php include('errors.php'); ?><br>
                </div>
                <div>
                    <?php include('success.php'); ?><br>
                </div>
                <div>
                    <input type="email" name="user_email" placeholder="Email" value="<?php echo $user_email; ?>">
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