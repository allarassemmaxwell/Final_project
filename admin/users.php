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
		<title>User || FEM</title>
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
				Users
			</div>

			<div class="title-right" id="myBtn">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a style="font-size: 15px;">Add Users</a>
				</div>
			</div>
			
			



            <!-- <div class="table-top-space"></div> -->
            <div>
				<?php include('../errors.php'); ?><br>
			</div>
			<div>
				<?php include('../success.php'); ?><br>
            </div>
            

			<table style="font-size: 14px;">
				<tr style="height: 65px; font-size: 18px;">
					<th style="color: #737373;">Email</th>
					<th style="color: #737373;">First Name</th>
					<th style="color: #737373;">Last Name</th>
					<th style="color: #737373;">Members</th>
					<th style="color: #737373;">Date</th>
					<th style="color: #737373;">Action</th>
                </tr>
                
                <?php 
                    $query   = "SELECT * FROM User ORDER BY created_at DESC";
                    $results = mysqli_query($con, $query);
                    if (mysqli_num_rows($results) > 0) {
                        while($row = $results->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['user_email'] ?></td>
                                    <td><?php echo $row['first_name'] ?></td>
                                    <td><?php echo $row['last_name'] ?></td>
                                    <td><?php echo $row['family_number'] ?></td>
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

			  
			<div class="table-bottom-space"></div>

			  
		</div>



		<!-- The Modal -->
		<div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<p style="text-align: center; font-size: 15px; color:#737373">Add User</p>
				<form class="add-expense-form" method="POST">
					<div>
						<?php include('../errors.php'); ?><br>
                    </div>
                    
                    <div>
						<input  style="font-size: 14px; color: #737373;" type="text" name="price" id="price" placeholder="First name">
                    </div><br><br>
                    
                    <div>
						<input  style="font-size: 14px; color: #737373;" type="text" name="price" id="price" placeholder="Last name">
                    </div><br><br>
                    
                    <div>
						<input  style="font-size: 14px; color: #737373;" type="text" name="price" id="price" placeholder="Email">
                    </div><br><br>
                    
                    <div>
						<input  style="font-size: 14px; color: #737373;" type="text" name="price" id="price" placeholder="Family member">
                    </div><br><br>

					<div>
						<select id="product_or_service" name="product_or_service"  style="font-size: 14px; color: #737373;">
							<option value="">Role</option>
							<option value="">1</option>
							<option value="">2</option>
							<option value="">3</option>
							<option value="">4</option>
						</select>
					</div><br><br>


					<div>
						<input class="button-primary" name="add-expense" type="submit" value="Create">
					</div>
				</form>  
				<div class="table-bottom-space"></div>
			</div>
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
						<select id="product_or_service" name="product_or_service"  style="font-size: 14px; color: #737373;">
							<option value="">Select Product/Service</option>
							<option value="">1</option>
							<option value="">2</option>
							<option value="">3</option>
							<option value="">4</option>
						</select>
					</div><br><br>

					<div>
						<input  style="font-size: 14px; color: #737373;" type="text" name="price" id="price" placeholder="Price">
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