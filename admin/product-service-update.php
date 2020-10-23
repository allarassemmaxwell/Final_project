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
		<title>Update Product/Service || FEM</title>
		<link rel="stylesheet" href="../css/dashboard.css">
	</head>
	<body>
		
        <?php 
            include('header.php');
            $user_id     = $_GET['id1'];
            $product_service_id = $_GET['id2'];
            $category_id = $_GET['id3'];
            $name        = $_GET['name'];
        ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
				<a style="text-decoration: none" class="primary" href="product-service.php">Product</a>/ Update
			</div>

			<div class="table-top-space"></div>
              
            <form class="edit-page" name="productServiceForm" method="POST" onsubmit="return productServiceValidation()">
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
							}
						?>
					</select>
                </div><br><br>

                <div>
					<select id="category" name="category"  style="font-size: 14px; color: #737373; padding:10px;">
						<option value="">Select Category</option>
                        <?php 
							$query   = "SELECT * FROM ProductServiceCategory WHERE user_id = '$user_id' ORDER BY created_at DESC";
							$results = mysqli_query($con, $query);

							if (mysqli_num_rows($results) > 0) {
								while($row = mysqli_fetch_assoc($results)) {
                                    if($row['category_id'] == $category_id) {
										echo '<option value="' . $row['category_id'] . '" selected>' . $row['name'] . '</option>';
									}
									echo '<option value="'. $row['category_id'].'">' . $row['name'] . '</option>';
								}
							}
						?>
					</select>
				</div><br><br>

                <div>
					<input  style="font-size: 14px; color: #737373; padding:15px;" type="text" value="<?php echo $name; ?>" name="name" placeholder="Name">
                    <input type="text" hidden name="product_service_id" value="<?php echo $product_service_id; ?>">
				</div><br><br>

                <div>
                    <input class="button-primary" name="admin-update-product-service" type="submit" value="Update Product/Service">
                </div>
            </form>     

        </div>


        <?php include_once("../footer.php"); ?>
		
        
		


		<!-- JAVASCRIPT -->
		<script src="js/validation.js"></script>


	</body>
</html>