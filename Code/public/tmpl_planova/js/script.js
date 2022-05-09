jQuery(function ($) {

    'use strict';
    var marker = 'tmpl_planova/img/icon_pin.png';
    // -------------------------------------------------------------
    //	1. Product Carousel
    //	2. Partner Carousel
    //	3. Client Testimonial Carousel
    //	4. Latest News Carousel
    //	5. Go to Top
    //	6. Revolution Slider
    //	7. Accordion
    //	8. pretty Photo
    // -------------------------------------------------------------

    (function () {

    }());


    // =============================================
    //  Sticky menu
    // =============================================

    var nav = $('.mainnav-wrapper');
    var scrolled = false;

    $(window).scroll(function () {

        if (110 < $(window).scrollTop() && !scrolled) {
            nav.addClass('sticky animated fadeInDown').animate({'margin-top': '0px'});

            scrolled = true;
        }

        if (110 > $(window).scrollTop() && scrolled) {
            nav.removeClass('sticky animated fadeInDown').css('margin-top', '0px');

            scrolled = false;
        }
    });


    // -------------------------------------------------------------
    //  Product Carousel
    // -------------------------------------------------------------

    (function () {

        $(".css-product").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            pagination: false,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]
        });

        $(".css-product-navigation .next").click(function () {
            $(".css-product").trigger('owl.next');
        })

        $(".css-product-navigation .prev").click(function () {
            $(".css-product").trigger('owl.prev');
        })

    }());


    // -------------------------------------------------------------
    // Partner Carousel
    // -------------------------------------------------------------


    (function () {

        $(".branches").owlCarousel({
            margin: 10,
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            responsiveClass: true,
            items:6,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: false
                },
                480: {
                    items: 3,
                    nav: false
                },
                769: {
                    items: 6,
                    nav: false
                }
            }
        });

        // Custom Navigation Events
        $(".branches-navigation .next").click(function () {
            $(".branches").trigger('owl.next');
        })
        $(".branches-navigation .prev").click(function () {
            $(".branches").trigger('owl.prev');
        })


    }());


    // -------------------------------------------------------------
    // Client Testimonial Carousel
    // -------------------------------------------------------------


    (function () {

        $(".gav-news").owlCarousel({
            autoPlay: 5000, //Set AutoPlay to 3 seconds
            pagination: false,
            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1]
        });

        // Custom Navigation Events
        $(".gav-news-navigation .next").click(function () {
            $(".gav-news").trigger('owl.next');
        });
        $(".gav-news-navigation .prev").click(function () {
            $(".gav-news").trigger('owl.prev');
        });

    }());

    // -------------------------------------------------------------
    // Client Testimonial Carousel
    // -------------------------------------------------------------


    (function () {

        $(".about-us").owlCarousel({
            autoPlay: 5000, //Set AutoPlay to 3 seconds
            pagination: false,
            navigation: true,
            navigationText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1]
        });

    }());


    // -------------------------------------------------------------
    // Latest News Carousel
    // -------------------------------------------------------------

    (function () {

        $(".latest-news").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            pagination: false,
            items: 2,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 2]
        });

        $(".latest-news-navigation .next").click(function () {
            $(".latest-news").trigger('owl.next');
        })

        $(".latest-news-navigation .prev").click(function () {
            $(".latest-news").trigger('owl.prev');
        })

    }());


    // -------------------------------------------------------------
    // Go to Top
    // -------------------------------------------------------------

    (function () {

        $.scrollUp({
            scrollText: '<i class="fas fa-chevron-up"></i>',
            topDistance: '300',
            animation: 'fade',
            animationInSpeed: 200,
            animationOutSpeed: 200,
        });
    }());


    // -------------------------------------------------------------
    // Revolution Slider
    // -------------------------------------------------------------
    (function () {

        jQuery('.tp-banner').revolution(
            {
                delay: 9000,
                startwidth: 665,
                startheight: 470,
                hideThumbs: 10,
                navigationType: "none",
                hideTimerBar: "on",
            });

    }());


    // -------------------------------------------------------------
    // Accordion
    // -------------------------------------------------------------
    (function () {

        $('.collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-minus-square"></i>');
        });
        $('.collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-plus-square"></i>');
        });

    }());


    // -------------------------------------------------------------
    // PrettyPhoto
    // -------------------------------------------------------------

    (function () {

        jQuery(document).ready(function () {
            jQuery('a[data-gal]').each(function () {
                jQuery(this).attr('rel', jQuery(this).data('gal'));
            });
            jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
                animationSpeed: 'slow',
                theme: 'light_square',
                slideshow: 3000,
                social_tools: false
            });
        });

    }());
    if ($('#map_canvas').length > 0) {
        new Maplace({
            map_div: '#map_canvas',
            controls_type: 'dropdown',
            view_all_text: 'Alle Standorte',
            controls_on_map: false,
            map_options: {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                zoom: 9
            },
            locations: [
                {
                    lat: 47.3917118,
                    lon: 8.0439059,
                    title: 'planova human capital ag - Aarau',
                    html: '<h2 style="margin-bottom:0px;">planova human capital ag - Aarau</h2> Igelweid 18 <br> 5000 Aarau',
                    icon: marker
                },
                {
                    lat: 47.476300,
                    lon: 8.306490,
                    title: 'planova human capital ag - Baden',
                    html: '<h2 style="margin-bottom:0px;">planova human capital ag - Baden</h2> Langhaus 4 <br> 5400 Baden',
                    icon: marker
                },
                {
                    lat: 47.5572494,
                    lon: 7.5857825,
                    title: 'planova human capital ag - Basel',
                    html: '<h2 style="margin-bottom:0px;">planova human capital ag - Basel</h2> Gerbergasse 14 <br> 4001 Basel',
                    icon: marker
                },
                {
                    lat: 46.948260,
                    lon: 7.445720,
                    title: 'planova human capital ag - Bern',
                    html: '<h2 style="margin-bottom:0px;">planova human capital ag - Bern</h2> Marktgasse 32 <br> 3011 Bern',
                    icon: marker
                },
                {
                    lat: 47.048490,
                    lon: 8.303130,
                    title: 'planova human capital ag - Luzern',
                    html: '<h2 style="margin-bottom:0px;">planova human capital ag - Luzern</h2> Hallwilerweg 5 <br> 6003 Luzern',
                    icon: marker
                },
                {
                    lat: 47.501330,
                    lon: 8.724830,
                    title: 'planova human capital ag - Winterthur',
                    html: '<h2 style="margin-bottom:0px;">planova human capital ag - Winterthur</h2> Bahnhofplatz 17 <br> 8400 Winterthur',
                    icon: marker
                },
                {
                    lat: 47.172670,
                    lon: 8.514550,
                    title: 'planova human capital ag - Zug',
                    html: '<h2 style="margin-bottom:0px;">planova human capital ag - Zug</h2> Alpenstrasse 11 <br> 6300 Zug',
                    icon: marker
                },
                {
                    lat: 47.388070,
                    lon: 8.523890,
                    title: 'planova human capital ag - Zürich',
                    html: '<h2 style="margin-bottom:0px;">planova human capital ag - Zürich</h2> Heinrichstrasse 223 <br> 8005 Zürich',
                    icon: marker
                }
            ]
        }).Load();
    }
    // if ($('#map_canvas')[0]) {
    //     var geocoder = new google.maps.Geocoder();
    //     var map;
    //     var elevator;
    //     var myOptions = {
    //         zoom: 8
    //     };
    //     map = new google.maps.Map($('#map_canvas')[0], myOptions);
    //
    //
    //     setCountryToSelect('Schweiz');
    // }
    //
    //
    // function setCountryToSelect(countryToSelect) {
    //     geocoder.geocode({'address': countryToSelect}, function (results, status) {
    //         if (status == google.maps.GeocoderStatus.OK) {
    //             map.setCenter(results[0].geometry.location);
    //             var addresses = ['Heinrichstrasse 223, 8005 Zürich, Schweiz', 'Alpenstrasse 11, 6300 Zug, Schweiz',
    //                 'Hallwilerweg 5, 6003 Luzern, Schweiz', 'Marktgasse 32, 3011 Bern, Schweiz',
    //                 'Langhaus 4, 5400 Baden, Schweiz', 'Bahnhofplatz 17, 8400 Winterthur, Schweiz'];
    //
    //             for (var x = 0; x < addresses.length; x++) {
    //                 $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address=' + addresses[x] + '&sensor=false', null, function (data) {
    //                     if (data.results[0] != '' && data.results[0] != undefined) {
    //                         var p = data.results[0].geometry.location
    //                         var latlng = new google.maps.LatLng(p.lat, p.lng);
    //                         new google.maps.Marker({
    //                             position: latlng,
    //                             center: latlng,
    //                             map: map
    //                         });
    //                     }
    //                 });
    //             }
    //
    //         } else {
    //             alert("Error: " + status);
    //         }
    //     });
    // }

});


// =============================================
//  Dropdown menu
// =============================================


(function () {


    var timer;

    $('li.dropdown').on('mouseenter', function (event) {


        event.stopImmediatePropagation();
        event.stopPropagation();

        $(this).removeClass('open menu-animating').addClass('menu-animating');
        var that = this;


        if (timer) {
            clearTimeout(timer);
            timer = null;
        }


        timer = setTimeout(function () {

            $(that).removeClass('menu-animating');
            $(that).addClass('open');

        }, 300);   // 300ms as animation end time


    });

    // on mouse leave

    $('li.dropdown').on('mouseleave', function (event) {

        var that = this;

        $(this).removeClass('open menu-animating').addClass('menu-animating');


        if (timer) {
            clearTimeout(timer);
            timer = null;
        }

        timer = setTimeout(function () {

            $(that).removeClass('menu-animating');
            $(that).removeClass('open');

        }, 300);  // 300ms as animation end time

    });

}());
	





