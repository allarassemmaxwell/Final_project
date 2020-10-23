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
		<meta name="keywords" content="Family Expense Manager, Family Budget" />
		<meta name="description" content="Family Expense Manager System">
        <meta name="author" content="Allarassem N Maxime">
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/logo.png">
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Update Category|| FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">
	</head>
	<body>

        <?php include('header.php'); 
            $user_id 	 = $_GET['id1'];
            $category_id = $_GET['id2'];
            $name 		 = $_GET['name'];
        ?>

		<div class="main-content">
            
            <div class="title-left" style="font-size: 15px; color: #737373;">
				<a style="text-decoration: none" class="primary" href="category.php">Category</a>/ Update
            </div>
            <div class="table-top-space"></div>

			
            <form class="edit-page" name="categoryForm" method="POST" onsubmit="return categoryValidation()">
				<div>
					<?php include('errors.php'); ?><br>
				</div>
                <div>
					<input  style="font-size: 14px; color: #737373; padding:15px;" type="text" value="<?php echo $name; ?>" name="name" placeholder="Name">
                    <input type="text" hidden name="category_id" value="<?php echo $category_id; ?>">
					<input type="text" hidden name="user_id" value="<?php echo $user_id; ?>">
				</div><br><br>

                <div>
                    <input class="button-primary" name="update-category" type="submit" value="Update Category">
                </div>
            </form>  

		</div>

		<?php include_once("footer.php"); ?>
		
		
		




        <!-- JAVASCRIPT -->
		<script src="js/validation.js"></script>

	</body>
</html>