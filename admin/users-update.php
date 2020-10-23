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
		<title>Update User || FEM</title>
		<link rel="stylesheet" href="../css/dashboard.css">
	</head>
	<body>
		
        <?php 
            include('header.php');
            $user_id 	= $_GET['id1'];
            $user_email = $_GET['id2'];
            $first_name = $_GET['id3'];
            $last_name  = $_GET['id4'];
            $is_admin   = $_GET['id5'];
        ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
				<a style="text-decoration: none" class="primary" href="users.php">User</a>/ Update
			</div>

			<div class="table-top-space"></div>
              
            <form class="edit-page" name="editUserForm" method="POST" onsubmit="return editUserValidation()">
					<div>
						<?php include('../errors.php'); ?><br>
                    </div>
                    
                    <div>
						<input  style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $first_name; ?>" type="text" name="first_name" id="first_name" placeholder="First name">
                    </div><br><br>
                    
                    <div>
						<input  style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $last_name; ?>" type="text" name="last_name" id="last_name" placeholder="Last name">
                    </div><br><br>
                    
                    <div>
                        <input style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $user_email; ?>" type="email" name="email" id="email" placeholder="Email">
                        <input style="font-size: 14px; color: #737373; padding: 10px;" hidden value="<?php echo $user_id; ?>" type="text" name="user_id" id="user_id" placeholder="Email">
                    </div><br><br>

					<div>
                        <select id="is_admin" name="is_admin"  style="font-size: 14px; color: #737373;">
                            <option value="">Admin</option>
                            <?php
                                if($is_admin == 1) {
                                    echo '<option value="' . $is_admin . '" selected>' . 'Yes' . '</option>';
                                }
                            ?>
                            <option value="1">Yes</option>
							<option value="0">No</option>
						</select>
                    </div><br><br>
                    

					<div>
						<input class="button-primary" name="admin-update-user" type="submit" value="Update User">
					</div>
				</form>       
				<div class="table-bottom-space"></div>
				<div class="table-total profile">
					<button id="myBtn" class="button-error">Change Password</button>
				</div>
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
						<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" type="password" name="new_password" id="new_password" placeholder="New password">
						<input style="font-size: 14px; color: #737373; padding: 10px;" hidden value="<?php echo $user_id; ?>" type="text" name="user_id" id="user_id" placeholder="Email">
					</div><br><br>

					<div>
						<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" type="password" name="c_password" id="c_password" placeholder="Confirm password">
					</div><br><br>

					<div>
						<input class="button-primary" name="admin-change-user-password" type="submit" value="Change password">
					</div>
				</form>  
				<div class="table-bottom-space"></div>
			</div>
		</div>




        <?php include_once("../footer.php"); ?>
		
        
		



		<!-- JAVASCRIPT -->
		<script src="js/validation.js"></script>
		<script src="../js/modal.js"></script>
        

        <style>
			.edit-page {
				width: 50%;
				margin: auto;
			}
			@media only screen and (min-width: 300px) {
				.edit-page {
					width: 100%;
					margin: auto;
				}
				.profile {
					margin-right: 8%;
				}
			}
			@media only screen and (min-width: 600px) {
				.edit-page {
					width: 90%;
					margin: auto;
				}
				.profile {
					margin-right: 12%;
				}
			}
			@media only screen and (min-width: 800px) {
				.edit-page {
					width: 80%;
					margin: auto;
				}
				.profile {
					margin-right: 15%;
				}
			}
			@media screen and (min-width: 1024px) {
				.edit-page {
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