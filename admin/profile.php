<?php 
	require_once('../config/db_connection.php');
	require_once('config/query.php');

	if (!isset($_SESSION['is_admin'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
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
		<meta name="keywords" content="Family Expense Manager, Family Budget" />
		<meta name="description" content="Family Expense Manager System">
		<meta name="author" content="Allarassem N Maxime">
		<!-- Favicon -->
		<link rel="shortcut icon" href="../images/logo.png">
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Profile || FEM</title>
		<link rel="stylesheet" href="../css/dashboard.css">
	</head>
	<body>
		
		

		<?php include('header.php'); ?>

		<div class="main-content">
            
                <div class="title-left" style="font-size: 15px; color: #737373;">
                    Profile
				</div>
            <div class="table-top-space"></div>
            
            <form style="font-size: 14px;" name="profileForm" class="profile-page" method="POST" onsubmit="return profileValidation()">
				<div>
					<?php include('../errors.php'); ?><br>
				</div>
				<div>
                    <?php include('../success.php'); ?><br>
                </div>
				<div>
					<input style="padding: 10px; color: #737373;" type="text" name="first_name" placeholder="First name" value="<?php echo $profile_data['first_name']; ?>">
				</div><br><br>

				<div>
					<input style="padding: 10px; color: #737373;" type="text" name="last_name" placeholder="Last name" value="<?php echo $profile_data['last_name']; ?>">
				</div><br><br>

				<div>
					<input style="padding: 10px; color: #737373;" type="email" name="email" placeholder="Email" disabled value="<?php echo $profile_data['user_email']; ?>">
				</div><br><br>

                <div>
                    <input class="button-primary" type="submit" name="update_profile" value="Update profile">
                </div>
            </form>  

			<div class="table-bottom-space"></div>
			<div class="table-total profile">
				<!-- <a href="#"> -->
				<button id="myBtn1" class="button-error">Delete Account</button>
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
				<p style="text-align: center; font-size: 15px; color:#737373">Change password</p>
				<form name="changePasswordForm" method="POST" onsubmit="return changePasswordValidation()">
					<div>
						<?php include('../errors.php'); ?><br>
					</div>
					<div>
						<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" type="password" name="old_password" placeholder="Old password">
					</div><br><br>

					<div>
						<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" type="password" name="new_password" id="new_password" placeholder="New password">
					</div><br><br>

					<div>
						<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" type="password" name="c_password" id="c_password" placeholder="Confirm password">
					</div><br><br>

					<div>
						<input class="button-primary" name="change_admin_password" type="submit" value="Change password">
					</div>
				</form>  
				<div class="table-bottom-space"></div>
			</div>
		</div>



		<!-- MODAL DELETE ACCOUNT -->
		<div id="myModal1" class="modal">
			<div class="modal-content">
				<span class="close close2">&times;</span>
				<p style="text-align: center; font-size: 15px; color:#737373">Confirm Account</p>
				<form name="deleteAccountForm" method="POST" onsubmit="return deleteAccountValidation()">
					<div>
						<?php include('../errors.php'); ?><br>
					</div>

					<div>
						<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" type="password" name="c_password" id="c_password" placeholder="Confirm password">
					</div><br><br>

					<div>
						<input class="button-error" name="delete_admin_user_account" type="submit" value="Delete Account">
					</div>
				</form>  
				<div class="table-bottom-space"></div>
			</div>
		</div>




		<br><br><br>
		<?php include_once("../footer.php"); ?>

		

        
		

		<!-- JAVASCRIPT -->
		<script src="js/validation.js"></script>
		<script src="../js/modal.js"></script>

		<!-- MODAL -->
		<script>
			var modal1  = document.getElementById("myModal1"); 
			var btn1 = document.getElementById("myBtn1");
			var span2 = document.getElementsByClassName("close2")[0];
			btn1.onclick = function() {
				modal1.style.display = "block";
			}
			span2.onclick = function() {
				modal1.style.display = "none";
			}
			window.onclick = function(event) {
				if (event.target == modal1) {
					modal1.style.display = "none";
				}
			}
		</script>


		<style>
			.profile-page {
				width: 50%;
				margin: auto;
			}
			@media only screen and (min-width: 300px) {
				.profile-page {
					width: 100%;
					margin: auto;
				}
				.profile {
					margin-right: 8%;
				}
			}
			@media only screen and (min-width: 600px) {
				.profile-page {
					width: 90%;
					margin: auto;
				}
				.profile {
					margin-right: 12%;
				}
			}
			@media only screen and (min-width: 800px) {
				.profile-page {
					width: 80%;
					margin: auto;
				}
				.profile {
					margin-right: 15%;
				}
			}
			@media screen and (min-width: 1024px) {
				.profile-page {
					width: 50%;
					margin: auto;
				}
				.profile {
					margin-right: 27.5%;
				}
			}

		</style>
	</body>
</html>