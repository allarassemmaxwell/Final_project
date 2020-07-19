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
		<title>Annually Report || FEM</title>
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
				Annually Report
			</div>

            
            
            <!-- <div class="table-top-space"></div> -->
			<div class="report-title">
                <div>User: Allarassem&nbsp;&nbsp; Maxime</div>
                <div>Date: 20/03/2020</div>
                <div>Source: Farm</div>
                <div>Income: ksh 25.000</div>
                <div>Family number: 4</div>
            </div>



			<!-- <div class="table-top-space"></div> -->
			<table style="margin-top: 15px;">
				<tr style="height: 65px; font-size: 15px; color: #737373;">
					<th style="color: #737373;">Name</th>
					<th style="color: #737373;">Source</th>
                    <th style="color: #737373;">Income</th>
                    <th style="color: #737373;">Expenditure</th>
                    <th style="color: #737373;">Price</th>
					<th style="color: #737373;">Date</th>
				</tr>
				<tr>
					<td>Allarassem</td>
					<td>Farm</td>
                    <td>ksh 150</td>
                    <td>Food</td>
                    <td>ksh 50</td>
					<td>20-03-2020</td>
				</tr>
				<tr>
					<td>Allarassem</td>
					<td>Farm</td>
                    <td>ksh 150</td>
                    <td>Food</td>
                    <td>ksh 50</td>
					<td>20-03-2020</td>
				</tr>
				<tr>
					<td>Allarassem</td>
					<td>Farm</td>
                    <td>ksh 150</td>
                    <td>Food</td>
                    <td>ksh 50</td>
					<td>20-03-2020</td>
				</tr>
				<tr>
					<td>Allarassem</td>
					<td>Farm</td>
                    <td>ksh 150</td>
                    <td>Food</td>
                    <td>ksh 50</td>
					<td>20-03-2020</td>
				</tr>
				<tr>
					<td>Allarassem</td>
					<td>Farm</td>
                    <td>ksh 150</td>
                    <td>Food</td>
                    <td>ksh 50</td>
					<td>20-03-2020</td>
				</tr>
				<tr>
					<td>Allarassem</td>
					<td>Farm</td>
                    <td>ksh 150</td>
                    <td>Food</td>
                    <td>ksh 50</td>
					<td>20-03-2020</td>
				</tr>
			  </table>

              <div class="table-bottom-space"></div>
              <div class="table-total">
				<button class="button-primary-total">Save: ksh 40.000</button>
              </div>
              <div class="table-total">
				<button class="button-light-total">Income: ksh 200.000</button>
			  </div>
			  <div class="table-total">
				<button class="button-error-total">Expenditure: ksh 200.000</button>
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