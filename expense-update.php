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
		<title>Update Expense || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">
	</head>
	<body>

		<?php include('header.php'); ?>

		<div class="main-content">
            
            <div class="title-left" style="font-size: 15px; color: #737373;">
				<a style="text-decoration: none" class="primary" href="expense.php">Expense</a>/ Update
            </div>
            <div class="table-top-space"></div>
            
            <form class="edit-page" name="expenseForm" method="POST" onsubmit="return expenseValidation()">
				<div>
					<?php include('errors.php'); ?><br>
				</div>

				<div>
					<select id="product_or_service" name="product_or_service"  style="font-size: 14px; color: #737373; padding-left: 5px;">
						<option value="">Select Product/Service</option>
						<?php 

							$user_id 	= $_GET['id1'];
							$expense_id = $_GET['id2'];
							$price 		= $_GET['price'];
							$product_service_id = $_GET['id3'];

							$query   = "SELECT * FROM ProductService WHERE user_id = '$user_id' ORDER BY created_at DESC";
							$results = mysqli_query($con, $query);

							if (mysqli_num_rows($results) > 0) {
								while($row = mysqli_fetch_assoc($results)) {
									if($row['product_service_id'] == $product_service_id) {
										echo '<option value="' . $row['product_service_id'] . '" selected>' . $row['name'] . '</option>';
									}
									echo '<option value="' . $row['product_service_id'] . '">' . $row['name'] . '</option>';
								}
							} 
						?>
					</select>
				</div><br><br>

				<div>
					<input  style="font-size: 14px; color: #737373; padding-left: 10px;" type="text" name="price" id="price" value="<?php echo $price; ?>" placeholder="Price">
					<input type="text" hidden name="expense_id" value="<?php echo $expense_id; ?>">
					<input type="text" hidden name="user_id" value="<?php echo $user_id; ?>">
				</div><br><br>

                <div>
                    <input class="button-primary" name="update-expense" type="submit" value="Update Expense">
                </div>
			</form>  
			


		</div>




		<?php include_once("footer.php"); ?>
		
		
		
        <!-- JAVASCRIPT -->
		<script src="js/validation.js"></script>
		
		
	</body>
</html>