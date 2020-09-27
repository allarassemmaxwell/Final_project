<?php 
	require_once('config/db_connection.php');

	if (!isset($_SESSION['user_email'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	$user_id = $_SESSION['user_id'];
	$query   = "SELECT * FROM User WHERE user_id = '$user_id'";
	$results = mysqli_query($con, $query);
	if (mysqli_num_rows($results) == 1) {
		$profile_data = $results->fetch_assoc();		
	}

	$the_year   = date("Y");
	$the_month  = date("m");
	if (isset($_POST['filterByDate'])) {
		$projected_date = mysqli_real_escape_string($con, $_POST['projected_date']);
		$the_year = date("Y",strtotime($projected_date));
		$the_month = date("m",strtotime($projected_date));
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
		<title>Projected Expense || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

		<!-- Web Fonts  -->
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        
        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

		<?php include('header.php'); ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
				Projected Expense
			</div>

			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a style="font-size: 15px;">Add Projected</a>
				</div>
			</div>
			
			


			<div>
				<?php include('errors.php'); ?><br>
			</div>
			<div>
				<?php include('success.php'); ?><br>
			</div>

			

			<div style="overflow-x:auto;">
				<div class="report-title" style="margin-bottom: 10px;">
					<div class="report-filter" style="font-size:18px; text-align:center;">Projected Expense</div>
					<form class="filter-by-form" action="" method="POST">
						<div class="filter">
							<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" value="<?php echo $projected_date; ?>" type="month" name="projected_date" id="projected_date">
							<input type="submit" name="filterByDate" style="color: #00C2FF;" value="Filter">
						</div>
					</form>
					<div>Full Name: <?php echo $profile_data['first_name']; ?>&nbsp;&nbsp; <?php echo $profile_data['last_name']; ?></div>
					<div>Email: <?php echo $profile_data['user_email']; ?></div>
					<div>Date: <?php echo  date("M"); ?>/<?php echo  date("d"); ?>/<?php echo  date("Y"); ?></div>
				</div>
				<table>
					<?php 
						$user_id = $_SESSION['user_id'];
						$query   = "SELECT * FROM ProjectedExpense WHERE user_id = '$user_id' AND YEAR(projected_date) = '$the_year' AND MONTH(projected_date) = '$the_month' ORDER BY created_at DESC";
						$results = mysqli_query($con, $query);
						if (mysqli_num_rows($results) > 0) {
							?>
								<tr style="height: 65px; font-size: 15px; color: #737373;">
									<th style="color: #737373;">Category</th>
									<th style="color: #737373;">Product/Service</th>
                                    <th style="color: #737373;">Projected Amount</th>
                                    <th style="color: #737373;">Amount spent</th>
                                    <th style="color: #737373;">Projected Date</th>
									<th style="color: #737373;">Date</th>
									<th style="color: #737373;">Action</th>
								</tr>
							<?php
							while($row = $results->fetch_assoc()) {
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

								// GET EXPENSE AMOUNT IN THE MONTH 
								$total_expense = 0;
								$this_year   = date("Y",strtotime($row['projected_date']));
								$this_month  = date("m",strtotime($row['projected_date']));
								$expense_query   = "SELECT * FROM Expense WHERE product_service_id = '$product_service_id' AND YEAR(created_at) = '$this_year' AND MONTH(created_at) = '$this_month' ORDER BY created_at DESC";
								$expense_result = mysqli_query($con, $expense_query);
								while($expense = $expense_result->fetch_assoc()) {
									$total_expense += $expense['price'];
								}

								// DISPLAY DATA
								?>
									<tr>
										<td><?php echo $product_category_data['name'] ?></td>
										<td><?php echo $product_service_data['name'] ?></td>
										<td><?php echo number_format($row['projected_amount'], 2) ?></td>
										<td style="color:#a94442;"><?php echo number_format($total_expense, 2) ?></td>
										<td><?php echo date('M Y',strtotime($row['projected_date'])) ?></td>
										<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
										<td> 
											<!-- DELETE -->
											<form action="" method="POST" style="margin-left:-40px;">
												<input hidden name="projected_id" value="<?php echo $row['projected_id'] ?>"></input>
												<button name="delete-projected-expense">
													<i class="fa fa-trash-o icon-delete" id="delete" title="Delete"></i>
												</button>&nbsp;&nbsp;&nbsp;
											</form>
											<!-- UPDATE -->
											<div style="margin-left:30px; margin-top:-20px">
												<button>
													<a href="projected-expense-update.php?id1=<?php echo $_SESSION['user_id'] ?>&id2=<?php echo $row['projected_id'] ?>&id3=<?php echo $row['projected_date'] ?>&id4=<?php echo $product_service_data['product_service_id'] ?>&amount=<?php echo $row['projected_amount'] ?>">
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
			

			





			<!-- The Modal -->
			<div id="myModal" class="modal">
				<div class="modal-content">
					<span class="close">&times;</span>
					<p style="text-align: center; font-size: 15px; color: #737373">Add Projected Expense</p>
					<form class="add-projected-expense-form" method="POST">
						<div>
							<?php include('errors.php'); ?><br>
						</div>

                        <div>
							<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" type="month" name="projected_date" id="projected_date">
                        </div><br><br>

						<div>
							<select id="product_service_id" name="product_service_id" style="font-size: 14px; color: #737373;padding-left: 5px; padding-right: 5px;">
								<option value="">Select Product/Service</option>
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
							<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" type="text" name="projected_amount" id="projected_amount" placeholder="Projected Amount">
						</div><br><br>

						<div>
							<input class="button-primary" name="add-projected-expense" type="submit" value="Add Projected Expense">
						</div>
					</form>  
					<div class="table-bottom-space"></div>
				</div>
			</div>
		</div>



		<br><br><br>
		<?php include_once("footer.php"); ?>
		
		<button id="goUpBtn" title="Go to top">
			<i class="fa fa-arrow-up" aria-hidden="true"></i>
		</button>
		
        <!-- JAVASCRIPT -->
		 <script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous">
		</script>   
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<script src="js/dashboard.js"></script>

		<script>
			var modal  = document.getElementById("myModal");

			var btn = document.getElementById("myBtn");
			var span = document.getElementsByClassName("close")[1];
			span.onclick = function() {
				modal.style.display = "none";
			}
		</script>
	</body>
</html>


