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
                array_push($errors, "Could update your profile: $query");
            }
        }
    }





// ADDING SECTION      ADDING SECTION       ADDING SECTION       ADDING SECTION     ADDING SECTION
    

    // ADDING EXPENSE
    if(isset($_POST['add-expense'])) {
        $product_service_id  = mysqli_real_escape_string($con, $_POST['product_or_service']);
        $price  = mysqli_real_escape_string($con, $_POST['price']);
        $user_id = $_SESSION['user_id'];

        if (empty($product_service_id)) { array_push($errors, "Source is required"); }
        if (empty($price))    { array_push($errors, "Price is required"); }

        if (count($errors) == 0) {
            $query = "INSERT INTO Expense (user_id, product_service_id, price) VALUES('$user_id', '$product_service_id', '$price')";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                // header('Location: expense.php');
                $_SESSION['success'] = "Expense created successfully.";
            }
        }
    }


    // ADDING SOURCE
    if(isset($_POST['add-source'])) {
        $name    = mysqli_real_escape_string($con, $_POST['name']);
        $user_id = $_SESSION['user_id'];

        if (empty($name))       { array_push($errors, "Name is required"); }

        $user_check_query = "SELECT * FROM Source WHERE user_id='$user_id' AND name='$name' LIMIT 1";
        $result1          = mysqli_query($con, $user_check_query);
        $value            = mysqli_fetch_assoc($result1);
        
        if ($value) { 
            if ($value['name'] === $name) { array_push($errors, "Name already exists"); }
        }

        if (count($errors) == 0) {
            $query = "INSERT INTO Source (user_id, name) VALUES('$user_id', '$name')";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Source created successfully.";
                // header('Location: source.php');
            }
        }
    }



    // ADDING INCOME
    if(isset($_POST['add-income'])) {
        $source_id  = mysqli_real_escape_string($con, $_POST['source']);
        $amount  = mysqli_real_escape_string($con, $_POST['amount']);
        $user_id = $_SESSION['user_id'];

        if (empty($source_id)) { array_push($errors, "Source is required"); }
        if (empty($amount))    { array_push($errors, "Amount is required"); }

        if (count($errors) == 0) {
            $query = "INSERT INTO Income (source_id, user_id, amount) VALUES('$source_id', '$user_id', '$amount')";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Income created successfully.";
                // header('Location: income.php');
            }
        }
    }


    // ADDING CATEGORY
    if(isset($_POST['add-category'])) {
        $name    = mysqli_real_escape_string($con, $_POST['name']);
        $user_id = $_SESSION['user_id'];

        if (empty($name)) { array_push($errors, "Name is required"); }

        $user_check_query = "SELECT * FROM ProductServiceCategory WHERE user_id='$user_id' AND name='$name' LIMIT 1";
        $result1          = mysqli_query($con, $user_check_query);
        $value            = mysqli_fetch_assoc($result1);
        
        if ($value) { 
            if ($value['name'] === $name) { array_push($errors, "Name already exists"); }
        }

        if (count($errors) == 0) {
            $query = "INSERT INTO ProductServiceCategory (user_id, name) VALUES('$user_id', '$name')";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Category created successfully.";
                // header('Location: category.php');
            }
        }
    }


    // ADDING PRODUCT OR SERVICE
    if(isset($_POST['add-product-or-service'])) {
        $category_id  = mysqli_real_escape_string($con, $_POST['category']);
        $name  = mysqli_real_escape_string($con, $_POST['name']);
        $user_id = $_SESSION['user_id'];

        if (empty($category_id)) { array_push($errors, "Category is required"); }
        if (empty($name))    { array_push($errors, "Name is required"); }

        if (count($errors) == 0) {
            $query = "INSERT INTO ProductService (product_service_category_id, name, user_id) VALUES('$category_id', '$name', '$user_id')";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Product/Service created successfully.";
                // header('Location: product-service.php');
            }
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






    



// DELETE SECTION      DELETE SECTION       DELETE SECTION       DELETE SECTION     DELETE SECTION

    // DELETE ACCOUNT
    if (isset($_GET['delete-account'])) {
        $old_password    = $_POST['old_password'];
        $new_password    = $_POST['new_password'];
        $c_password      = $_POST['c_password'];
        $user_id         = $_SESSION['user_id'];
        
        echo $user_id;
    }


    // DELETE EXPENSE
    if(isset($_POST['delete-expense'])) {
        $expense_id = $_POST['expense_id'];

        if (empty($expense_id)) { array_push($errors, "An expense is required"); }

        if (count($errors) == 0) {
            $query = "DELETE FROM Expense WHERE expense_id='$expense_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed$query");
            } else {
                $_SESSION['success'] = "Expense deleted successfully.";
            }
        }
    }


    // DELETE SOURCE
    if(isset($_POST['delete-source'])) {
        $source_id = $_POST['source_id'];

        if (empty($source_id)) { array_push($errors, "Source is required"); }

        if (count($errors) == 0) {
            $query  = "DELETE FROM Source WHERE source_id='$source_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Source deleted successfully.";
            }
        }
    }



    // DELETE INCOME
    if(isset($_POST['delete-income'])) {
        $income_id = $_POST['income_id'];

        if (empty($income_id)) { array_push($errors, "Income is required"); }

        if (count($errors) == 0) {
            $query  = "DELETE FROM Income WHERE income_id='$income_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Income deleted successfully.";
            }
        }
    }



    // DELETE CATEGORY
    if(isset($_POST['delete-category'])) {
        $category_id = $_POST['category_id'];

        if (empty($category_id)) { array_push($errors, "Category is required"); }

        if (count($errors) == 0) {
            $query  = "DELETE FROM ProductServiceCategory WHERE category_id='$category_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Category deleted successfully.";
            }
        }
    }



    // DELETE PRODUCT OR SERVICE
    if(isset($_POST['delete-product-or-service'])) {
        $product_service_id = $_POST['product_service_id'];

        if (empty($product_service_id)) { array_push($errors, "Product or Service is required"); }

        if (count($errors) == 0) {
            $query  = "DELETE FROM ProductService WHERE product_service_id='$product_service_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Product/Service deleted successfully.";
            }
        }
    }





    // UPDATE SECTION  UPDATE SECTION   UPDATE SECTION   UPDATE SECTION    UPDATE SECTION   UPDATE SECTION

    // UPDATE EXPENSE
    if(isset($_POST['update-expense'])) {
        $expense_id          = mysqli_real_escape_string($con, $_POST['expense_id']);
        $price               = mysqli_real_escape_string($con, $_POST['price']);
        $product_service_id  = mysqli_real_escape_string($con, $_POST['product_or_service']);
        $user_id             = mysqli_real_escape_string($con, $_POST['user_id']);

        if (empty($expense_id)) { array_push($errors, "Expense is required"); }
        if (empty($price))    { array_push($errors, "Price is required"); }
        if (empty($product_service_id))    { array_push($errors, "Product/Service is required"); }

        if (count($errors) == 0) {
            $query = "UPDATE Expense SET price='$price', product_service_id='$product_service_id' WHERE expense_id='$expense_id' AND user_id='$user_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Expense updated successfully.";
                header('Location: expense.php');
            }
        }
    }



    // UPDATE SOURCE
    if(isset($_POST['update-source'])) {
        $source_id          = mysqli_real_escape_string($con, $_POST['source_id']);
        $name               = mysqli_real_escape_string($con, $_POST['name']);
        $user_id             = mysqli_real_escape_string($con, $_POST['user_id']);

        if (empty($source_id)) { array_push($errors, "Source is required"); }
        if (empty($name))    { array_push($errors, "Name is required"); }

        if (count($errors) == 0) {
            $query = "UPDATE Source SET name='$name' WHERE source_id='$source_id' AND user_id='$user_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Source updated successfully.";
                header('Location: source.php');
            }
        }
    }


    // UPDATE INCOME
    if(isset($_POST['update-income'])) {
        $income_id = mysqli_real_escape_string($con, $_POST['income_id']);
        $amount    = mysqli_real_escape_string($con, $_POST['amount']);
        $source_id = mysqli_real_escape_string($con, $_POST['source']);
        $user_id   = mysqli_real_escape_string($con, $_POST['user_id']);

        if (empty($income_id)) { array_push($errors, "Income is required"); }
        if (empty($amount))    { array_push($errors, "Amount is required"); }
        if (empty($source_id)) { array_push($errors, "Source is required"); }

        if (count($errors) == 0) {
            $query = "UPDATE Income SET amount='$amount', source_id='$source_id' WHERE income_id='$income_id' AND user_id='$user_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Income updated successfully.";
                header('Location: income.php');
            }
        }
    }


    // UPDATE CATEGORY
    if(isset($_POST['update-category'])) {
        $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
        $name        = mysqli_real_escape_string($con, $_POST['name']);
        $user_id     = mysqli_real_escape_string($con, $_POST['user_id']);

        if (empty($category_id)) { array_push($errors, "Category is required"); }
        if (empty($name))    { array_push($errors, "Name is required"); }

        if (count($errors) == 0) {
            $query = "UPDATE ProductServiceCategory SET name='$name' WHERE category_id='$category_id' AND user_id='$user_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Category updated successfully.";
                header('Location: category.php');
            }
        }
    }


    // UPDATE PRODUCT/SERVICE
    if(isset($_POST['update-product-service'])) {
        $product_service_id = mysqli_real_escape_string($con, $_POST['product_service_id']);
        $name      = mysqli_real_escape_string($con, $_POST['name']);
        $product_service_category_id = mysqli_real_escape_string($con, $_POST['category']);
        $user_id   = mysqli_real_escape_string($con, $_POST['user_id']);

        if (empty($product_service_id)) { array_push($errors, "Product/Sevice is required"); }
        if (empty($name))    { array_push($errors, "Name is required"); }
        if (empty($product_service_category_id)) { array_push($errors, "Category is required"); }

        if (count($errors) == 0) {
            $query = "UPDATE ProductService SET name='$name', product_service_category_id='$product_service_category_id' WHERE product_service_id='$product_service_id' AND user_id='$user_id'";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Product/Service updated successfully.";
                header('Location: product-service.php');
            }
        }
    }
            



?>

