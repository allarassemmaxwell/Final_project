<?php 
	require_once('config/db_connection.php');
	require_once('config/add_save_money.php');
	
	if (!isset($_SESSION['user_email'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

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
		<title>Update Source || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

		    <!-- Web Fonts  -->
			<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        
        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		
        <?php 
            include('header.php');
            $user_id   = $_GET['id1'];
            $source_id = $_GET['id2'];
            $name 	   = $_GET['id3'];
        ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
				<a style="text-decoration: none" class="primary" href="source.php">Source</a>/ Update
			</div>

			<div class="table-top-space"></div>
              
            <form class="add-source-form edit-page" method="POST">
				<div>
					<?php include('errors.php'); ?><br>
				</div>

                <div>
					<input  style="font-size: 14px; color: #737373; padding:15px;" type="text" value="<?php echo $name; ?>" name="name" id="name" placeholder="Name">
                    <input type="text" hidden name="source_id" value="<?php echo $source_id; ?>">
					<input type="text" hidden name="user_id" value="<?php echo $user_id; ?>">
				</div><br><br>
				
                <div>
                    <input class="button-primary" name="update-source" type="submit" value="Update Source">
                </div>
            </form>  

        </div>
        <?php
        
        ?>



		

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

		<style>
			.edit-page {
				width: 55%;
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
					width: 55%;
					margin: auto;
				}
				.profile {
					margin-right: 27.5%;
				}
			}

		</style>
	</body>
</html>