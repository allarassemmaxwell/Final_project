<?php 
	require_once('../config/db_connection.php');

	if (!isset($_SESSION['is_admin'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

	$user_id = $_SESSION['user_id'];
	$query   = "SELECT * FROM User WHERE user_id = '$user_id'";
	$results = mysqli_query($con, $query);
	if (mysqli_num_rows($results) == 1) {
		$profile_data = $results->fetch_assoc();		
	}

	$jsonArray = array();
	$this_year   = date("Y");
	$this_month  = date("m");
	$this_day    = date("d");
	if (isset($_POST['filterByDate'])) {
		$projected_date = mysqli_real_escape_string($con, $_POST['projected_date']);
		$this_year = date("Y",strtotime($projected_date));
		$this_month = date("m",strtotime($projected_date));
		$this_day = date("d",strtotime($projected_date));
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
		<title>Daily Report || FEM</title>
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
				Daily Report
			</div>
			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-file"></i> 
					<a style="font-size: 15px;" type="button" id="btnExport">Export pdf</a>
				</div>
			</div>

            
            
            <!-- <div class="table-top-space"></div> -->



			<!-- <div class="table-top-space"></div> -->
			<div style="overflow-x:auto;" id="tblCustomers" cellspacing="0" cellpadding="0">
				<div class="report-title">
				<div class="report-filter" style="font-size:18px; text-align:center;">Daily Report</div>
					<form class="filter-by-form" action="" method="POST">
						<div class="filter">
							<input style="font-size: 14px; color: #737373;padding-left: 10px; padding-right: 10px;" value="<?php echo $projected_date; ?>" type="date" name="projected_date" id="projected_date">
							<input type="submit" name="filterByDate" style="color: #00C2FF;" value="Filter">
						</div>
					</form>
					<div>Admin Name: <?php echo $profile_data['first_name']; ?> &nbsp;&nbsp; <?php echo $profile_data['last_name']; ?></div>
					<div>Admin Email: <?php echo $profile_data['user_email']; ?></div>
					<div>Date: <?php echo  date("M"); ?>/<?php echo  date("d"); ?>/<?php echo  date("Y"); ?></div>
				</div>

				<div id="chartContainer" style="height: 350px; width: 95%; margin-left: auto; margin-right: auto;"></div>

				<table style="margin-top: 15px;">
					<?php
						$total_price = 0;
						$query1      = "SELECT * FROM Expense WHERE YEAR(created_at) = '$this_year' AND MONTH(created_at) = '$this_month' AND DAY(created_at)='$this_day' ORDER BY created_at DESC";
						$results     = mysqli_query($con, $query1);
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
								</tr>
							<?php
							while($row = $results->fetch_assoc()) {
								$total_price += $row['price'];
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

								$jsonArrayItem = array();
								$jsonArrayItem['label'] = $product_category_data['name'];
								$jsonArrayItem['y'] = $row['price'];
								array_push($jsonArray, $jsonArrayItem);
								
								?>
									<tr>
										<td><?php echo $user_data['user_email'] ?></td>
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
				<!-- <?php 
					if (mysqli_num_rows($results) > 0) {
						?>
							<div class="table-bottom-space"></div>
							<div class="table-total">
								<button class="button-error-total">Total Expenses: Ksh <?php echo number_format($total_price, 2); ?></button>
							</div>
						<?php
					}
				?> -->


				<?php 
					$remaining = 0;
					$income    = 0;
					$remaining_query  = "SELECT * FROM Income WHERE YEAR(created_at) = '$this_year' AND MONTH(created_at) = '$this_month' AND DAY(created_at)='$this_day' ORDER BY created_at DESC";
					$remaining_result = mysqli_query($con, $remaining_query);
					if (mysqli_num_rows($remaining_result) > 0) {
						while($row = $remaining_result->fetch_assoc()) {
							$remaining    += $row['remaining_amount'];
							$income    += $row['amount'];
						}
					}
					if (mysqli_num_rows($remaining_result) > 0) {
						?>
							<div class="table-bottom-space"></div>
							<div class="table-total">
								<button class="button-error-total">Remaining: Ksh <?php echo number_format($remaining, 2); ?></button>
							</div>

							<div class="table-total">
								<button class="button-light-total">Expenses: ksh <?php echo number_format($total_price, 2); ?></button>
							</div>

							<div class="table-total">
								<button class="button-primary-total">Income: Ksh <?php echo number_format($income, 2); ?></button>
							</div>

						<?php
					}
				?>

			</div>
			
		</div>






		<br><br><br><br><br>
		<?php include_once("../footer.php"); ?>
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
		<script src="../js/dashboard.js"></script>


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
						pdfMake.createPdf(docDefinition).download("Admin-Daily-Report.pdf");
					}
				});
			});
		</script>




		<!-- CHART -->
		<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
		<script type="text/javascript">
			window.onload = function() {

				var dataPoints = <?php echo json_encode($jsonArray, JSON_NUMERIC_CHECK); ?>;
				console.log("=====JAVASCRIPT======");
				console.log(dataPoints);
				var labelArr = [];
				var totalArr = [];
				for (let index = 0; index < dataPoints.length; index++) {
					const element = dataPoints[index].label;
					if(labelArr.includes(element)) {
						// DO NOTHING
					} else {
						labelArr.push(element);
					}
				}


				for (let index = 0; index < labelArr.length; index++) {
					var price = [];
					const element = labelArr[index];

					console.log("=====ELEMENT======");
					console.log(element);
					for (let i = 0; i < dataPoints.length; i++) {
						const p = dataPoints[i];
						if(p.label === element) {
							price.push(p.y);
							console.log("===== P.Y ======");
							console.log(p.y);
						}
						
					}
					console.log("===== PRICE HERE ======");
					console.log(price);

					var total = price.reduce((a, b) => {
						return a+b;
					})
					console.log("===== TOTAL ======");
					console.log(total);
					totalArr.push({label:element, y:total});

				}

				console.log("===== TOTAL ARR ======");
				console.log(totalArr);

				var options = {
					title: {
						text: "Statistics"
					},
					data: [{
						type: "pie",
						startAngle: 45,
						showInLegend: "true",
						legendText: "{label}",
						indexLabel: "{label} ({y})",
						yValueFormatString:"#,##0.#"%"",
						dataPoints: totalArr
					}]
				};
				$("#chartContainer").CanvasJSChart(options);
			}
		</script>
	</body>
</html>