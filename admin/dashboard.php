<?php 
	require_once('../config/db_connection.php');

	if (!isset($_SESSION['is_admin'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
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

			<div class="row">
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
				<div class="column">
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
				<div class="column">
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


			<style>
				.column {
					margin: 0px 4px;
					float: left;
					width: 16%;
					padding: 15px;
					background-color:#00C2FF; 
					color: white;
					text-align: center;
				}
				.row:after {
					content: "";
					display: table;
					clear: both;
					margin: auto;
					width: 100%;
				}
			</style>
		</div>





		<!-- The Modal -->
		<div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<p style="text-align: center; font-size: 15px; color:#737373">Add Expense</p>
				<form class="add-expense-form" method="POST">
					<div>
						<?php include('../errors.php'); ?><br>
					</div>

					<div>
						<select id="product_or_service" name="product_or_service"  style="font-size: 14px; color: #737373; padding: 10px;">
							<option value="">Select User</option>
							<option value="">1</option>
							<option value="">2</option>
							<option value="">3</option>
							<option value="">4</option>
						</select>
					</div><br><br>

					<div>
						<select id="product_or_service" name="product_or_service"  style="font-size: 14px; color: #737373; padding: 10px;">
							<option value="">Select Category</option>
							<option value="">1</option>
							<option value="">2</option>
							<option value="">3</option>
							<option value="">4</option>
						</select>
					</div><br><br>

					<div>
						<select id="product_or_service" name="product_or_service"  style="font-size: 14px; color: #737373; padding: 10px;">
							<option value="">Select Product/Service</option>
							<option value="">1</option>
							<option value="">2</option>
							<option value="">3</option>
							<option value="">4</option>
						</select>
					</div><br><br>

					<div>
						<input  style="font-size: 14px; color: #737373; padding: 10px;" type="text" name="price" id="price" placeholder="Price">
					</div><br><br>

					<div>
						<input class="button-primary" name="add-expense" type="submit" value="Create">
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
	</body>
</html>