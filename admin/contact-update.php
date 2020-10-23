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
              
            	<form class="update-contact-validation edit-page">
					<div>
						<?php include('../errors.php'); ?><br>
                    </div>
                    
                    <div>
						<input disabled style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $first_name; ?>" type="text">
                    </div><br><br>
                    
                    <div>
						<input disabled style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $last_name; ?>" type="text">
                    </div><br><br>
                    
                    <div>
                        <input disabled style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $email; ?>" type="email">
                        <input style="font-size: 14px; color: #737373; padding: 10px;" hidden value="<?php echo $contact_id; ?>" type="text">
                    </div><br><br>

                    <div>
						<input disabled style="font-size: 14px; color: #737373; padding: 10px;" value="<?php echo $subject; ?>" type="text">
                    </div><br><br>

                    <div>
                    	<textarea disabled style="padding:10px;" value="<?php echo $message; ?>" rows="10">
							<?php echo $message; ?>
						</textarea>
                    </div><br><br>
                    
				</form>   
				
				<form class="update-contact-validation edit-page" style="margin-bottom: 10px;" name="help" method="POST" onsubmit="return helpValidation()">
					<div>
						<textarea id="message" style="padding:10px;" name="message" rows="5" placeholder="Reply"></textarea>
						<input type="text" name="user_email" id="user_email" hidden value="<?php echo $email; ?>">
						<input type="text" name="contact_id" id="contact_id" hidden value="<?php echo $contact_id; ?>">
					</div><br><br>
					<div>
						<input class="button-primary" name="contact-response" type="submit" value="Reply">
					</div>
				</form>
			</div>
        </div>






		
        <!-- JAVASCRIPT -->
		<script src="js/validation.js"></script>
        
		<!-- TEXT AREA STYLE -->
        <style>
            textarea{
                width: 80%;
                margin-left: 10%;
                margin-right: 10%;
                padding: 15px 2px;
                font-size: 16px;
                border-radius: 5px;
                border: 1px solid gray;
            }
		</style>
	</body>
</html>