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

		<!-- Web Fonts  -->
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>	
			
        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>


		<?php include('header.php'); ?>



		<div class="main-content">
			<div class="title-left" style="font-size: 15px; color: #737373;">
                Contact
			</div>

			<!-- <div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a style="font-size: 15px;">Add Users</a>
				</div>
			</div> -->
			
			



            <!-- <div class="table-top-space"></div> -->
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
													<i class="fa fa-trash-o icon-delete" id="delete" title="Delete"></i>
												</button>&nbsp;&nbsp;&nbsp;
											</form>
											<!-- UPDATE -->
											<div style="margin-left:30px; margin-top:-20px">
												<button>
													<a href="contact-update.php?id1=<?php echo $row['contact_id'] ?>&id2=<?php echo $row['first_name'] ?>&id3=<?php echo $row['last_name'] ?>&id4=<?php echo $row['email'] ?>&id5=<?php echo $row['subject'] ?>&id6=<?php echo $row['message'] ?>">
														<i class="fa fa-eye icon-edit" title="Edit"></i>
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
		<script src="js/validation.js"></script>
		<script src="../js/dashboard.js"></script>
	</body>
</html>