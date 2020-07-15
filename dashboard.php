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

			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a>Add expense</a>
				</div>
			</div>
			
			<div>
				<?php include('errors.php'); ?><br>
			</div>
			<div>
				<?php include('success.php'); ?><br>
			</div>
			


			<!-- <div class="table-top-space"></div> -->
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
					$query   = "SELECT * FROM Expense WHERE user_id = '$user_id'  ORDER BY created_at DESC";
					$results = mysqli_query($con, $query);
					if (mysqli_num_rows($results) > 0) {
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
								?>
									<td><?php echo $product_category_data['name'] ?></td>
									<td><?php echo $product_service_data['name'] ?></td>
									<td><?php echo $row['price'] ?></td>
									<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
									<td> 
										<!-- DELETE -->
										<form action="" method="POST" style="margin-left:-40px;">
											<input hidden name="expense_id" value="<?php echo $row['expense_id'] ?>"></input>
											<button name="delete-expense">
												<i class="fa fa-trash-o icon-delete" id="delete" title="Delete"></i>
											</button>&nbsp;&nbsp;&nbsp;
										</form>
										<!-- UPDATE -->
										<div style="margin-left:30px; margin-top:-20px">
											<button>
												<a href="expense-update.php?id1=<?php echo $_SESSION['user_id'] ?>&id2=<?php echo $row['expense_id'] ?>&id3=<?php echo $product_service_data['product_service_id'] ?>&price=<?php echo $row['price'] ?>">
													<i class="fa fa-pencil icon-edit" title="Edit"></i>
												</a>
											</button>
										</div>
									</td>
								<?php
							echo "</tr>";
						}
					} else {
						// echo "There is No data";
					}
				?>

			  </table>


			  <!-- The Modal -->
				<div id="myModal" class="modal">
					<div class="modal-content">
						<span class="close">&times;</span>
						<p style="text-align: center; font-size:17px;">Add Expense</p>
						<form class="add-expense-form" method="POST">
							<div>
								<?php include('errors.php'); ?><br>
							</div>

							<div>
								<select id="product_or_service" name="product_or_service">
									<option value="">--- Select Product/Service ---</option>
									<?php 
										$user_id = $_SESSION['user_id'];
										$query   = "SELECT * FROM ProductService WHERE user_id = '$user_id' ORDER BY created_at DESC";
										$results = mysqli_query($con, $query);

										if (mysqli_num_rows($results) > 0) {
											while($row = mysqli_fetch_assoc($results)) {
												echo '<option value="' . $row['product_service_id'] . '">' . $row['name'] . '</option>';
											}
										} else {
											// echo "0 results";
										}
									?>
								</select>
							</div><br><br>

							<div>
								<input type="text" name="price" id="price" placeholder="Price">
							</div><br><br>

							<div>
								<input class="button-primary" name="add-expense" type="submit" value="Create">
							</div>
						</form>  
						<div class="table-bottom-space"></div>
					</div>
				</div>



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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<script src="js/dashboard.js"></script>
	</body>
</html>