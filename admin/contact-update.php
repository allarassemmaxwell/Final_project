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
		<title>Update Contact || FEM</title>
		<link rel="stylesheet" href="../css/dashboard.css">

		<!-- Web Fonts  -->
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>	
			
        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		
        <?php 
            include('header.php');
            $contact_id = $_GET['id1'];
            $first_name = $_GET['id2'];
            $last_name  = $_GET['id3'];
            $email      = $_GET['id4'];
            $subject    = $_GET['id5'];
            $message    = $_GET['id6'];
        ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
				<a style="text-decoration: none" class="primary" href="contact.php">Contacts</a>/ Update
			</div>

			<div class="table-top-space"></div>
              
            <form class="update-contact-validation edit-page" method="POST">
					<div>
						<?php include('../errors.php'); ?><br>
                    </div>
                    
                    <div>
						<input disabled style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $first_name; ?>" type="text" name="first_name" id="first_name" placeholder="First name">
                    </div><br><br>
                    
                    <div>
						<input disabled style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $last_name; ?>" type="text" name="last_name" id="last_name" placeholder="Last name">
                    </div><br><br>
                    
                    <div>
                        <input disabled style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $email; ?>" type="email" name="email" id="email" placeholder="Email">
                        <input style="font-size: 14px; color: #737373; padding: 10px;" hidden value="<?php echo $contact_id; ?>" type="text" name="contact_id" id="contact_id" placeholder="Email">
                    </div><br><br>

                    <div>
						<input disabled style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $subject; ?>" type="text" name="subject" id="subject" placeholder="Subject">
                    </div><br><br>

                    <div>
                    <textarea disabled id="message" style="padding:10px;" name="message" id="" value="<?php echo $message; ?>" rows="10" placeholder="Message">
                    <?php echo $message; ?></textarea>
                    </div><br><br>
                    

					<!-- <div>
						<input class="button-primary" name="admin-update-contact" type="submit" value="Update Contact">
					</div> -->
				</form>     
			</div>
        </div>






        <?php include_once("../footer.php"); ?>
		
        <!-- JAVASCRIPT -->
		 <script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous">
		</script>   
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<script src="js/validation.js"></script>
		<script src="../js/dashboard.js"></script>
        

        <style>
            textarea{
                height: 250px;
                width: 80%;
                margin-left: 10%;
                margin-right: 10%;
                padding: 15px 2px;
                font-size: 16px;
                border-radius: 5px;
                border: 1px solid gray;
            }

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