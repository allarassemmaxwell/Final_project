$(document).ready(function() {
   
    // LOGIN VALIDATION
    $(".login-form").validate({
        rules: {
            user_email: {
                required: true,
                email: true
            },
            user_password: 'required'
        }
    });

    
    // CREATE ACCOUNT VALIDATION
    $(".register-form").validate({
        rules: {
            first_name: 'required',
            last_name: 'required',
            user_email: {
                required: true,
                email: true
            },
            password_1: {
                required: true,
                minlength: 6
            },
            password_2: {
                required: true,
                equalTo : "#password_1"
            }
        }
        // submitHandler: function() { alert("Submitted!") }
    });



    // RESET PASSWORD VALIDATION
    $(".reset-password-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        }
    });



    // CONTACT FORM
    $(".contact-form").validate({
        rules: {
            first_name: 'required',
            last_name: 'required',
            subject: 'required',
            message: 'required',
            email: {
                required: true,
                email: true
            }
        }
    });




    
});


