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
    $user_id = $_SESSION['user_id'];
    if($today == $last_day_of_the_month->format('Y-m-d')) {
        $query    = "SELECT * FROM Income WHERE user_id = '$user_id' AND YEAR(created_at) = '$this_year' AND MONTH(created_at) = '$this_month'";
        $results  = mysqli_query($con, $query);
        if (mysqli_num_rows($results) > 0) {
            while($row = $results->fetch_assoc()) {
                $income_id = $row['income_id'];
                $saved = $row['remaining_amount'];

                $saving_query = "INSERT INTO Saving (user_id, income_id, amount) VALUES('$user_id', '$income_id', '$saved')";
                mysqli_query($con, $saving_query);
            }
        }else {
            // echo "2 FALSE";
        }
    } else {
        // echo "NO";
    }
?>