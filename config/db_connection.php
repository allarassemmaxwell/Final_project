<?php



    session_start();

    // initializing variables
    $user_email   = "";
    $user_id   = "";
    $errors = array(); 

    // connect to the database
    $host     = "localhost"; 
    $user     = "root"; 
    $password = ""; 
    $dbname   = "fem"; 

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

        $user_check_query = "SELECT * FROM User WHERE user_email='$user_email' LIMIT 1";
        $result           = mysqli_query($con, $user_check_query);
        $user             = mysqli_fetch_assoc($result);
        
        if ($user) { 
            if ($user['user_email'] === $user_email) { array_push($errors, "Email already exists"); }
        }
      
        if (count($errors) == 0) {
            $user_password = md5($password_1);
      
            $query = "INSERT INTO User (first_name, last_name, user_email, user_password) VALUES('$first_name', '$last_name', '$user_email', '$user_password')";
            mysqli_query($con, $query);
            $_SESSION['success'] = "Account created successfully.";
            header('Location: login.php');
        }
    }



    // LOG IN
    if (isset($_POST['login_submit'])) {
        $user_email     = mysqli_real_escape_string($con, $_POST['user_email']);
        $user_password  = mysqli_real_escape_string($con, $_POST['user_password']);
      
        if (empty($user_email))    { array_push($errors, "Email is required"); }
        if (empty($user_password)) { array_push($errors, "Password is required"); }

        if (count($errors) == 0) {
            $user_password = md5($user_password);

            $query   = "SELECT * FROM User WHERE user_email='$user_email' AND user_password='$user_password' LIMIT 1";
            $results = mysqli_query($con, $query);

            if (mysqli_num_rows($results) == 1) {
                $user_data = mysqli_fetch_assoc($results);
                if ($user_data['is_admin'] == '1') {
                    $_SESSION['user_id']    = $user_data['user_id'];
                    $_SESSION['user_email'] = $user_data['user_email'];
                    header('location: admin/dashboard.php');		  
                }else{
                    $_SESSION['user_id'] = $user_data['user_id'];
                    $_SESSION['user_email'] = $user_data['user_email'];
                    header('Location: dashboard.php');
                }		
            }else {
                array_push($errors, "Wrong email/password combination");
            }
        }
    }



    // UPDATE USER PROFILE
    if(isset($_POST['update_profile'])) {
        $first_name    = mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name     = mysqli_real_escape_string($con, $_POST['last_name']);
        $user_email    = $_SESSION['user_email'];
        $user_id       = $_SESSION['user_id'];
        $family_number = mysqli_real_escape_string($con, $_POST['family_number']);

        if(empty($first_name)) { array_push($errors, "First Name is required"); }
        if(empty($last_name))  { array_push($errors, "Last Name is required"); }
        if(empty($user_email)) { array_push($errors, "Email is required"); }

        if (count($errors) == 0) {
            $query   = "UPDATE User SET first_name='$first_name', last_name='$last_name' WHERE user_id = '$user_id'";
            $results = mysqli_query($con, $query);

            if ($results) {
                $_SESSION['success'] = "Profile updated successfully.";
            } else {
                array_push($errors, "Could update your profile");
            }
        }
    }



    if(isset($_POST['add-source'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $user_email    = $_SESSION['user_email'];

        if (empty($name))       { array_push($errors, "Name is required"); }
        if (empty($user_email)) { array_push($errors, "Email is required"); }

        $user_user_query = "SELECT * FROM User WHERE user_email='$user_email' LIMIT 0";
        $result = mysqli_query($con, $user_user_query);
        $user   = mysqli_fetch_assoc($result);
        if ($user) { 
            array_push($errors, "Please try to login before performing this action.");
            header('Location: login.php');
        } 
      
        if (count($errors) == 0) {
            $query = "INSERT INTO Source (user_id, name) VALUES('$user_email', '$name')";
            mysqli_query($con, $query);
            echo "Maxwell 2";
            $_SESSION['success'] = "Source created successfully.";
            header('Location: source.php');
        }
        
    }




    // CHANGE USER PASSWORD
    if (isset($_POST['change_password'])) {
        $old_password    = $_POST['old_password'];
        $new_password    = $_POST['new_password'];
        $c_password      = $_POST['c_password'];
        $user_id         = $_SESSION['user_id'];
        
        if (empty($old_password)) { array_push($errors, "Old password is required"); }
        if (empty($new_password)) { array_push($errors, "New password is required"); }
        if (empty($c_password))   { array_push($errors, "Confirm password is required"); }
        if ($new_password != $c_password) { array_push($errors, "The two passwords do not match"); }

        if (count($errors) == 0) {
            $user_password    = md5($new_password);
            $current_password = md5($old_password);

            $result = mysqli_query($con, "SELECT * FROM User WHERE user_id = '$user_id'");
            $row    = mysqli_fetch_array($result);

            if ($current_password == $row["user_password"]) {
                mysqli_query($con, "UPDATE User SET user_password='$user_password' WHERE user_id = '$user_id'");
                $_SESSION['success'] = "Password Changed successfully.";
                unset($_SESSION["user_id"]);
                unset($_SESSION["user_email"]);
                header('Location: login.php');
            } else {
                array_push($errors, "Current Password is not correct");
            }
        } 
    }


            



?>

