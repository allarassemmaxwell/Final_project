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
		<title>Update Expense || FEM</title>
		<link rel="stylesheet" href="../css/dashboard.css">

		<!-- Web Fonts  -->
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>	
			
        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		
        <?php 
            include('header.php');
            $user_id 	= $_GET['id1'];
            $expense_id = $_GET['id2'];
            $price 		= $_GET['price'];
            $product_service_id = $_GET['id3'];
        ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
				<a style="text-decoration: none" class="primary" href="product-service.php">Product</a>/ Update
			</div>

			<div class="table-top-space"></div>
              
            <form class="update-expense-validation edit-page" method="POST">
				<div>
					<?php include('../errors.php'); ?><br>
                </div>
                
                <div>
                    <select id="user" name="user"  style="font-size: 14px; color: #737373; padding:10px;">
						<option value="">Select User</option>
                        <?php 

							$query_user   = "SELECT * FROM User ORDER BY created_at DESC";
							$results_user = mysqli_query($con, $query_user);

							if (mysqli_num_rows($results_user) > 0) {
								while($row = mysqli_fetch_assoc($results_user)) {
                                    if($row['user_id'] == $user_id) {
										echo '<option value="' . $row['user_id'] . '" selected>' . $row['user_email'] . '</option>';
									}
									echo '<option value="' . $row['user_id'] . '">' . $row['user_email'] . '</option>';
								}
							} else {
								// echo "0 results";
							}
						?>
					</select>
                </div><br><br>

				<div>
					<select id="product_or_service" name="product_or_service"  style="font-size: 14px; color: #737373; padding-left: 5px;">
						<option value="">Select Product/Service</option>
						<?php 

							$query   = "SELECT * FROM ProductService WHERE user_id = '$user_id' ORDER BY created_at DESC";
							$results = mysqli_query($con, $query);

							if (mysqli_num_rows($results) > 0) {
								while($row = mysqli_fetch_assoc($results)) {
									if($row['product_service_id'] == $product_service_id) {
										echo '<option value="' . $row['product_service_id'] . '" selected>' . $row['name'] . '</option>';
									}
									echo '<option value="' . $row['product_service_id'] . '">' . $row['name'] . '</option>';
								}
							} else {
								// echo "0 results";
							}
						?>
					</select>
				</div><br><br>

				<div>
					<input  style="font-size: 14px; color: #737373; padding-left: 10px;" type="text" name="price" id="price" value="<?php echo $price; ?>" placeholder="Price">
					<input type="text" hidden name="expense_id" value="<?php echo $expense_id; ?>">
				</div><br><br>

                <div>
                    <input class="button-primary" name="admin-update-expense" type="submit" value="Update Expense">
                </div>
			</form>     

        </div>
        <?php
        
        ?>



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