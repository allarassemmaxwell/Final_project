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
		<title>Expense || FEM</title>
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
				Expense
			</div>

			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a style="font-size: 15px;">Add Expense</a>
				</div>
			</div>
			
			



			<!-- <div class="table-top-space"></div> -->
            <div>
				<?php include('../errors.php'); ?><br>
			</div>
			<div>
				<?php include('../success.php'); ?><br>
            </div>
			<table style="color: #737373; font-size: 14px;">
				<tr style="height: 65px; font-size: 15px;">
					<th style="color: #737373;">User</th>
					<th style="color: #737373;">Category</th>
					<th style="color: #737373;">Product/Service</th>
					<th style="color: #737373;">Price</th>
					<th style="color: #737373;">Date</th>
					<th style="color: #737373;">Action</th>
				</tr>
				<?php 
					$total_price = 0;
                    $query   = "SELECT * FROM Expense ORDER BY created_at DESC";
                    $results = mysqli_query($con, $query);
                    if (mysqli_num_rows($results) > 0) {
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
							$user_id = $row['user_id'];
							$query   = "SELECT * FROM ProductService WHERE product_service_id = '$product_service_id'";
							$result3 = mysqli_query($con, $query);
							if (mysqli_num_rows($result3) == 1) {
								$product_service_data = $result3->fetch_assoc();		
							}
							// GET PRODUCT CATEGORY NAME
							$product_category_id = $product_service_data['product_service_category_id'];
							$query   = "SELECT * FROM ProductServiceCategory WHERE category_id = '$product_category_id'";
							$result4 = mysqli_query($con, $query);
							if (mysqli_num_rows($result4) == 1) {
								$product_category_data = $result4->fetch_assoc();		
							}
                            ?>
								<tr>
									<td><?php echo $user_data['user_email'] ?></td>
									<td><?php echo $product_category_data['name'] ?></td>
									<td><?php echo $product_service_data['name'] ?></td>
									<td><?php echo $row['price'] ?></td>
									<td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
									<td> 
										<!-- DELETE -->
										<form action="" method="POST" style="margin-left:-40px;">
											<input hidden name="user_id" value="<?php echo $row['user_id'] ?>"></input>
											<button name="delete-expense">
												<i class="fa fa-trash-o icon-delete" id="delete" title="Delete"></i>
											</button>&nbsp;&nbsp;&nbsp;
										</form>
										<!-- UPDATE -->
										<div style="margin-left:30px; margin-top:-20px">
											<button>
												<a href="expense-update.php?id1=<?php echo $_SESSION['user_id'] ?>&id2=<?php echo $row['expense_id'] ?>&id3=<?php echo $product_service_data['product_service_id'] ?>&price=<?php echo $row['price'] ?>">
													<i class="fa fa-pencil icon-edit" title="Edit"></i>
												</a>
											</button>
										</div>
									</td>
								</tr>
							<?php
						}
					}
				?>				
			  </table>


			  <?php 
			  	if (mysqli_num_rows($results) > 0) {
					?>
						<div class='table-bottom-space'></div>
						<div class='table-total'>
							<button class='button-error-total'>Ksh: <?php echo number_format($total_price, 2); ?></button>
						</div>
					<?php
				}
			?>
			  
		</div>



		<!-- The Modal -->
		<div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<p style="text-align: center; font-size: 15px; color:#737373">Add Expense</p>
				<form class="add-expense-validation" method="POST">
					<div>
						<?php include('../errors.php'); ?><br>
					</div>

					<div>
						<select id="user" name="user"  style="font-size: 14px; color: #737373;  padding: 10px;">
							<option value="">Select User</option>
							<?php 
								$query_users   = "SELECT * FROM User ORDER BY created_at DESC";
								$user_result = mysqli_query($con, $query_users);

								if (mysqli_num_rows($user_result) > 0) {
									while($row = mysqli_fetch_assoc($user_result)) {
										echo '<option value="' . $row['user_id'] . '">' . $row['user_email'] . '</option>';
									}
								} else {
									// echo "0 results";
								}
							?>
						</select>
					</div><br><br>

					<div>
						<select id="category" name="category"  style="font-size: 14px; color: #737373; padding: 10px;">
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
						<input  style="font-size: 14px; color: #737373; padding: 10px;" type="text" name="price" id="price" placeholder="Expense Price">
					</div><br><br>

					<div>
						<input class="button-primary" name="add-expense" type="submit" value="Create Expense">
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
		<script src="js/validation.js"></script>
	</body>
</html>