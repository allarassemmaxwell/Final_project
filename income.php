<?php 
	require_once('config/db_connection.php');
	require_once('config/add_save_money.php');
	
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
		<title>Income || FEM</title>
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
				Income
			</div>

			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a style="font-size: 15px;">Add Income</a>
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
						$total_amount = 0;
						$remaining    = 0;
						$user_id      = $_SESSION['user_id'];
						$query        = "SELECT * FROM Income WHERE user_id = '$user_id' ORDER BY created_at DESC";
						$results      = mysqli_query($con, $query);
						if (mysqli_num_rows($results) > 0) {
							?>
								<tr style="height: 65px; font-size: 15px;">
									<th style="color: #737373;">Source</th>
									<th style="color: #737373;">Amount</th>
									<th style="color: #737373;">Remaining</th>
									<th style="color: #737373;">Date</th>
									<th style="color: #737373;">Action</th>
								</tr>
							<?php
							while($row = $results->fetch_assoc()) {
								$total_amount += $row['amount'];
								$remaining    += $row['remaining_amount'];

								// GET SOURCE NAME
								$source_id = $row['source_id'];
								$query   = "SELECT * FROM Source WHERE source_id = '$source_id'";
								$result2 = mysqli_query($con, $query);
								if (mysqli_num_rows($result2) == 1) {
									$source_data = $result2->fetch_assoc();		
								}

								// DISPLAY DATA
								?>
									<tr>
										<td><?php echo $source_data['name']; ?></td>
										<td><?php echo number_format($row['amount'], 2); ?></td>
										<td style="color:#a94442;"><?php echo number_format($row['remaining_amount'], 2); ?></td>
										<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
										<td> 
											<!-- DELETE -->
											<form action="" method="POST" style="margin-left:-40px;">
												<input hidden name="income_id" value="<?php echo $row['income_id'] ?>"></input>
												<button name="delete-income">
													<i class="fa fa-trash-o icon-delete" id="delete" title="Delete"></i>
												</button>&nbsp;&nbsp;&nbsp;
											</form>
											<!-- UPDATE -->
											<?php
												if(date('Y', strtotime($row['created_at'])) == date("Y") && date('m', strtotime($row['created_at'])) == date("m")) {
													?>
														<div style="margin-left:30px; margin-top:-20px">
															<button>
																<a href="income-update.php?id1=<?php echo $_SESSION['user_id'] ?>&id2=<?php echo $row['income_id'] ?>&id3=<?php echo $source_data['source_id']; ?>&amount=<?php echo $row['amount']; ?>">
																	<i class="fa fa-pencil icon-edit" title="Edit"></i>
																</a>
															</button>
														</div>
													<?php
												}
											?>
												
										</td>
									</tr>
								<?php
							}
						}else {
							?>
								<div style="font-size: 15px; color: #737373; margin-top: 50px; text-align: center;">No data</div>
							<?php
						}
					?>
				</table>
			</div>
			<!-- <div class="table-bottom-space"></div> -->

			<?php 
			  	if (mysqli_num_rows($results) > 0) {
					  ?>
						<div class='table-bottom-space'></div>
						<div class='table-total'>
							<button class='button-error-total'>Remaining: Ksh <?php echo number_format($remaining, 2); ?></button>
						</div>
					<?php
				}
			?>
			<?php 
				if (mysqli_num_rows($results) > 0) {
					?>
						<div class="table-total">
							<button class="button-primary-total">Income: Ksh <?php echo number_format($total_amount, 2); ?></button>
						</div>
					<?php
				}
			?>





			<!-- The Modal -->
			<div id="myModal" class="modal">
				<div class="modal-content">
					<span class="close">&times;</span>
					<p style="text-align: center; font-size: 15px; color: #737373">Income to be expent</p>
					<form class="add-income-form" method="POST">
						<div>
							<?php include('errors.php'); ?><br>
						</div>
						
						<div>
							<select id="source" name="source"  style="font-size: 14px; color: #737373; padding-left: 5px; padding-right: 5px;">
								<option value="">Select Source</option>
								<?php 
									$user_id = $_SESSION['user_id'];
									$query   = "SELECT * FROM Source WHERE user_id = '$user_id' ORDER BY created_at DESC";
									$results = mysqli_query($con, $query);

									if (mysqli_num_rows($results) > 0) {
										while($row = mysqli_fetch_assoc($results)) {
											echo '<option value="' . $row['source_id'] . '">' . $row['name'] . '</option>';
										}
									}
								?>
							</select>
						</div><br><br>

						<div>
							<input  style="font-size: 14px; color: #737373; padding-left: 10px; padding-right: 10px;" type="text" name="amount" placeholder="Amount">
						</div><br><br>
						
						<div>
							<input class="button-primary" name="add-income" type="submit" value="Add Income">
						</div>
					</form>  
					<div class="table-bottom-space"></div>
				</div>
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