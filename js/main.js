$(document).ready(function() {
    // OPEN THE NAV MENU
    $('#menu').click(function() {
        $('#nav').slideDown('#hide-mobile');
    });
    // CLOSE THE NAV MENU
    $('#exit').click(function() {
        $('#nav').slideUp('#hide-mobile');
    });


    // CAROUSEL
    $('.carousel').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpedd: 1000,
        
    });



    // TESTIMONIAL
    $(".testimonial-carousel").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true
        
        // prevArrow: $(".testimonial-carousel-controls .prev"),
        // nextArrow: $(".testimonial-carousel-controls .next")
    });


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


