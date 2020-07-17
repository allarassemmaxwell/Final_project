<?php 
	require_once('config/db_connection.php');

	if (!isset($_SESSION['user_email'])) {
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
		<title>Source Add || FEM</title>
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
              
            <form class="add-source-form" method="POST">
				<div>
					<?php include('errors.php'); ?><br>
				</div>

                <div>
					<input  style="font-size: 14px; color: #737373;" type="text" value="<?php echo $name; ?>" name="name" id="name" placeholder="Name">
                    <input type="text" hidden name="source_id" value="<?php echo $source_id; ?>">
					<input type="text" hidden name="user_id" value="<?php echo $user_id; ?>">
				</div><br><br>
				
                <div>
                    <input class="button-primary" name="update-source" type="submit" value="Add Source">
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
	</body>
</html>