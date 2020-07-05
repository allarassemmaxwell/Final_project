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
		<title>Category || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

		<?php include('header.php'); ?>

		<div class="main-content">
			<div class="title-left">
				Category
			</div>

			<div class="title-right">
				<div class="add">
					<i class="fa fa-plus"></i> 
					<a href="category-add.php">Add Category</a>
				</div>
			</div>
			
			



			<div class="table-top-space"></div>
			<table>
				<tr style="height: 65px; font-size: 18px;">
					<th>Name</th>
					<th>Date</th>
					<th>Action</th>
				</tr>

				<!-- LOOPING USER DATA -->
				<?php 
					$user_id = $_SESSION['user_id'];
					$query   = "SELECT * FROM ProductServiceCategory WHERE user_id = '$user_id'";
					$results = mysqli_query($con, $query);
					while($row = $results->fetch_assoc()) {
						echo "<tr>";
							echo"<td>". $row['name'] ."</td>";
							echo"<td>". date('M d Y',strtotime($row['created_at'])) ."</td>";
							echo"<td>";
								echo"<i class='fa fa-trash-o icon-delete' title='Delete'></i>&nbsp;&nbsp;&nbsp;";
								echo"<i class='fa fa-pencil icon-edit' title='Edit'></i>";
							echo"</td>";
						echo "</tr>";
					}
				?>


				<!-- <tr>
					<td>Food</td>
					<td>20-03-2020</td>
				  	<td>
						<i class="fa fa-trash-o icon-delete" title="Delete"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-pencil icon-edit" title="Edit"></i>
					</td>
				</tr> -->
				<!-- <tr>
					<td>Electricity</td>
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