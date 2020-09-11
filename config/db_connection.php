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
                    $_SESSION['is_admin']   = $user_data['is_admin'];
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
        $income_id  = mysqli_real_escape_string($con, $_POST['income']);
        $product_service_id  = mysqli_real_escape_string($con, $_POST['product_or_service']);
        $price   = mysqli_real_escape_string($con, $_POST['price']);
        $totole_expenses = $_SESSION['total_expenses'] + $price;
        $user_id = $_SESSION['user_id'];

        if (empty($income_id)) { array_push($errors, "Income is required"); }
        if (empty($product_service_id)) { array_push($errors, "Product/Service is required"); }
        if (empty($price))    { array_push($errors, "Price is required"); }

        $check_amount_query   = "SELECT * FROM Income WHERE user_id='$user_id' AND income_id='$income_id' LIMIT 1";
        $check_amount_result  = mysqli_query($con, $check_amount_query);
        $check_amount_value   = mysqli_fetch_assoc($check_amount_result);
        
        if ($check_amount_value) { 
            if ($check_amount_value['remaining_amount'] < $price) { 
                array_push($errors, "You don't have enough money in your income"); 
            } else {
                $remain = $check_amount_value['remaining_amount'] - $price;
                $reduce_remaining_amount_query  = "UPDATE Income SET remaining_amount='$remain' WHERE income_id='$income_id'";
                mysqli_query($con, $reduce_remaining_amount_query);
            }
        }
        if (count($errors) == 0) {
            $query  = "INSERT INTO Expense (user_id, product_service_id, price, income_id) VALUES('$user_id', '$product_service_id', '$price', '$income_id')";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
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
            }
        }
    }



    // ADDING INCOME
    if(isset($_POST['add-income'])) {
        $source_id          = mysqli_real_escape_string($con, $_POST['source']);
        $amount             = mysqli_real_escape_string($con, $_POST['amount']);
        $remaining_amount   = mysqli_real_escape_string($con, $_POST['amount']);
        $user_id = $_SESSION['user_id'];

        if (empty($source_id)) { array_push($errors, "Source is required"); }
        if (empty($amount))    { array_push($errors, "Amount is required"); }

        if (count($errors) == 0) {
            $query = "INSERT INTO Income (source_id, user_id, amount, remaining_amount) VALUES('$source_id', '$user_id', '$amount', '$remaining_amount')";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Income created successfully.";
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
            }
        }
    }




    // ADDING CONTACT
    if(isset($_POST['add-contact'])) {
        $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name  = mysqli_real_escape_string($con, $_POST['last_name']);
        $email      = mysqli_real_escape_string($con, $_POST['email']);
        $subject    = mysqli_real_escape_string($con, $_POST['subject']);
        $message    = mysqli_real_escape_string($con, $_POST['message']);

        if (empty($first_name)) { array_push($errors, "First name is required"); }
        if (empty($last_name))  { array_push($errors, "Last name is required"); }
        if (empty($email))      { array_push($errors, "Email is required"); }
        if (empty($subject))    { array_push($errors, "Subject is required"); }
        if (empty($message))    { array_push($errors, "Messageis required"); }

        if (count($errors) == 0) {
            $query = "INSERT INTO Contact (first_name, last_name, email, subject, message) VALUES('$first_name', '$last_name', '$email', '$subject', '$message')";
            $result = mysqli_query($con, $query);
            if (!$result) { 
                array_push($errors, "Error: Connection failed: $query");
            } else {
                $_SESSION['success'] = "Your message has been sent successfully. We will get back to you as soon as possible";
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



    // DELETE EXPENSE
    if(isset($_POST['delete-expense'])) {
        $expense_id = $_POST['expense_id'];

        if (empty($expense_id)) { array_push($errors, "An expense is required"); }

        $price = 0;
        if (count($errors) == 0) {
            $expense_query = "SELECT * FROM Expense WHERE expense_id='$expense_id' LIMIT 1";
            $expense_result = mysqli_query($con, $expense_query);
            $check_expense   = mysqli_fetch_assoc($expense_result);
            if ($check_expense) { 
                $price = $check_expense['price'];
                $income_id = $check_expense['income_id'];

                $update_income_query = "UPDATE Income SET remaining_amount= remaining_amount + '$price' WHERE income_id='$income_id'";
                $update_income_result = mysqli_query($con, $update_income_query);
                if ($update_income_result) {
                    $delete_expense_query = "DELETE FROM Expense WHERE expense_id='$expense_id'";
                    $delete_expense_result = mysqli_query($con, $delete_expense_query);
                    if (!$delete_expense_result) { 
                        array_push($errors, "Error: Connection failed$delete_expense_query");
                    } else {
                        $_SESSION['success'] = "Expense deleted successfully.";
                    }
                }
            }
        }
    }


    // DELETE SOURCE
    if(isset($_POST['delete-source'])) {
        $source_id = $_POST['source_id'];

        if (empty($source_id)) { array_push($errors, "Source is required"); }

        $check_income_query = "SELECT * FROM Income WHERE source_id='$source_id'";
        $income_result      = mysqli_query($con, $check_income_query);
        while($income_data = $income_result->fetch_assoc()) {
            $income_id = $income_data['income_id'];
            $check_expense_query = "SELECT * FROM Expense WHERE income_id='$income_id'";
            $expense_result      = mysqli_query($con, $check_expense_query);
            while($expense_data = $expense_result->fetch_assoc()) {
                $expense_id = $expense_data['expense_id'];
                $delete_expense_query  = "DELETE FROM Expense WHERE income_id='$income_id'";
                mysqli_query($con, $delete_expense_query);
            }
            $delete_income_query  = "DELETE FROM Income WHERE source_id='$source_id'";
            mysqli_query($con, $delete_income_query);
        }

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
            $check_expense_query = "SELECT * FROM Expense WHERE income_id='$income_id'";
            $expense_result      = mysqli_query($con, $check_expense_query);
            while($expense_data = $expense_result->fetch_assoc()) {
                $expense_id = $expense_data['expense_id'];
                $delete_expense_query  = "DELETE FROM Expense WHERE expense_id='$expense_id'";
                mysqli_query($con, $delete_expense_query);
            }
            $income_query  = "DELETE FROM Income WHERE income_id='$income_id'";
            $income_result = mysqli_query($con, $income_query);
            if (!$income_result) { 
                array_push($errors, "Error: Connection failed: $income_query");
            } else {
                $_SESSION['success'] = "Income deleted successfully.";
            }
        }
    }



    // DELETE CATEGORY
    if(isset($_POST['delete-category'])) {
        $category_id = $_POST['category_id'];

        if (empty($category_id)) { array_push($errors, "Category is required"); }

        $check_product_query = "SELECT * FROM ProductService WHERE product_service_category_id='$category_id'";
        $product_result      = mysqli_query($con, $check_product_query);
        while($product_data = $product_result->fetch_assoc()) {
            $product_service_id = $product_data['product_service_id'];
            $check_expense_query = "SELECT * FROM Expense WHERE product_service_id='$product_service_id'";
            $expense_result      = mysqli_query($con, $check_expense_query);
            while($expense_data = $expense_result->fetch_assoc()) {
                $expense_id = $expense_data['expense_id'];
                $delete_expense_query  = "DELETE FROM Expense WHERE expense_id='$expense_id'";
                mysqli_query($con, $delete_expense_query);
            }
            $delete_product_query  = "DELETE FROM ProductService WHERE product_service_id='$product_service_id'";
            mysqli_query($con, $delete_product_query);
        }
        
        if (count($errors) == 0) {
            $category_query  = "DELETE FROM ProductServiceCategory WHERE category_id='$category_id'";
            $category_result = mysqli_query($con, $category_query);
            if (!$category_result) { 
                array_push($errors, "Error: Connection failed: $category_query");
            } else {
                $_SESSION['success'] = "Category deleted successfully.";
            }
        }
    }



    // DELETE PRODUCT OR SERVICE
    if(isset($_POST['delete-product-or-service'])) {
        $product_service_id = $_POST['product_service_id'];

        if (empty($product_service_id)) { array_push($errors, "Product or Service is required"); }

        $expense_query  = "DELETE FROM Expense WHERE product_service_id='$product_service_id'";
        $expense_result = mysqli_query($con, $expense_query);
        if (!$expense_result) { 
            array_push($errors, "Error: Connection failed: $expense_query");
        }
        if (count($errors) == 0) {
            $product_query  = "DELETE FROM ProductService WHERE product_service_id='$product_service_id'";
            $product_result = mysqli_query($con, $product_query);
            if (!$product_result) { 
                array_push($errors, "Error: Connection failed: $product_query");
            } else {
                $_SESSION['success'] = "Product/Service deleted successfully.";
            }
        }
    }



    // DELETE USER ACCOUNT
    if(isset($_POST['delete_user_account'])) {
        $password = $_POST['c_password'];
        $user_id  = $_SESSION['user_id'];
        $user_password = md5($password);

        if (empty($password)) { array_push($errors, "Password is required"); }

        $check_user_query = "SELECT * FROM User WHERE user_id='$user_id' LIMIT 1";
        $result           = mysqli_query($con, $check_user_query);
        $user             = mysqli_fetch_assoc($result);
        
        if ($user) { 
            if ($user['user_password'] != $user_password) { array_push($errors, "Wrong password"); }
        }
      
        if (count($errors) == 0) {
            $delete_user_expense = "DELETE FROM Expense WHERE user_id ='$user_id'";
            $expense = mysqli_query($con, $delete_user_expense);
            if($expense) {
                $delete_user_income = "DELETE FROM Income WHERE user_id ='$user_id'";
                $income = mysqli_query($con, $delete_user_income);
                if($income) {
                    $delete_user_source = "DELETE FROM Source WHERE user_id ='$user_id'";
                    $source = mysqli_query($con, $delete_user_source);
                    if($source) {
                        $delete_user_productService = "DELETE FROM ProductService WHERE user_id ='$user_id'";
                        $productService = mysqli_query($con, $delete_user_productService);
                        if($productService) {
                            $delete_user_category = "DELETE FROM ProductServiceCategory WHERE user_id ='$user_id'";
                            $productCategory = mysqli_query($con, $delete_user_category);
                            if($productCategory) {
                                $delete_user = "DELETE FROM User WHERE user_id ='$user_id'";
                                $user = mysqli_query($con, $delete_user);
                                if($user) {
                                    session_destroy();
                                    // $_SESSION['success'] = "Account deleted successfully.";
                                    header('Location: login.php');
                                } else {
                                    array_push($errors, "Error in User: $query");
                                }
                            } else {
                                array_push($errors, "Error in Product Category: $query");
                            }
                        } else {
                            array_push($errors, "Error in Product Service: $query");
                        }
                    } else {
                        array_push($errors, "Error in Source: $query");
                    }
                } else {
                    array_push($errors, "Error in Income: $query");
                }
            } else {
                array_push($errors, "Error in Expense: $query");
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
            $expense_query   = "SELECT * FROM Expense WHERE income_id = '$income_id'";
            $expense_results = mysqli_query($con, $expense_query);
            $expense_price = 0;
            while($row = mysqli_fetch_assoc($expense_results)) {
                $expense_price += $row['price'];
            }

            $income_query = "SELECT * FROM Income WHERE income_id='$income_id' LIMIT 1";
            $income_result = mysqli_query($con, $income_query);
            $check_income   = mysqli_fetch_assoc($income_result);
            if ($check_income) { 
                $previous_amount = $check_income['amount'];
                $previous_remaining = $check_income['remaining_amount'];
                $remaining = $previous_amount - $amount;

                $query = "UPDATE Income SET amount='$amount', remaining_amount='$amount' - '$expense_price', source_id='$source_id' WHERE income_id='$income_id' AND user_id='$user_id'";
                $result = mysqli_query($con, $query);
                if (!$result) { 
                    array_push($errors, "Error: Connection failed: $query");
                } else {
                    $_SESSION['success'] = "Income updated successfully.";
                    header('Location: income.php');
                }
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

