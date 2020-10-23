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
		<title>Update Income || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">
	</head>
	<body>
		
		<?php include('header.php'); ?>

		<div class="main-content">
            
            <div class="title-left" style="font-size: 15px; color: #737373;">
				<a style="text-decoration: none" class="primary" href="income.php">Income</a>/ Update
            </div>
            <div class="table-top-space"></div>
            

			


            <form class="edit-page" name="incomeForm" method="POST" onsubmit="return incomeValidation()">
				<div>
					<?php include('errors.php'); ?><br>
				</div>
				
                <div>
					<select id="source" name="source"  style="font-size: 14px; color: #737373; padding: 10px">
						<option value="">Select Source</option>
                        <?php 
                            $user_id   = $_GET['id1'];
                            $income_id = $_GET['id2'];
                            $source_id = $_GET['id3'];
                            $amount    = $_GET['amount'];

							$query   = "SELECT * FROM Source WHERE user_id = '$user_id' ORDER BY created_at DESC";
							$results = mysqli_query($con, $query);

							if (mysqli_num_rows($results) > 0) {
								while($row = mysqli_fetch_assoc($results)) {
                                    if($row['source_id'] == $source_id) {
										echo '<option value="' . $row['source_id'] . '" selected>' . $row['name'] . '</option>';
									}
									echo '<option value="' . $row['source_id'] . '">' . $row['name'] . '</option>';
								}
							} else {
								// echo "0 results";
							}
						?>
					</select>
				</div><br><br>

                <div>
					<input  style="font-size: 14px; color: #737373; padding: 15px;" type="text" value="<?php echo $amount; ?>" name="amount" placeholder="Amount">
                    <input type="text" hidden name="income_id" value="<?php echo $income_id; ?>">
					<input type="text" hidden name="user_id" value="<?php echo $user_id; ?>">
				</div><br><br>
				
                <div>
                    <input class="button-primary" name="update-income" type="submit" value="Update Income">
                </div>
            </form>  


		</div>



		<?php include_once("footer.php"); ?>
		
		
		

		
        <!-- JAVASCRIPT -->
    	<script src="js/validation.js"></script>

	</body>
</html>