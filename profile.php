<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Profile || FEM</title>
		<link rel="stylesheet" href="css/dashboard.css">

        <!-- IMPORT FONT AWSOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>FEM</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>

			
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>FEM</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="expense.php">
							<span><i class="fa fa-exchange"></i></span>
							<span>Expense</span>
						</a>
                    </li>
					<li>
						<a href="source.php">
							<span><i class="fa fa-database"></i></span>
							<span>Sources</span>
						</a>
					</li>
					<li>
						<a href="income.php">

							<span><i class="fa fa-money"></i></span>
							<span>Income</span>
						</a>
					</li>
					<li>
						<a href="category.php">
							<span><i class="fa fa-server"></i></span>
							<span>Category</span>
						</a>
					</li>
					<li>
						<a href="product-service.php">
							<span><i class="fa fa-product-hunt"></i></span>
							<span>Product/Service</span>
						</a>
                    </li>
                    <li>
						<a href="daily-report.php">
							<span><i class="fa fa-calendar-o"></i></span>
							<span>Daily Report</span>
						</a>
                    </li>
                    <li>
						<a href="weekly-report.php">
							<span><i class="fa fa-bars"></i></span>
							<span>Weekly Report</span>
						</a>
                    </li>
                    <li>
						<a href="annually-report.php">
							<span><i class="fa fa-list-ol"></i></span>
							<span>Annually Report</span>
						</a>
					</li>
					<li class="active">
						<a href="profile.php">
							<span><i class="fa fa-user"></i></span>
							<span>Profile</span>
						</a>
					</li>
					<li>
						<a href="login.php">
							<span><i class="fa fa-sign-out" style="color: #dc3545;"></i></span>
							<span class="danger">Log out</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>

		<div class="main-content">
            
                <div class="title-left">
                    Profile
				</div>
				
				<!-- <div class="title-right">
					<div class="add">
						<i class="fa fa-plus"></i> 
						<a href="">Username</a>
					</div>
					<div class="password-delete">
						<a href="">Change Password</a>
						<a href="">Delete Account</a>
					</div>
				</div> -->


            <div class="table-top-space"></div>
            
            <form class="profile-edit-form" method="POST">
				<div>
					<input type="text" name="first_name" placeholder="First name">
				</div><br><br>

				<div>
					<input type="text" name="last_name" placeholder="Last name">
				</div><br><br>

				<div>
					<input type="email" name="email" placeholder="Email">
				</div><br><br>

				<div>
					<input type="number" name="family_number" placeholder="Family member">
				</div><br><br>

                <div>
                    <input class="button-primary" type="submit" value="Save">
                </div>
            </form>  

			<div class="table-bottom-space"></div>
			<div class="table-total">
				<a href="#">
					<button class="button-error">Delete Account</button>
				</a>
			</div>
			<div class="table-total">
				<a href="change-password.php">
					<button class="button-error">Change Password</button>
				</a>
			</div>
		</div>



		<footer>
            <div class="content">
                © <span id="year"></span> Copyright: Family Expenses Manager
            </div>
		</footer>
		
		
		
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