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
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Source || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

		<?php include('header.php'); ?>

		<div class="main-content">
			<div class="title-left">
				Source
			</div>

			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a>Add Source</a>
				</div>
			</div>
			

			
			<!-- <div class="table-top-space"></div> -->

			<div>
				<?php include('errors.php'); ?><br>
			</div>
			<div>
				<?php include('success.php'); ?><br>
			</div>
			<table>
				<tr style="height: 65px; font-size: 18px;">
					<th>Name</th>
					<th>Date</th>
					<th>Action</th>
				</tr>

				<!-- LOOPING USER DATA -->
				<?php 
					$user_id = $_SESSION['user_id'];
					$query   = "SELECT * FROM Source WHERE user_id='$user_id' ORDER BY created_at DESC";
					$results = mysqli_query($con, $query);
					while($row = $results->fetch_assoc()) {
						echo "<tr>";
							?>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
								<td> 
									<!-- DELETE -->
									<form action="" method="POST" style="margin-left:-40px;">
										<input hidden name="source_id" value="<?php echo $row['source_id'] ?>"></input>
										<button name="delete-source">
											<i class="fa fa-trash-o icon-delete" id="delete" title="Delete"></i>
										</button>&nbsp;&nbsp;&nbsp;
									</form>
									<!-- UPDATE -->
									<div style="margin-left:30px; margin-top:-20px">
										<button>
											<a href="source-update.php?id1=<?php echo $_SESSION['user_id'] ?>&id2=<?php echo $row['source_id'] ?>&id3=<?php echo $row['name'];?>">
												<i class="fa fa-pencil icon-edit" title="Edit"></i>
											</a>
										</button>
									</div>
								</td>
							<?php 
						echo "</tr>";
					}
				?>
			</table>

			<!-- The Modal -->
			<div id="myModal" class="modal">
					<div class="modal-content">
						<span class="close">&times;</span>
						<p style="text-align: center; font-size:17px;">Add Source</p>
						<form class="add-source-form" method="POST">
							<div>
								<?php include('errors.php'); ?><br>
							</div>

							<div>
								<input type="text" name="name" id="name" placeholder="Name">
							</div><br><br>
							
							<div>
								<input class="button-primary" name="add-source" type="submit" value="Add Source">
							</div>
						</form>  
						<div class="table-bottom-space"></div>
					</div>
				</div>
			

			<div class="table-bottom-space"></div>
			  <!-- <div class="table-total">
				<button class="button-error-total">Total: ksh 5.500</button>
			  </div> -->
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