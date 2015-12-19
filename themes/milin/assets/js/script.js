/**
 * Created by pavitaj on 21/7/15.
 */
$(document).ready(function(){
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    $('.slide').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: false,
    });

    $(window).scroll(function() {
        if ($(document).scrollTop() > 60) {
            $('nav').addClass('shrink');
        } else {
            $('nav').removeClass('shrink');
        }
    });
    
    function setHeight() {
        windowHeight = $(window).innerHeight()-70 ;
        $('.navbar-collapse').css('max-height', windowHeight);
    };
    setHeight();

    $(window).resize(function() {
        setHeight();
    });



        $('#magazine').bind('click', function() {
            Fresco.show([

                {
                    url: 'assets/img/p1.jpg',
                    caption: "Dorhout Mees - S/S 2015",
                    options: {
                        thumbnail: 'assets/img/thumbnails/p1.jpg'
                    }
                },
                {
                    url: 'assets/img/p2.jpg',
                    caption: "Dorhout Mees - S/S 2015",
                    options: {
                        thumbnail: 'assets/img/thumbnails/p2.jpg'
                    }
                }
            ]);

    });
    $('#magazine1').bind('click', function() {
        Fresco.show([

            {
                url: 'assets/img/p1.jpg',
                caption: "Dorhout Mees - S/S 2015",
                options: {
                    thumbnail: 'assets/img/thumbnails/p1.jpg'
                }
            },
            {
                url: 'assets/img/p2.jpg',
                caption: "Dorhout Mees - S/S 2015",
                options: {
                    thumbnail: 'assets/img/thumbnails/p2.jpg'
                }
            }
        ]);

    });
    $('#magazine2').bind('click', function() {
        Fresco.show([

            {
                url: 'assets/img/p1.jpg',
                caption: "Dorhout Mees - S/S 2015",
                options: {
                    thumbnail: 'assets/img/thumbnails/p1.jpg'
                }
            },
            {
                url: 'assets/img/p2.jpg',
                caption: "Dorhout Mees - S/S 2015",
                options: {
                    thumbnail: 'assets/img/thumbnails/p2.jpg'
                }
            }
        ]);

    });
    $('#magazine4').bind('click', function() {
        Fresco.show([

            {
                url: 'assets/img/p1.jpg',
                caption: "Dorhout Mees - S/S 2015",
                options: {
                    thumbnail: 'assets/img/thumbnails/p1.jpg'
                }
            },
            {
                url: 'assets/img/p2.jpg',
                caption: "Dorhout Mees - S/S 2015",
                options: {
                    thumbnail: 'assets/img/thumbnails/p2.jpg'
                }
            }
        ]);

    });


});