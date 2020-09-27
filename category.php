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
		<title>Category || FEM</title>
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
				Category
			</div>

			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a style="font-size: 15px;">Add Category</a>
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
						$user_id = $_SESSION['user_id'];
						$query   = "SELECT * FROM ProductServiceCategory WHERE user_id = '$user_id'  ORDER BY created_at DESC";
						$results = mysqli_query($con, $query);
						if ($results->num_rows > 0) {
							?>
								<tr style="height: 65px; font-size: 15px;">
									<th style="color: #737373;">Name</th>
									<th style="color: #737373;">Date</th>
									<th style="color: #737373;">Action</th>
								</tr>
							<?php
							while($row = $results->fetch_assoc()) {
								?>
									<tr>
										<td><?php echo $row['name'] ?></td>
										<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
										<td> 
											<!-- DELETE -->
											<form action="" method="POST" style="margin-left:-40px;">
												<input hidden name="category_id" value="<?php echo $row['category_id'] ?>"></input>
												<button name="delete-category">
													<i class="fa fa-trash-o icon-delete" id="delete" title="Delete"></i>
												</button>&nbsp;&nbsp;&nbsp;
											</form>
											<!-- UPDATE -->
											<div style="margin-left:30px; margin-top:-20px">
												<button>
													<a href="category-update.php?id1=<?php echo $_SESSION['user_id'] ?>&id2=<?php echo $row['category_id']; ?>&name=<?php echo $row['name'] ?>">
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
			<div class="table-bottom-space"></div>



			<!-- The Modal -->
			<div id="myModal" class="modal">
				<div class="modal-content">
					<span class="close">&times;</span>
					<p style="text-align: center; font-size:15px; color: #737373;">Product or Service Category</p>
					<form class="add-category-form" method="POST">
						<div>
							<?php include('errors.php'); ?><br>
						</div>
						<div>
							<input  style="font-size: 14px; color: #737373; padding-left: 10px; padding-right: 10px;" type="text" name="name" placeholder="Name">
						</div><br><br>

						<div>
							<input class="button-primary" name="add-category" type="submit" value="Add Category">
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
	</body>
</html>