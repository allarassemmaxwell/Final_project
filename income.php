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
		<title>Income || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">
	</head>
	<body>

		<?php include('header.php'); ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
				Income
			</div>

			<div class="title-right" id="myBtn">
				<div class="add">
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
										<td><?php echo date('M Y',strtotime($row['created_at'])) ?></td>
										<td> 
											<!-- DELETE -->
											<form action="" method="POST" style="margin-left:-40px;">
												<input hidden name="income_id" value="<?php echo $row['income_id'] ?>"></input>
												<button name="delete-income" style="cursor: pointer">
													<img src="images/icons/delete.svg" style="width: 15px;">
												</button>&nbsp;&nbsp;&nbsp;
											</form>
											<!-- UPDATE -->
											<?php
												if(date('Y', strtotime($row['created_at'])) == date("Y") && date('m', strtotime($row['created_at'])) == date("m")) {
													?>
														<div style="margin-left:30px; margin-top:-25px">
															<button>
																<a href="income-update.php?id1=<?php echo $_SESSION['user_id'] ?>&id2=<?php echo $row['income_id'] ?>&id3=<?php echo $source_data['source_id']; ?>&amount=<?php echo $row['amount']; ?>">
																	<img src="images/icons/edit.svg" style="width: 15px;">
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
					<form name="incomeForm" method="POST" onsubmit="return incomeValidation()">
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
							<input  style="font-size: 14px; color: #737373; padding: 25px 10px; height: 15px;" type="text" name="amount" placeholder="Amount">
						</div><br><br>
						
						<div>
							<input class="button-primary" name="add-income" type="submit" value="Add Income">
						</div>
					</form>  
					<div class="table-bottom-space"></div>
				</div>
			</div>
		</div>

		
		
		<br><br><br><br>
		<?php include_once("footer.php"); ?>
		
		



        <!-- JAVASCRIPT -->
		<script src="js/modal.js"></script>
		<script src="js/validation.js"></script>

		
	</body>
</html>
