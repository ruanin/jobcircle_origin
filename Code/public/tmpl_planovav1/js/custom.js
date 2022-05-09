
let mainNav = document.getElementById("js-menu");
let navBarToggle = document.getElementById("js-navbar-toggle");
navBarToggle.addEventListener("click", function () {
    mainNav.classList.toggle("active");
});

$('.header').on('click', '.search-toggle', function (e) {
    var selector = $(this).data('selector');

    $(selector).toggleClass('show').find('.search-input').focus();
    $(this).toggleClass('active');

    e.preventDefault();
});


/* ========================================== 
 scrollTop() >= 300
 Should be equal the the height of the header
 ========================================== */

$(window).scroll(function () {
    if ($(window).scrollTop() >= 0) {
        $('header').addClass('fixed-header');
    } else {
        $('header').removeClass('fixed-header');
    }
});

$(window).scroll(function () {
    if ($(window).scrollTop() <= 10) {

        $('header').removeClass('fixed-header');
    }
});


$(document).ready(function () {
    /******************************
     BOTTOM SCROLL TOP BUTTON
     ******************************/

    // declare variable
    var scrollTop = $(".scrollTop");

    $(window).scroll(function () {
        // declare variable
        var topPos = $(this).scrollTop();

        // if user scrolls down - show scroll to top button
        if (topPos > 100) {
            $('.scrollTop').css("opacity", "1");

        } else {
            $('.scrollTop').css("opacity", "0");
        }

    }); // scroll END

    //Click event to scroll to top
    $('.scrollTop').click(function () {
        //alert("");
        $('html, body').animate(
                // alert("");
                        {

                            scrollTop: 0
                        }, 800);

                return false;

            }); // click() scroll top EMD

}); // ready() END





