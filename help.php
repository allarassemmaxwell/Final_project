<?php 
	require_once('config/db_connection.php');
	
	if (!isset($_SESSION['user_email'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
    }
    $user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="keywords" content="Family Expense Manager, Family Budget" />
		<meta name="description" content="Family Expense Manager System">
        <meta name="author" content="Allarassem N Maxime">
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/logo.png">
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Feedback || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">
	</head>
	<body>

        <?php include('header.php'); ?>

        <div class="main-content">
            <div class="title-left" style="font-size: 15px; color: #737373;">
                Feedback
            </div>

            <div>
                <?php include('errors.php'); ?><br>
            </div>
            <div>
                <?php include('success.php'); ?><br>
            </div>

        </div>


        <form class="help" name="help" method="POST" onsubmit="return helpValidation()">
            <div>
                <textarea  name="message" id="message" rows="10" style="width:100%; border: 2px solid #dedede; background-color: #fff;" placeholder="Please write something"></textarea>
			</div>
				
            <div>
                <input class="button-primary" name="feedback" type="submit" value="Send Us Message">
            </div>
        </form>  



        <!-- JAVASCRIPT -->
        <script src="js/validation.js"></script>


	</body>
</html>



