<?php 
	require_once('config/db_connection.php');
	if (!isset($_SESSION['user_id'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Change Password || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

		<?php include('header.php'); ?>

		<div class="main-content">
            
            <div class="title-left">
                <a href="profile.php" style="text-decoration: none; color: #333;">Profile</a>
                /Change Password
            </div>


            <div class="table-top-space"></div>
            
            <form class="change-password-form" method="POST">
				<div>
					<?php include('errors.php'); ?><br>
				</div>
				<div>
					<input type="password" name="old_password" placeholder="Old password">
				</div><br><br>

				<div>
					<input type="password" name="new_password" id="new_password" placeholder="New password">
				</div><br><br>

				<div>
					<input type="password" name="c_password" id="c_password" placeholder="Confirm password">
				</div><br><br>

                <div>
                    <input class="button-primary" name="change_password" type="submit" value="Change password">
                </div>
            </form>  

			<div class="table-bottom-space"></div>

		</div>



		<?php include_once("footer.php"); ?>
		
		
		
        <!-- JAVASCRIPT -->
        <script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous">
		</script>   
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<script src="js/dashboard.js"></script>
	</body>
</html>