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
		<title>Product-Service || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		
		<?php include('header.php'); ?>

		<div class="main-content">
			<div class="title-left">
				Product/Service
			</div>

			<div class="title-right">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a href="product-service-add.php">Add Product</a>
				</div>
			</div>

			<div>
				<?php include('errors.php'); ?><br>
			</div>
			<div>
				<?php include('success.php'); ?><br>
			</div>
			
			



			<!-- <div class="table-top-space"></div> -->
			<table>
				<tr style="height: 65px; font-size: 18px;">
					<th>Category</th>
					<th>Product/Service</th>
					<th>Date</th>
					<th>Action</th>
				</tr>

				<!-- LOOPING USER DATA -->
				<?php 
					$user_id = $_SESSION['user_id'];
					$query   = "SELECT * FROM ProductService WHERE user_id = '$user_id' ORDER BY created_at DESC";
					$results = mysqli_query($con, $query);
					while($row = $results->fetch_assoc()) {
						echo "<tr>";
							// GET SOURCE NAME
							$category_id = $row['product_service_category_id'];
							$query   = "SELECT * FROM ProductServiceCategory WHERE category_id = '$category_id'";
							$result2 = mysqli_query($con, $query);
							if (mysqli_num_rows($result2) == 1) {
								$category_data = $result2->fetch_assoc();		
							}

							// DISPLAY DATA
							?>
								<td><?php echo $category_data['name'] ?></td>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
								<td>
									<form action="" method="POST" style="margin-left:-40px;">
										<input hidden name="product_service_id" value="<?php echo $row['product_service_id'] ?>"></input>
										<button name="delete-product-or-service">
											<i class="fa fa-trash-o icon-delete" id="delete" title="Delete"></i>
										</button>&nbsp;&nbsp;
									</form>
									<!-- <form action="" method="POST" style="margin-left:40px; margin-top:-21px">
										<input hidden name="expect" value=""></input>
										<button name="edit-expense">
										<i class="fa fa-pencil icon-edit" title="Edit"></i>
										</button>
									</form> -->
								</td>
							<?php
						echo "</tr>";
					}
				?>

				<!-- <tr>
					<td>Food</td>
					<td>Rice</td>
					<td>20-03-2020</td>
				  	<td>
						<i class="fa fa-trash-o icon-delete" title="Delete"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-pencil icon-edit" title="Edit"></i>
					</td>
				</tr> -->
				<!-- <tr>
					<td>Electricity</td>
					<td>Maintenance</td>
					<td>20-03-2020</td>
					<td>
						<i class="fa fa-trash-o icon-delete" title="Delete"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-pencil icon-edit" title="Edit"></i>
					</td>
				</tr>
				<tr>
					<td>Family member</td>
					<td>Pocket Money</td>
					<td>20-03-2020</td>
					<td>
						<i class="fa fa-trash-o icon-delete" title="Delete"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-pencil icon-edit" title="Edit"></i>
					</td>
				</tr> -->
				
			  </table>

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
        <script src="js/dashboard.js"></script>
	</body>
</html>