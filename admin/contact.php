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
		<title>Contact || FEM</title>
		<link rel="stylesheet" href="../css/dashboard.css">
	</head>
	<body>


		<?php include('header.php'); ?>



		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
                Contact
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
						$query   = "SELECT * FROM Contact ORDER BY created_at DESC";
						$results = mysqli_query($con, $query);
						if (mysqli_num_rows($results) > 0) {
							?>
								<tr style="height: 65px; font-size: 15px;">
									<th style="color: #737373;">Email</th>
									<th style="color: #737373;">Subject</th>
									<th style="color: #737373;">Date</th>
									<th style="color: #737373;">Action</th>
								</tr>
							<?php
							while($row = $results->fetch_assoc()) {
								?>
									<tr>
										<td><?php echo $row['email'] ?></td>
										<td><?php echo $row['subject'] ?></td>
										<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
										<td> 
											<!-- DELETE -->
											<form action="" method="POST" style="margin-left:-40px;">
												<input hidden name="contact_id" value="<?php echo $row['contact_id'] ?>"></input>
												<button name="delete-admin-contact">
													<img src="../images/icons/delete.svg" style="width: 15px;">
												</button>&nbsp;&nbsp;&nbsp;
											</form>
											<!-- UPDATE -->
											<div style="margin-left:30px; margin-top:-25px">
												<button>
													<a href="contact-update.php?id1=<?php echo $row['contact_id'] ?>&id2=<?php echo $row['first_name'] ?>&id3=<?php echo $row['last_name'] ?>&id4=<?php echo $row['email'] ?>&id5=<?php echo $row['subject'] ?>&id6=<?php echo $row['message'] ?>">
														<img src="../images/icons/edit.svg" style="width: 15px;">
													</a>
												</button>
											</div>
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
			  
			<div class="table-bottom-space"></div>  
		</div>




		<br><br><br>
		<?php include_once("../footer.php"); ?>


	</body>
</html>