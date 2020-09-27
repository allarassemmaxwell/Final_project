
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("nav").style.background = "rgba(0,0,0,0.3)";
        } else {
            document.getElementById("nav").style.background = "rgba(0,0,0,0)";
        }
    }


    