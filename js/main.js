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



    
});

