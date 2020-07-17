<?php 
	require_once('config/db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Expense Manager</title>
    <link rel="stylesheet" href="css/index.css">

    <!-- Web Fonts  -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        
    <!-- IMPORT FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
        <i class="fa fa-bars"></i>
        </label>
        <label class="logo">
            <a href="index.php" style="color:white;">F E M</a>
        </label>
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
        </ul>
    </nav>

    <section class="banner"></section>



    
    <form class="login-form" method="POST" action="" style="width: 60%; margin: auto;">
        <div>
            <?php include('errors.php'); ?><br>
        </div>
        <div>
            <?php include('success.php'); ?><br>
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="text" name="user_email" placeholder="First Name" value="<?php echo $user_email; ?>">
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="text" name="user_email" placeholder="Last Name" value="<?php echo $user_email; ?>">
        </div>
        <div>
            <input  style="font-size: 14px; color: #737373;" class="login-input" type="email" name="user_email" placeholder="Email" value="<?php echo $user_email; ?>">
        </div>
        <button class="button">Maxwell</button><br><br><br>
    </form>    
    

    <!-- START OF FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="container">
                <p class="address">Langata<br>Nairobi Kenya</p>
                <ul class="footer-links">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- END OF FOOTER -->
</body>
</html>
