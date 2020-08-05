<?php 
	require_once('config/db_connection.php');
	
	if (!isset($_SESSION['user_id'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	
	$user_id = $_SESSION['user_id'];
	$query   = "SELECT * FROM User WHERE user_id = '$user_id'";
	$results = mysqli_query($con, $query);
	if (mysqli_num_rows($results) == 1) {
		$profile_data = $results->fetch_assoc();		
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Profile || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

		    <!-- Web Fonts  -->
			<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        
        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		

		<?php include('header.php'); ?>

		<div class="main-content">
            
			<div class="title-left"  style="font-size: 15px; color: #737373;">
				Profile
			</div>


            <div class="table-top-space"></div>
            
            <form class="profile-edit-form" method="POST">
				<div>
					<?php include('errors.php'); ?><br>
				</div>
				<div>
                    <?php include('success.php'); ?><br>
                </div>
				<div>
					<input  style="font-size: 14px; color: #737373;" type="text" name="first_name" placeholder="First name" value="<?php echo $profile_data['first_name']; ?>">
				</div><br><br>

				<div>
					<input  style="font-size: 14px; color: #737373;" type="text" name="last_name" placeholder="Last name" value="<?php echo $profile_data['last_name']; ?>">
				</div><br><br>

				<div>
					<input  style="font-size: 14px; color: #737373;" type="email" name="email" placeholder="Email" disabled value="<?php echo $profile_data['user_email']; ?>">
				</div><br><br>

				<div>
					<input  style="font-size: 14px; color: #737373;" type="number" name="family_number" placeholder="Family Number">
				</div><br><br>

                <div>
                    <input class="button-primary" type="submit" name="update_profile" value="Edit profile">
                </div>
            </form>  

			

			<div class="table-bottom-space"></div>
			<div class="table-total profile">
				<!-- <a href="#"> -->
				<button name="delete_account" class="button-error">Delete Account</button>
				<!-- </a> -->
			</div>
			<div class="table-total">
				<button id="myBtn" class="button-error">Change Password</button>
			</div>
		</div>





		<!-- The Modal -->
		<div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<p style="text-align: center; font-size: 15px; color:#737373">Change Password</p>
				<form class="change-password-form" method="POST">
					<div>
						<?php include('errors.php'); ?><br>
					</div>
					<div>
						<input style="font-size: 14px; color: #737373;" type="password" name="old_password" placeholder="Old password">
					</div><br><br>

					<div>
						<input style="font-size: 14px; color: #737373;" type="password" name="new_password" id="new_password" placeholder="New password">
					</div><br><br>

					<div>
						<input style="font-size: 14px; color: #737373;" type="password" name="c_password" id="c_password" placeholder="Confirm password">
					</div><br><br>

					<div>
						<input class="button-primary" name="change_password" type="submit" value="Change password">
					</div>
				</form>  
				<div class="table-bottom-space"></div>
			</div>
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