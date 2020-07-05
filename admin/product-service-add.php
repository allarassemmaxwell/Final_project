<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Product-Service Add || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

		<?php include('header.php'); ?>

		<div class="main-content">
            
                <div class="title-left">
                    <a href="product-service.php" style="text-decoration: none; color: #333;">Product/Service</a>
                    /Add
                </div>


            <div class="table-top-space"></div>
            
            <form class="product-service-form" method="POST">
                <div>
					<select id="category" name="category">
						<option value="">--- Select Category ---</option>
						<option value = "1">Category one</option>
						<option value = "2">Category two</option>
						<option value = "3">Category three</option>
						<option value = "4">Category four</option>
					</select>
				</div><br><br>

                <div>
					<input type="text" name="name" placeholder="Name">
				</div><br><br>

                <div>
                    <input class="button-primary" type="submit" value="Create">
                </div>
            </form>  


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