$(document).ready(function () {

    // General - Quote in the console
    console.log("“The public have an insatiable curiosity to know everything, except what is worth knowing.” - Oscar Wilde");

    // General - Enable ASCII Printer on random
    printAsciiRandom();

    // General - Change page name on blur (not on mobile)
    if (!isMobile()) {
        originalTitle = $(document).find("title").text();

        $(window).focus(function () {
            document.title = originalTitle;
        });

        $(window).blur(function () {
            document.title = 'Hey, come back!';
            setTimeout(function () {
                document.title = originalTitle;
            }, 3500);
        });
    }

    // Header - Menu
    $("header .clickToReveal").click(function () {
        if ($('header .toBeRevealed').is(':visible')) {
            $("header .toBeRevealed").hide(250);
        } else {
            $("header .toBeRevealed").show(250);
        }
    });

    $("main").click(function () {
        if ($('header .toBeRevealed').is(':visible')) {
            $("header .toBeRevealed").hide(250);
        }
    });

    $(window).scroll(function () {
        if ($('header .toBeRevealed').is(':visible')) {
            $("header .toBeRevealed").hide(250);
        }
    });

    // Skills - Show on toggle
    $("#hp-skills .clickToReveal").click(function () {
        $("#hp-skills .clickToReveal").slideToggle(250);
        $("#hp-skills .toBeRevealed").slideToggle(250);
    });

    // Testimonials - Slider
    var swiper = new Swiper('.testimonials.swiper-slider', {
        autoHeight: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});