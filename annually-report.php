<?php 
	require_once('config/db_connection.php');
	require_once('config/add_save_money.php');
	
	if (!isset($_SESSION['user_id'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	
	$user_id = $_SESSION['user_id'];
	$query   = "SELECT * FROM User WHERE user_id = '$user_id'";
	$results = mysqli_query($con, $query);
	if (mysqli_num_rows($results) == 1) {
		$profile_data = $results->fetch_assoc();		
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
		<title>Annually Report || FEM</title>
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
				Annually Report
			</div>
			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-file"></i> 
					<a style="font-size: 15px;" type="button" id="btnExport">Export pdf</a>
				</div>
			</div>


    




			<div style="overflow-x:auto;" id="tblCustomers" cellspacing="0" cellpadding="0">
				<div class="report-title">
					<div style="font-size:18px; text-align:center;">Annually Report</div>
					<div>Full Name: <?php echo $profile_data['first_name']; ?>&nbsp;&nbsp; <?php echo $profile_data['last_name']; ?></div>
					<div>Email: <?php echo $profile_data['user_email']; ?></div>
					<div>Date: <?php echo  date("M"); ?>/<?php echo  date("d"); ?>/<?php echo  date("Y"); ?></div>
				</div>
				<table style="margin-top: 15px;">
					<?php
						$total_expenditure = 0;
						$this_year  = date("Y");
						$query1     = "SELECT * FROM Expense WHERE user_id = '$user_id' AND YEAR(created_at) = '$this_year' ORDER BY created_at DESC";
						$results 	= mysqli_query($con, $query1);
						if (mysqli_num_rows($results) > 0) {
							?>
								<tr style="height: 65px; font-size: 15px; color: #737373;">
									<th style="color: #737373;">Source</th>
									<th style="color: #737373;">Income</th>
									<th style="color: #737373;">Category</th>
									<th style="color: #737373;">Product/Service</th>
									<th style="color: #737373;">Price</th>
									<th style="color: #737373;">Date</th>
								</tr>
							<?php
							while($row = $results->fetch_assoc()) {
								$total_expenditure += $row['price'];
								// GET PRODUCT SERVICE NAME
								$product_service_id = $row['product_service_id'];
								$query2   = "SELECT * FROM ProductService WHERE product_service_id = '$product_service_id'";
								$result2 = mysqli_query($con, $query2);
								if (mysqli_num_rows($result2) == 1) {
									$product_service_data = $result2->fetch_assoc();		
								}

								// GET PRODUCT CATEGORY NAME
								$product_category_id = $product_service_data['product_service_category_id'];
								$query3   = "SELECT * FROM ProductServiceCategory WHERE category_id = '$product_category_id'";
								$result3 = mysqli_query($con, $query3);
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

								?>
									<tr>
										<td><?php echo $source_data['name'] ?></td>
										<td><?php echo number_format($income_data['amount'], 2) ?></td>
										<td><?php echo $product_category_data['name'] ?></td>
										<td><?php echo $product_service_data['name'] ?></td>
										<td><?php echo number_format($row['price'], 2) ?></td>
										<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
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

				<div class="table-bottom-space"></div>
			<?php 
			  	if (mysqli_num_rows($results) > 0) {
					?>
						<div class="table-total">
							<button class="button-error-total">Expenses: ksh <?php echo number_format($total_expenditure, 2); ?></button>
						</div>
					<?php
				} else {
					?>
						<div class="table-total">
							<button class="button-error-total">Expenses: ksh 0</button>
						</div>
					<?php
				}
			?>

			<?php
				$total_income = 0;
				$this_year  = date("Y");
				$total_income_query     = "SELECT * FROM Income WHERE user_id = '$user_id' AND YEAR(created_at) = '$this_year' ORDER BY created_at DESC";
				$total_income_result 	= mysqli_query($con, $total_income_query);
				if (mysqli_num_rows($total_income_result) > 0) {
					while($income_row = $total_income_result->fetch_assoc()) {
						$total_income += $income_row['amount'];
					}
					?>
						<div class="table-total">
							<button class="button-light-total">Income: ksh <?php echo number_format($total_income, 2); ?></button>
						</div>
					<?php
				} else {
					?>
						<div class="table-total">
							<button class="button-light-total">Income: ksh 0</button>
						</div>
					<?php
				}
			?>



			<?php
				$total_saving  = 0;
				$this_month    = date("m");
				$this_year     = date("Y");
				$saving_query  = "SELECT * FROM Saving WHERE user_id = '$user_id' AND YEAR(created_at) = '$this_year'";
				$saving_result = mysqli_query($con, $saving_query);
				if (mysqli_num_rows($saving_result) > 0) {
					while($saving_row = $saving_result->fetch_assoc()) {
						$total_saving += $saving_row['amount'];
					}
					?>
						<div class="table-total">
							<button class="button-primary-total">Save: Ksh <?php echo number_format($total_saving, 2); ?></button>
						</div>
					<?php
				} else {
					?>
						<div class="table-total">
							<button class="button-primary-total">Save: Ksh 0</button>
						</div>
					<?php
				}
			?>
			</div>
			  

			

			
			
			

			
              
		</div>


		<?php include_once("footer.php"); ?>
		
		
		
        <!-- JAVASCRIPT -->
		 <script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous">
		</script>   
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<script src="js/dashboard.js"></script>


		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
		<script type="text/javascript">
			$("body").on("click", "#btnExport", function () {
				html2canvas($('#tblCustomers')[0], {
					onrendered: function (canvas) {
						var data = canvas.toDataURL();
						var docDefinition = {
							content: [{
								image: data,
								width: 500
							}]
						};
						pdfMake.createPdf(docDefinition).download("Annually-Report.pdf");
					}
				});
			});
		</script>
	</body>
</html>