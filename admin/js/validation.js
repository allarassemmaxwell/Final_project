
    // FILTER BY DAY, WEEK, MONTH AND YEAR  INPUT VALIDATION
    function filterByValidation() {
        var projected_date = document.forms["filterByForm"]["projected_date"].value;
        if(projected_date == '') {
            alert( "Date is required." );
            document.filterByForm.old_password.focus() ;
            return false;
        }
    }

    // REGISTER INPUT VALIDATION
    function registerValidation() {
        var first_name = document.forms["registerForm"]["first_name"].value;
        var last_name  = document.forms["registerForm"]["last_name"].value;
        var user_email = document.forms["registerForm"]["user_email"].value;
        var password_1 = document.forms["registerForm"]["password_1"].value;
        var password_2 = document.getElementById("password_2").value;
        var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(first_name == '') {
            alert( "First Name is required." );
            document.registerForm.first_name.focus() ;
            return false;
        } else if(last_name == '') {
            alert( "Last Name is required." );
            document.registerForm.last_name.focus() ;
            return false;
        } else if(user_email == '') {
            alert( "Email is required." );
            document.registerForm.user_email.focus() ;
            return false;
        } else if(!email_filter.test(user_email)){
            alert( "Enter valid email." );
            document.registerForm.user_email.focus() ;
            return false;
        } else if(password_1 == '') {
            alert("Password is required.");
            document.registerForm.password_1.focus() ;
            return false;
        } else if(password_1.length < 6) {
            alert("Password must be at least 6 characters long.");
            document.registerForm.password_1.focus() ;
            return false;
        } else if(password_1 !== password_2) {
            alert("The two passwords do not match.");
            document.registerForm.password_2.focus() ;
            return false;
        }
    }

    // RESET PASSWORD NEW PASSWORD  INPUT VALIDATION
    function resetPasswordNewPasswordForm() {
        var new_password = document.forms["resetPasswordNewPasswordForm"]["new_password"].value;
        var c_password   = document.forms["resetPasswordNewPasswordForm"]["c_password"].value;
        if(new_password == '') {
            alert( "New password is required." );
            document.resetPasswordNewPasswordForm.new_password.focus() ;
            return false;
        } else if(new_password.length < 6) {
            alert("Password must be at least 6 characters long.");
            document.resetPasswordNewPasswordForm.new_password.focus() ;
            return false;
        } else if(c_password == '') {
            alert( "Confirm password is required." );
            document.resetPasswordNewPasswordForm.c_password.focus() ;
            return false;
        } else if(new_password !== c_password) {
            alert( "The two passwords do not match." );
            document.resetPasswordNewPasswordForm.c_password.focus() ;
            return false;
        }
    }

    // CONTACT INPUT VALIDATION
    function contactValidation() {
        var first_name = document.forms["contactForm"]["first_name"].value;
        var last_name  = document.forms["contactForm"]["last_name"].value;
        var email = document.forms["contactForm"]["email"].value;
        var subject = document.forms["contactForm"]["subject"].value;
        var message = document.forms["contactForm"]["message"].value;
        var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(first_name == '') {
            alert( "First Name is required." );
            document.contactForm.first_name.focus() ;
            return false;
        } else if(last_name == '') {
            alert( "Last Name is required." );
            document.contactForm.last_name.focus() ;
            return false;
        } else if(email == '') {
            alert( "Email is required." );
            document.contactForm.email.focus() ;
            return false;
        } else if(!email_filter.test(email)){
            alert( "Enter valid email." );
            document.contactForm.email.focus() ;
            return false;
        }  if(subject == '') {
            alert( "Subject is required." );
            document.contactForm.subject.focus() ;
            return false;
        } else if(message == '') {
            alert( "Message is required." );
            document.contactForm.message.focus() ;
            return false;
        }
    }

    // USER DASHBOARD          USER DASHBOARD          USER DASHBOARD         USER DASHBOARD

    // SOURCE  INPUT VALIDATION
    function sourceValidation() {
		var user = document.forms["sourceForm"]["user"].value;
		var name = document.forms["sourceForm"]["name"].value;
        if(user == '') {
            alert( "User is required." );
            document.sourceForm.user.focus() ;
            return false;
        } else if(name == '') {
            alert( "Source Name is required." );
            document.sourceForm.name.focus() ;
            return false;
        }
    }

    // INCOME  INPUT VALIDATION
    function incomeValidation() {
		var user   = document.forms["incomeForm"]["user"].value;
		var source = document.forms["incomeForm"]["source"].value;
        var amount = document.forms["incomeForm"]["amount"].value;
        if(user == '') {
            alert( "User is required." );
            document.incomeForm.user.focus() ;
            return false;
        } else if(source == '') {
            alert( "Source is required." );
            document.incomeForm.source.focus() ;
            return false;
        } else if(amount == '') {
            alert( "Amount is required." );
            document.incomeForm.amount.focus() ;
            return false;
        } else if(isNaN(amount)) {
            alert( "Enter numeric value only." );
            document.incomeForm.amount.focus() ;
            return false;
        } 
    }

    // CATEGORY  INPUT VALIDATION
    function categoryValidation() {
		var user = document.forms["categoryForm"]["user"].value;
		var name = document.forms["categoryForm"]["name"].value;
        if(user == '') {
            alert( "User is required." );
            document.categoryForm.user.focus() ;
            return false;
        } else if(name == '') {
            alert( "Name is required." );
            document.categoryForm.name.focus() ;
            return false;
        }
    }

    // PRODUCT SERVICE  INPUT VALIDATION
    function productServiceValidation() {
		var user     = document.forms["productServiceForm"]["user"].value;
		var category = document.forms["productServiceForm"]["category"].value;
        var name     = document.forms["productServiceForm"]["name"].value;
        if(user == '') {
            alert( "User is required." );
            document.productServiceForm.user.focus() ;
            return false;
        } else if(category == '') {
            alert( "Category is required." );
            document.productServiceForm.category.focus() ;
            return false;
        } else if(name == '') {
            alert( "Name is required." );
            document.productServiceForm.name.focus() ;
            return false;
        } 
    }

    // EXPENSE  INPUT VALIDATION
    function expenseValidation() {
  
		var user   = document.forms["expenseForm"]["user"].value;
        var income = document.forms["expenseForm"]["income"].value;
        var product_or_service = document.forms["expenseForm"]["product_or_service"].value;
        var price = document.forms["expenseForm"]["price"].value;

        if(user == '') {
            alert( "User is required." );
            document.expenseForm.user.focus() ;
            return false;
        } else if(income == '') {
            alert( "Income is required." );
            document.expenseForm.income.focus() ;
            return false;
        } else if(product_or_service == '') {
            alert( "Product or Service is required." );
            document.expenseForm.product_or_service.focus() ;
            return false;
        } else if(price == '') {
            alert( "Price is required." );
            document.expenseForm.price.focus() ;
            return false;
        } else if(isNaN(price)) {
            alert( "Enter numeric value only." );
            document.expenseForm.price.focus() ;
            return false;
		}
    }

    // PROJECTED EXPENSE  INPUT VALIDATION
    function projectedExpenseValidation() {
		var user		   = document.forms["projectedExpenseForm"]["user"].value;
		var projected_date = document.forms["projectedExpenseForm"]["projected_date"].value;
        var product_service_id = document.forms["projectedExpenseForm"]["product_service_id"].value;
        var projected_amount = document.forms["projectedExpenseForm"]["projected_amount"].value;
        if(user == '') {
            alert( "User is required." );
            document.projectedExpenseForm.user.focus() ;
            return false;
        } else if(projected_date == '') {
            alert( "Date is required." );
            document.projectedExpenseForm.projected_date.focus() ;
            return false;
        } else if(product_service_id == '') {
            alert( "Product or Service is required." );
            document.projectedExpenseForm.product_service_id.focus() ;
            return false;
        } else if(projected_amount == '') {
            alert( "Amount is required." );
            document.projectedExpenseForm.projected_amount.focus() ;
            return false;
        } else if(isNaN(projected_amount)) {
            alert( "Enter numeric value only." );
            document.projectedExpenseForm.projected_amount.focus() ;
            return false;
        }
    }

    // PROFILE  INPUT VALIDATION
    function profileValidation() {
        var first_name = document.forms["profileForm"]["first_name"].value;
        var last_name  = document.forms["profileForm"]["last_name"].value;
        var email      = document.forms["profileForm"]["email"].value;
        var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(first_name == '') {
            alert( "First Name is required." );
            document.profileForm.first_name.focus() ;
            return false;
        } else if(last_name == '') {
            alert( "Last Name is required." );
            document.profileForm.last_name.focus() ;
            return false;
        } else if(email == '') {
            alert( "Email is required." );
            document.profileForm.email.focus() ;
            return false;
        } else if(!email_filter.test(email)){
            alert( "Enter valid email." );
            document.profileForm.email.focus() ;
            return false;
        }
    }

    // DELETE ACCOUNT  INPUT VALIDATION
    function deleteAccountValidation() {
        var c_password = document.forms["deleteAccountForm"]["c_password"].value;
        if(c_password == '') {
            alert( "Password is required." );
            document.deleteAccountForm.c_password.focus() ;
            return false;
        }
    }

    // CHANGE PASSWORD  INPUT VALIDATION
    function changePasswordValidation() {
        var old_password = document.forms["changePasswordForm"]["old_password"].value;
        var new_password = document.forms["changePasswordForm"]["new_password"].value;
        var c_password   = document.forms["changePasswordForm"]["c_password"].value;
        if(old_password == '') {
            alert( "Old Password is required." );
            document.changePasswordForm.old_password.focus() ;
            return false;
        } else if(new_password == '') {
            alert( "New Password is required." );
            document.changePasswordForm.new_password.focus() ;
            return false;
        } else if(new_password.length < 6) {
            alert("Password must be at least 6 characters long.");
            document.changePasswordForm.new_password.focus() ;
            return false;
        } else if(c_password == '') {
            alert( "Confirm Password is required." );
            document.changePasswordForm.c_password.focus() ;
            return false;
        } else if(new_password !== c_password) {
            alert("The two passwords do not match.");
            document.changePasswordForm.c_password.focus() ;
            return false;
        }
    }

    // HELP  INPUT VALIDATION
    function helpValidation() {
        var message = document.forms["help"]["message"].value;
        if(message == '') {
            alert( "Message is required." );
            document.help.message.focus() ;
            return false;
        }
    }

    // USER  INPUT VALIDATION
    function userValidation() {
        var first_name = document.forms["userForm"]["first_name"].value;
        var last_name  = document.forms["userForm"]["last_name"].value;
        var email      = document.forms["userForm"]["email"].value;
        var is_admin   = document.forms["userForm"]["is_admin"].value;
        var password_1 = document.forms["userForm"]["password_1"].value;
        var password_2 = document.forms["userForm"]["password_2"].value;
        if(first_name == '') {
            alert( "First Name is required." );
            document.userForm.first_name.focus() ;
            return false;
        } else if(last_name == '') {
            alert( "Last Name is required." );
            document.userForm.last_name.focus() ;
            return false;
        } else if(email == '') {
            alert("Email is required.");
            document.userForm.email.focus() ;
            return false;
        } else if(is_admin == '') {
            alert( "Admin is required." );
            document.userForm.is_admin.focus() ;
            return false;
        } else if(password_1 == '') {
            alert( "Password is required." );
            document.userForm.password_1.focus() ;
            return false;
        } else if(password_1.length < 6) {
            alert("Password must be at least 6 characters long.");
            document.userForm.password_1.focus() ;
            return false;
        } else if(password_2 == '') {
            alert( "Confirm Password is required." );
            document.userForm.password_2.focus() ;
            return false;
        } else if(password_1 !== password_2) {
            alert("The two passwords do not match.");
            document.userForm.password_1.focus() ;
            return false;
        }
    }

    // CHANGE PASSWORD INPUT VALIDATION
    function changePasswordValidation() {
        var new_password = document.forms["changePasswordForm"]["new_password"].value;
        var c_password  = document.forms["changePasswordForm"]["c_password"].value;
        if(new_password == '') {
            alert( "Password is required." );
            document.changePasswordForm.new_password.focus() ;
            return false;
        } else if(new_password.length < 6) {
            alert("Password must be at least 6 characters long.");
            document.changePasswordForm.new_password.focus() ;
            return false;
        } else if(c_password == '') {
            alert( "Confirm Password is required." );
            document.changePasswordForm.c_password.focus() ;
            return false;
        } else if(new_password !== c_password) {
            alert("The two passwords do not match.");
            document.changePasswordForm.new_password.focus() ;
            return false;
        }
    }

    // EDIT USER INPUT VALIDATION
    function editUserValidation() {
        var first_name = document.forms["editUserForm"]["first_name"].value;
        var last_name  = document.forms["editUserForm"]["last_name"].value;
        var email      = document.forms["editUserForm"]["email"].value;
        var is_admin   = document.forms["editUserForm"]["is_admin"].value;
        if(first_name == '') {
            alert( "First Name is required." );
            document.editUserForm.first_name.focus() ;
            return false;
        } else if(last_name == '') {
            alert( "Last Name is required." );
            document.editUserForm.last_name.focus() ;
            return false;
        } else if(email == '') {
            alert("Email is required.");
            document.editUserForm.email.focus() ;
            return false;
        } else if(is_admin == '') {
            alert( "Admin is required." );
            document.editUserForm.is_admin.focus() ;
            return false;
        }
    }

    // SHOW AND HIDE FILTER FORM 
    function shoWprojectedFilter() {
        var filter = document.getElementById("filter");
        if(filter.style.display === "block") {
            filter.style.display = "none";
        } else {
            filter.style.display = "block";
        }
    }
    



