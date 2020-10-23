<?php 
	require_once('../config/db_connection.php');
	require_once('config/query.php');
	
	if (!isset($_SESSION['is_admin'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="keywords" content="Family Expense Manager, Family Budget" />
		<meta name="description" content="Family Expense Manager System">
		<meta name="author" content="Allarassem N Maxime">
		<!-- Favicon -->
		<link rel="shortcut icon" href="../images/logo.png">
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Update Income || FEM</title>
		<link rel="stylesheet" href="../css/dashboard.css">
	</head>
	<body>
		
        <?php 
            include('header.php');
            $user_id    = $_GET['id1'];
            $user_email = $_GET['id2'];
            $message = $_GET['id3'];

        ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
				<a style="text-decoration: none" class="primary" href="income.php">Help</a>/ Response
			</div>

            <div class="table-top-space"></div>
            
            <!-- HELP MESSAGE -->
            <div style="margin-left: 20%; margin-right: 21%;">
                <textarea disabled name="message" id="message" rows="15" style="width:100%; border: 2px solid #dedede; background-color: #fff;">
                    <?php echo $message ?>
                </textarea>
            </div>


              
            <!-- STAFF RESPONSE -->
            <form style="margin-left: 17%; margin-right: 17%; margin-bottom: 0px; bottom: 0px; position: fixed; width: 51%;" name="help" method="POST" onsubmit="return helpValidation()">
                <div>
                    <textarea  name="message" id="message" rows="10" style="width:100%; border: 2px solid #dedede; background-color: #fff;" placeholder="Please write something"></textarea>
                    <input type="text" name="user_id" id="user_id" hidden value="<?php echo $user_id; ?>">
                    <input type="text" name="user_email" id="user_email" hidden value="<?php echo $user_email; ?>">
                </div>
                    
                <div>
                    <input class="button-primary" name="staff-feedback" type="submit" value="Send Us Message">
                </div>
            </form>   

        </div>



		<!-- JAVASCRIPT -->
		<script src="js/validation.js"></script>
	</body>
</html>