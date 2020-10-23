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
		<title>Help || FEM</title>
		<link rel="stylesheet" href="../css/dashboard.css">
	</head>
	<body>

		<?php include('header.php'); ?>

		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
            Help
			</div>


			<div>
				<?php include('../errors.php'); ?><br>
			</div>
			<div>
				<?php include('../success.php'); ?><br>
			</div>




			

			<div style="overflow-x:auto;">
				<table style="color: #737373; font-size: 14px;">
				
					<?php 
						$query   = "SELECT * FROM Help ORDER BY created_at DESC";
						$results = mysqli_query($con, $query);
						if (mysqli_num_rows($results) > 0) {
							?>
								<tr style="height: 65px; font-size: 15px;">
									<th style="color: #737373;">User</th>
									<th style="color: #737373;">Date</th>
									<th style="color: #737373;">Action</th>
								</tr>
							<?php
							while($row = $results->fetch_assoc()) {
								// GET USER
								$user_id = $row['user_id'];
								$query   = "SELECT * FROM User WHERE user_id = '$user_id'";
								$result2 = mysqli_query($con, $query);
								if (mysqli_num_rows($result2) == 1) {
									$user_data = $result2->fetch_assoc();		
								}
								?>
									<tr>
										<td><?php echo $user_data['user_email'] ?></td>
										<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
										<td> 
											<!-- DELETE -->
											<form action="" method="POST" style="margin-left:-40px;">
												<input hidden name="help_id" value="<?php echo $row['help_id'] ?>"></input>
												<button name="delete-admin-help">
													<img src="../images/icons/delete.svg" style="width: 15px;">
												</button>&nbsp;&nbsp;&nbsp;
											</form>
											<!-- UPDATE -->
											<div style="margin-left:30px; margin-top:-25px">
											<button>
												<a href="help-response.php?id1=<?php echo $row['user_id'] ?>&id2=<?php echo $user_data['user_email'] ?>&id3=<?php echo $row['message'];?>">
													<img src="../images/icons/eye.svg" style="width: 20px; padding-top:2px;">
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

				<div class="table-bottom-space"></div>
			</div>



		<br><br><br><br><br>
		<?php include_once("../footer.php"); ?>




	</body>
</html>