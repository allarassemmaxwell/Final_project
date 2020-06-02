<?php



    session_start();

    // initializing variables
    $user_email   = "";
    $errors = array(); 

    // connect to the database
    $host     = "localhost"; 
    $user     = "root"; 
    $password = ""; 
    $dbname   = "FamilyExpenseManager"; 

    $con = mysqli_connect($host, $user, $password,$dbname);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }





    // CREATE ACCOUNT
    if (isset($_POST['register_submit'])) {

        $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name  = mysqli_real_escape_string($con, $_POST['last_name']);
        $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
        $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);
      
        if (empty($first_name)) { array_push($errors, "First name is required"); }
        if (empty($last_name))  { array_push($errors, "Last name is required"); }
        if (empty($user_email)) { array_push($errors, "Email is required"); }
        if (empty($password_1)) { array_push($errors, "Password is required"); }
        if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }
      
        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM User WHERE user_email='$user_email' LIMIT 1";
        $result = mysqli_query($con, $user_check_query);
        $user   = mysqli_fetch_assoc($result);
        
        if ($user) { 
            if ($user['user_email'] === $user_email) {
                array_push($errors, "Email already exists");
            }
        }
      
        if (count($errors) == 0) {
            $user_password = md5($password_1);
      
            $query = "INSERT INTO User (first_name, last_name, user_email, user_password) 
                      VALUES('$first_name', '$last_name', '$user_email', '$user_password')";
            mysqli_query($con, $query);
            $_SESSION['user_email'] = $user_email;
            $_SESSION['success'] = "You are now logged in";
            header('location: dashboard/index.php');
        }
    }



    // LOG IN
    if (isset($_POST['login_submit'])) {
        $user_email     = mysqli_real_escape_string($con, $_POST['user_email']);
        $user_password  = mysqli_real_escape_string($con, $_POST['user_password']);
      
        if (empty($user_email)) { array_push($errors, "Email is required"); }
        if (empty($user_password)) { array_push($errors, "Password is required"); }

        if (count($errors) == 0) {
            $user_password = md5($user_password);
            $query   = "SELECT * FROM User WHERE user_email='$user_email' AND user_password='$user_password'";
            $results = mysqli_query($con, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['user_email'] = $user_email;
                $_SESSION['success'] = "You are now logged in";
                header('location: dashboard.php');
            }else {
                array_push($errors, "Wrong email/password combination");
            }
        }
    }


?>