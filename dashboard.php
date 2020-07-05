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
		<title>Dashboard || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		
		<!-- INCLUDE HEADER -->
		<?php include('header.php'); ?>

		<div class="main-content">
			<div class="title-left">
				Dashboard
			</div>

			<div class="title-right">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a href="expense-add.php">Add expense</a>
				</div>
			</div>
			
			<div style="margin-left:20px; background-color: red;">
				<?php if (isset($_SESSION['success'])) : ?>
					<div class="error success" >
						<h3>
							<?php 
								echo $_SESSION['success']; 
								unset($_SESSION['success']);
							?>
						</h3>
					</div>
				<?php endif ?>
			</div>
			


			<div class="table-top-space"></div>
			<table>
				<tr style="height: 65px; font-size: 18px;">
					<th>Category</th>
					<th>Product/Service</th>
					<th>Price</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
				<!-- LOOPING USER DATA -->
				<?php 
					$user_id = $_SESSION['user_id'];
					$query   = "SELECT * FROM Expense WHERE user_id = '$user_id'";
					$results = mysqli_query($con, $query);
					while($row = $results->fetch_assoc()) {
						echo "<tr>";
							// GET PRODUCT SERVICE NAME
							$product_service_id = $row['product_service_id'];
							$query   = "SELECT * FROM ProductService WHERE product_service_id = '$product_service_id'";
							$result2 = mysqli_query($con, $query);
							if (mysqli_num_rows($result2) == 1) {
								$product_service_data = $result2->fetch_assoc();		
							}

							// GET PRODUCT CATEGORY NAME
							$product_category_id = $product_service_data['product_service_category_id'];
							$query   = "SELECT * FROM ProductServiceCategory WHERE category_id = '$product_category_id'";
							$result3 = mysqli_query($con, $query);
							if (mysqli_num_rows($result3) == 1) {
								$product_category_data = $result3->fetch_assoc();		
							}

							// DISPLAY DATA
							echo"<td>". $product_category_data['name'] ."</td>";
							echo"<td>". $product_service_data['name'] ."</td>";
							echo"<td>". $row['price'] ."</td>";
							echo"<td>". date('M d Y',strtotime($row['created_at'])) ."</td>";
							echo"<td>";
								echo"<i class='fa fa-trash-o icon-delete' title='Delete'></i>&nbsp;&nbsp;&nbsp;";
								echo"<i class='fa fa-pencil icon-edit' title='Edit'></i>";
							echo"</td>";
						echo "</tr>";
					}
				?>
				<!-- <tr>
					<td>Magazzini Alimentari Riuniti</td>
					<td>Giovanni Rovelli</td>
					<td>ksh 300</td>
					<td>20-03-2020</td>
					<td>
						<i class="fa fa-trash-o icon-delete" title="Delete"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-pencil icon-edit" title="Edit"></i>
					</td>
				</tr> -->
			  </table>

			  <div class="table-bottom-space"></div>
			  <div class="table-total">
				<button class="button-error-total">Total: ksh 5.500</button>
			  </div>
		</div>



		

		<?php include_once("footer.php"); ?>
		

		
        <!-- JAVASCRIPT -->
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script src="js/dashboard.js"></script>
	</body>
</html>