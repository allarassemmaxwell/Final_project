<?php 
	require_once('db_connection.php');

	if (!isset($_SESSION['user_email'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>

<?php 
// END OF THE MONTH ADD MONEY IN THE SAVING ACCOUNT
    $this_month = date("m");
	$this_year  = date("Y");
    $today = date("Y-m-d");
    $last_day_of_the_month = new DateTime('now');
    $last_day_of_the_month->modify('last day of this month');
    // echo $last_day_of_the_month->format('Y-m-d');
    // echo '<br>'.$today;
    $user_id = $_SESSION['user_id'];
    if($today == $today) {
        echo "1 <br>";
        $income_query   = "SELECT * FROM Expense WHERE user_id = '$user_id' AND YEAR(created_at) = '$this_year' AND MONTH(created_at) = '$this_month'";
        $income_results = mysqli_query($con, $income_query);
        if (mysqli_num_rows($income_results)) {
            echo "2 <br>";
            // echo $income_results['amount'];
            // $income_data = mysqli_fetch_assoc($income_results);
            // $income_amount = $income_data['amount'];
            // $remaining_amount = $income_data['remaining_amount'];
            // $save = $income_amount - $remaining_amount;
            // if ($income_amount <= $remaining_amount) {
            //     $saving_query = "INSERT INTO Saving (user_id, income_id, amount) VALUES('$user_id', '$last_name', '$user_email', '$user_password')";
            //     $saving_results = mysqli_query($con, $saving_query);
            // }else{
            //     $_SESSION['user_id'] = $user_data['user_id'];
            //     $_SESSION['user_email'] = $user_data['user_email'];
            //     header('Location: dashboard.php');
            // }		
        } else {
            echo "2 FALSE";
        }
    } else {
        echo "NO";
    }
?>