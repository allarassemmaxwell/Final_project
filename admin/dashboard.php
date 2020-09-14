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
		<title>Dashboard || FEM</title>
		<link rel="stylesheet" href="../css/dashboard.css">

		<!-- Web Fonts  -->
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>	
			
        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		
		<?php include('header.php'); ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
				Dashboard
			</div>

			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a style="font-size: 15px;">Add expense</a>
				</div>
			</div>
			


            <div>
				<?php include('../errors.php'); ?><br>
			</div>
			<div>
				<?php include('../success.php'); ?><br>
            </div>

			<div class="row" style="margin-left: 20px; margin-right: 20px;">
				<div class="column">
					<?php 
						$query  = "SELECT COUNT(*) as total from User";
						$result = mysqli_query($con, $query);
						$data 	= mysqli_fetch_assoc($result);
						?>
							<div>
								<?php echo $data['total']; ?>
								<span style="float: right; height: 30px; width: 30px;">
									<i class="fa fa-users"></i>
								</span>
							</div>
							<div style="margin-top: 10px;">Users</div>
						<?php
					?>
				</div>
				<div class="column">
					<?php 
						$query  = "SELECT COUNT(*) as total from Expense";
						$result = mysqli_query($con, $query);
						$data 	= mysqli_fetch_assoc($result);
						?>
							<div>
								<?php echo $data['total']; ?>
								<span style="float: right; height: 30px; width: 30px;">
									<i class="fa fa-exchange"></i>
								</span>
							</div>
							<div style="margin-top: 10px;">Expenses</div>
						<?php
					?>
				</div>
				<div class="column">
					<?php 
						$query  = "SELECT COUNT(*) as total from Source";
						$result = mysqli_query($con, $query);
						$data 	= mysqli_fetch_assoc($result);
						?>
							<div>
								<?php echo $data['total']; ?>
								<span style="float: right; height: 30px; width: 30px;">
									<i class="fa fa-database"></i>
								</span>
							</div>
							<div style="margin-top: 10px;">Source</div>
						<?php
					?>
				</div>
			</div>
			<div class="row" style="margin-left: 20px; margin-right: 20px;">
				<div class="column">
					<?php 
						$query  = "SELECT COUNT(*) as total from Income";
						$result = mysqli_query($con, $query);
						$data 	= mysqli_fetch_assoc($result);
						?>
							<div>
								<?php echo $data['total']; ?>
								<span style="float: right; height: 30px; width: 30px;">
									<i class="fa fa-money"></i>
								</span>
							</div>
							<div style="margin-top: 10px;">Income</div>
						<?php
					?>
				</div>
				<div class="column category">
					<?php 
						$query  = "SELECT COUNT(*) as total from ProductServiceCategory";
						$result = mysqli_query($con, $query);
						$data 	= mysqli_fetch_assoc($result);
						?>
							<div>
								<?php echo $data['total']; ?>
								<span style="float: right; height: 30px; width: 30px;">
									<i class="fa fa-server"></i>
								</span>
							</div>
							<div style="margin-top: 10px;">Category</div>
						<?php
					?>
				</div>
				<div class="column product">
					<?php 
						$query  = "SELECT COUNT(*) as total from ProductService";
						$result = mysqli_query($con, $query);
						$data 	= mysqli_fetch_assoc($result);
						?>
							<div>
								<?php echo $data['total']; ?>
							<span style="float: right; height: 30px; width: 30px;">
								<i class="fa fa-product-hunt"></i>
							</span>
						</div>
						<div style="margin-top: 10px;">Products/Sevices</div>
					<?php
					?>
				</div>
			</div>


			<div class="table-title" style="">Expenses for this month</div>
			<div style="overflow-x:auto;">
				<table  style="margin-top:20px;">
					<?php 
						$_SESSION['total_expenses'] = 0;
						$this_month = date("m");
						$this_year  = date("Y");
						$user_id = $_SESSION['user_id'];
						$query   = "SELECT * FROM Expense WHERE YEAR(created_at) = '$this_year' AND MONTH(created_at) = '$this_month' ORDER BY created_at DESC";
						$results = mysqli_query($con, $query);
						if (mysqli_num_rows($results) > 0) {
							?>
								<tr style="height: 65px; font-size: 15px; color: #737373;">
									<th style="color: #737373;">User</th>
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
								// GET USER
								$user_id = $row['user_id'];
								$query   = "SELECT * FROM User WHERE user_id = '$user_id'";
								$result2 = mysqli_query($con, $query);
								if (mysqli_num_rows($result2) == 1) {
									$user_data = $result2->fetch_assoc();		
								}
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
										<td><?php echo $user_data['user_email'] ?></td>
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

		</div>





		<!-- The Modal -->
		<div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<p style="text-align: center; font-size: 15px; color:#737373">Add Expense</p>
				<form class="add-expense-validation" method="POST">
					<div>
						<?php include('../errors.php'); ?><br>
					</div>

					<div>
						<select id="user" name="user"  style="font-size: 14px; color: #737373;  padding: 10px;">
							<option value="">Select User</option>
							<?php 
								$query_users   = "SELECT * FROM User ORDER BY created_at DESC";
								$user_result = mysqli_query($con, $query_users);

								if (mysqli_num_rows($user_result) > 0) {
									while($row = mysqli_fetch_assoc($user_result)) {
										echo '<option value="' . $row['user_id'] . '">' . $row['user_email'] . '</option>';
									}
								} else {
									// echo "0 results";
								}
							?>
						</select>
					</div><br><br>

					<div>
						<select id="category" name="category"  style="font-size: 14px; color: #737373;  padding: 10px;">
							<option value="">Select Income</option>
							<?php 
								$query_users   = "SELECT * FROM Income WHERE remaining_amount > 1 ORDER BY created_at DESC";
								$user_result = mysqli_query($con, $query_users);

								if (mysqli_num_rows($user_result) > 0) {
									while($income_row = mysqli_fetch_assoc($user_result)) {
										// GET SOURCE NAME
										$source_id = $income_row['source_id'];
										$source_query   = "SELECT * FROM Source WHERE source_id = '$source_id' ORDER BY created_at DESC";
										$source_result = mysqli_query($con, $source_query);
										if (mysqli_num_rows($source_result) == 1) {
											$source_data = $source_result->fetch_assoc();		
										}
										echo '<option value="' . $income_row['income_id'] . '">' . $source_data['name'] . ' remain: '. $income_row['remaining_amount'] .', Added: ' . date('M Y',strtotime($source_data['created_at'])) . '</option>';
									}
								} else {
									// echo "0 results";
								}
							?>
						</select>
					</div><br><br>

					<div>
						<select id="product_or_service" name="product_or_service"  style="font-size: 14px; color: #737373; padding: 10px;">
							<option value="">Select Product/Service</option>
							<?php 
								$query   = "SELECT * FROM ProductService ORDER BY created_at DESC";
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
						<input  style="font-size: 14px; color: #737373; padding: 10px;" type="text" name="price" id="price" placeholder="Expense Price">
					</div><br><br>

					<div>
						<input class="button-primary" name="add-admin-expense" type="submit" value="Add Expense">
					</div>
				</form>  
				<div class="table-bottom-space"></div>
			</div>
		</div>



		

		<?php include_once("../footer.php"); ?>
		
        <!-- JAVASCRIPT -->
		 <script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous">
		</script>   
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<script src="../js/dashboard.js"></script>


		<style>
			.table-title {
				font-size:20px; color:#737373; margin-left: 30px; margin-top:25px;
			}
				.column {
					margin: 5px 6px;
					float: left;
					width: 32%;
					padding: 15px;
					background-color:#00C2FF; 
					color: white;
					text-align: center;
					margin-left: 10px;
				}
				.row:after {
					content: "";
					display: table;
					clear: both;
					width: 100%;
				}
				@media only screen and (min-width: 300px) {
					.table-title {
						font-size:20px; 
						color:#737373; 
						margin-left: 0px; 
						margin-top:25px;
					}
					.column {
						float: left;
						width: 46%;
						background-color:#00C2FF; 
						color: white;
						text-align: center;
					}
					.category {
						margin-top: -83px
					}
				}
				@media only screen and (min-width: 600px) {
					.profile-page {
						width: 90%;
						margin: auto;
					}
					.profile {
						margin-right: 12%;
					}
				}
				@media only screen and (min-width: 800px) {
					.profile-page {
						width: 80%;
						margin: auto;
					}
					.profile {
						margin-right: 15%;
					}
					
				}
				@media screen and (min-width: 1024px) {
					.table-title {
				font-size:20px; color:#737373; margin-left: 30px; margin-top:25px;
			}
					.column {
					margin: 5px 6px;
					float: left;
					width: 32%;
					padding: 15px;
					background-color:#00C2FF; 
					color: white;
					text-align: center;
					margin-left: 10px;
				}
				.row:after {
					content: "";
					display: table;
					clear: both;
					width: 100%;
				}
				}

</style>

	</body>
</html>