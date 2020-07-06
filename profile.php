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

        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		

		<?php include('header.php'); ?>

		<div class="main-content">
            
                <div class="title-left">
                    Profile
				</div>
				
				<!-- <div class="title-right">
					<div class="add">
						<i class="fa fa-plus"></i> 
						<a href="">Username</a>
					</div>
					<div class="password-delete">
						<a href="">Change Password</a>
						<a href="">Delete Account</a>
					</div>
				</div> -->


            <div class="table-top-space"></div>
            
            <form class="profile-edit-form" method="POST">
				<div>
					<?php include('errors.php'); ?><br>
				</div>
				<div>
                    <?php include('success.php'); ?><br>
                </div>
				<div>
					<input type="text" name="first_name" placeholder="First name" value="<?php echo $profile_data['first_name']; ?>">
				</div><br><br>

				<div>
					<input type="text" name="last_name" placeholder="Last name" value="<?php echo $profile_data['last_name']; ?>">
				</div><br><br>

				<div>
					<input type="email" name="email" placeholder="Email" disabled value="<?php echo $profile_data['user_email']; ?>">
				</div><br><br>

				<div>
					<input type="number" name="family_number" placeholder="Family Number">
				</div><br><br>

                <div>
                    <input class="button-primary" type="submit" name="update_profile" value="Edit profile">
                </div>
            </form>  



<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

			<div class="table-bottom-space"></div>
			<div class="table-total">
				<a href="#">
					<button class="button-error">Delete Account</button>
				</a>
			</div>
			<div class="table-total">
				<a href="change-password.php">
					<button class="button-error">Change Password</button>
				</a>
			</div>
		</div>





<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
	<form class="profile-edit-form" method="POST">
		<div>
			<?php include('errors.php'); ?><br>
		</div>
		<div>
			<?php include('success.php'); ?><br>
		</div>


		<div>
			<input type="email" name="email" placeholder="Email" disabled value="<?php echo $profile_data['user_email']; ?>">
		</div><br><br>


		<div>
			<input type="text" name="" placeholder="Last name" value="Confirm password">
		</div><br><br>


		<div>
			<input class="button-error" type="submit" name="" value="Delete My Account">
		</div><br><br>
	</form>  
  </div>

</div>



	<style>

	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0%;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
		margin: auto;
	}

	/* The Close Button */
	.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover, .close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}
</style>

		<?php include_once("footer.php"); ?>
		
		
		

<script>
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>






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