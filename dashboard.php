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
		<title>Dashboard || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">
	</head>
	<body>

		<?php include('header.php'); ?>



		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
			Dashboard
			</div>

			<div class="title-right" id="myBtn">
				<div class="add">
					<a style="font-size: 15px;">Add Expense</a>
				</div>
			</div>
			
			
			<div>
				<?php include('errors.php'); ?><br>
			</div>
			<div>
				<?php include('success.php'); ?><br>
			</div>

			

			<div style="overflow-x:auto;">
				<table>
					<?php 
						$_SESSION['total_expenses'] = 0;
						$this_month = date("m");
						$this_year  = date("Y");
						$user_id = $_SESSION['user_id'];
						$query   = "SELECT * FROM Expense WHERE user_id = '$user_id' AND YEAR(created_at) = '$this_year' AND MONTH(created_at) = '$this_month' ORDER BY created_at DESC";
						$results = mysqli_query($con, $query);
						if (mysqli_num_rows($results) > 0) {
							?>
								<tr style="height: 65px; font-size: 15px; color: #737373;">
									<th style="color: #737373;">Source</th>
									<th style="color: #737373;">Income</th>
									<th style="color: #737373;">Category</th>
									<th style="color: #737373;">Product/Service</th>
									<th style="color: #737373;">Price</th>
									<th style="color: #737373;">Date</th>
									<th style="color: #737373;">Action</th>
								</tr>
							<?php
							while($row = $results->fetch_assoc()) {
								$_SESSION['total_expenses'] += $row['price'];
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


								// GET INCOME NAME
								$income_id = $row['income_id'];
								$income_query   = "SELECT * FROM Income WHERE income_id = '$income_id'";
								$income_result  = mysqli_query($con, $income_query);
								if (mysqli_num_rows($income_result) == 1) {
									$income_data = $income_result->fetch_assoc();		
								}

								// GET SOURCE NAME
								$source_id = $income_data['source_id'];
								$source_query   = "SELECT * FROM Source WHERE source_id = '$source_id'";
								$source_result  = mysqli_query($con, $source_query);
								if (mysqli_num_rows($source_result) == 1) {
									$source_data = $source_result->fetch_assoc();		
								}

								// DISPLAY DATA
								?>
									<tr>
										<td><?php echo $source_data['name'] ?></td>
										<td><?php echo number_format($income_data['amount'], 2) ?></td>
										<td><?php echo $product_category_data['name'] ?></td>
										<td><?php echo $product_service_data['name'] ?></td>
										<td><?php echo number_format($row['price'], 2) ?></td>
										<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
										<td> 
											<!-- DELETE -->
											<form action="" method="POST" style="margin-left:-40px;">
												<input hidden name="expense_id" value="<?php echo $row['expense_id'] ?>"></input>
												<button name="delete-expense" style="cursor: pointer;">
													<img src="images/icons/delete.svg" style="width: 15px;">
												</button>&nbsp;&nbsp;&nbsp;
											</form>
											<!-- UPDATE -->
											<div style="margin-left:30px; margin-top:-25px">
												<button>
													<a href="expense-update.php?id1=<?php echo $_SESSION['user_id'] ?>&id2=<?php echo $row['expense_id'] ?>&id3=<?php echo $product_service_data['product_service_id'] ?>&price=<?php echo $row['price'] ?>">
														<img src="images/icons/edit.svg" style="width: 15px;">
													</a>
												</button>
											</div>
										</td>
									</tr>
								<?php
							}
						} else {
							?>
								<div style="font-size: 15px; color: #737373; margin-top: 50px; text-align: center;">No data</div>
							<?php
						}
					?>	
				</table>
			</div>
			<?php 
			  	if (mysqli_num_rows($results) > 0) {
					?>
						<div class='table-bottom-space'></div>
						<div class='table-total'>
							<button class='button-error-total'>Expenses: Ksh <?php echo number_format($_SESSION['total_expenses'], 2); ?></button>
						</div>
					<?php
				}
			?>





			<!-- The Modal -->
			<div id="myModal" class="modal">
				<div class="modal-content">
					<span class="close">&times;</span>
					<p style="text-align: center; font-size: 15px; color: #737373">Add Expense</p>
					<form name="expenseForm" method="POST" onsubmit="return expenseValidation()">
						<div>
							<?php include('errors.php'); ?><br>
						</div>

						
						<div>
							<select id="income" name="income"  style="font-size: 14px; color: #737373;padding-left: 5px; padding-right: 5px;">
								<option value="">Select Income</option>
								<?php 
									$this_month = date("m");
									$this_year  = date("Y");
									$user_id = $_SESSION['user_id'];
									$income_query   = "SELECT * FROM Income WHERE user_id = '$user_id' AND remaining_amount > 1 ORDER BY created_at DESC";
									$income_result = mysqli_query($con, $income_query);
									if (mysqli_num_rows($income_result) > 0) {
										while($income_row = mysqli_fetch_assoc($income_result)) {
											// GET SOURCE NAME
											$source_id = $income_row['source_id'];
											$source_query   = "SELECT * FROM Source WHERE source_id = '$source_id' ORDER BY created_at DESC";
											$source_result = mysqli_query($con, $source_query);
											if (mysqli_num_rows($source_result) == 1) {
												$source_data = $source_result->fetch_assoc();		
											}
											echo '<option value="' . $income_row['income_id'] . '">' . $source_data['name'] . ' remain: '. $income_row['remaining_amount'] .', Date: ' . date('M Y',strtotime($source_data['created_at'])) . '</option>';
										}
									} 
								?>
							</select>
						</div><br><br>


						<div>
							<select id="product_or_service" name="product_or_service" style="font-size: 14px; color: #737373;padding-left: 5px; padding-right: 5px;">
								<option value="">Select Product/Service</option>
								<?php 
									$user_id = $_SESSION['user_id'];
									$query   = "SELECT * FROM ProductService WHERE user_id = '$user_id' ORDER BY created_at DESC";
									$results = mysqli_query($con, $query);

									if (mysqli_num_rows($results) > 0) {
										while($row = mysqli_fetch_assoc($results)) {
											echo '<option value="' . $row['product_service_id'] . '">' . $row['name'] . '</option>';
										}
									} 
								?>
							</select>
						</div><br><br>

						<div>
							<input  style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" type="text" name="price" id="price" placeholder="Price">
						</div><br><br>

						<div>
							<input class="button-primary" name="add-expense" type="submit" value="Add Expense">
						</div>
					</form>  
					<div class="table-bottom-space"></div>
				</div>
			</div>
		</div>





		
		<br><br><br>
		<?php include_once("footer.php"); ?>

		
		
        <!-- JAVASCRIPT -->
		<script src="js/modal.js"></script>
		<script src="js/validation.js"></script>

	</body>
</html>


