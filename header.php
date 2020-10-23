<div class="header" id="header">
	<a href="expense.php" style="text-decoration: none;">
		<div class="logo">
			<img src="images/logo-dashboard.png" style="width: 50px; margin-top:-5px;" alt="logo">
		</div>
	</a>
		<a href="#" class="nav-trigger" id="nav-trigger" onclick="displayMenu()"><span></span></a>
	</div>
	<div class="side-nav" id="side-nav">
		<a href="expense.php" style="text-decoration: none;">
			<div class="logo">
				<i class="fa">
					<img src="images/logo-dashboard.png" style="width:50px; margin-left:-10px; margin-top:-5px" alt="logo">
				</i>
				<span>
					<img src="images/logo-dashboard.png" style="width:50px;" alt="logo">
				</span>
			</div>
		</a>
		<nav>
			<ul>
				<li onclick="window.location.href='source.php'">
					<a href="source.php">
						<img src="images/icons/money-bag-1.svg" style="width: 15px;">
						<span>Income Source</span>
					</a>
				</li>
				<li onclick="window.location.href='income.php'">
					<a href="income.php">
						<img src="images/icons/money-bills.svg" style="width: 15px;">
						<span>Income</span>
					</a>
				</li>
				<li onclick="window.location.href='category.php'">
					<a href="category.php">
						<img src="images/icons/list.svg" style="width: 15px;">
						<span>Product Category</span>
					</a>
				</li>
				<li onclick="window.location.href='product-service.php'">
					<a href="product-service.php">
						<img src="images/icons/basket.svg" style="width: 15px;">
						<span>Product/Service</span>
					</a>
				</li>
				<li onclick="window.location.href='expense.php'">
					<a href="expense.php">
						<img src="images/icons/accounting.svg" style="width: 15px;">
						<span>Expense</span>
					</a>
				</li>
				<li onclick="window.location.href='projected-expense.php'">
					<a href="projected-expense.php">
						<img src="images/icons/medical.svg" style="width: 15px;">
						<span>Projected Expense</span>
					</a>
				</li>
				<li onclick="showReportList()">
					<a>
						<img src="images/icons/report.svg" style="width: 15px;">
						<span>Expenses Report</span>
					</a>
				</li>
				<div id="report">
					<li onclick="window.location.href='daily-report.php'">
						<a href="daily-report.php" style="margin-left: 10px;">
							<span><i class="fa fa-calendar-o"></i></span>
							<span>Daily Report</span>
						</a>
					</li>
					<li onclick="window.location.href='weekly-report.php'">
						<a href="weekly-report.php" style="margin-left: 10px;">
							<span><i class="fa fa-bars"></i></span>
							<span>Weekly Report</span>
						</a>
					</li>
					<li onclick="window.location.href='monthly-report.php'">
						<a href="monthly-report.php" style="margin-left: 10px;">
							<span><i class="fa fa-bars"></i></span>
							<span>Monthly Report</span>
						</a>
					</li>
					<li onclick="window.location.href='annually-report.php'">
						<a href="annually-report.php" style="margin-left: 10px;">
							<span><i class="fa fa-list-ol"></i></span>
							<span>Annual Report</span>
						</a>
					</li>
				</div>
				<li onclick="window.location.href='help.php'">
					<a href="help.php">
						<img src="images/icons/feedback.svg" style="width: 15px;">
						<span>Help</span>
					</a>
				</li>
				<li onclick="window.location.href='profile.php'">
					<a href="profile.php">
						<img src="images/icons/user-profile.svg" style="width: 15px;">
						<span>Profile</span>
					</a>
				</li>
				<li onclick="window.location.href='logout.php'">
					<a href="logout.php">
						<img src="images/icons/log-out.svg" style="width: 15px;">
						<span class="danger">Log out</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>

<style>
#report{
	display: none;
}
</style>
 
<!-- SHOW AND HIDE REPORT LIST -->
<script>
	function showReportList() {
		var report = document.getElementById("report");
		if(report.style.display === "block") {
			report.style.display = "none";
		} else {
			report.style.display = "block";
		}
	}

	// DISPLAY MENU
	function displayMenu() {
		var sideNav = document.getElementById("side-nav");
		if(sideNav.style.display === "block") {
			sideNav.style.display = "none";
		} else {
			sideNav.style.display = "block";
		}
	}
</script>