$(document).ready(function() {
   
    // LOGIN VALIDATION
    $(".login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: 'required'
        }
    });

    
    // CREATE ACCOUNT VALIDATION
    $(".register-form").validate({
        rules: {
            first_name: 'required',
            last_name: 'required',
            email: {
                required: true,
                email: true
            },
            password1: {
                required: true,
                minlength: 6
            },
            password2: {
                required: true,
                equalTo : "#password1"
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



    
});


