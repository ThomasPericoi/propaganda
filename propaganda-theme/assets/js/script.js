class Page {
    constructor() {
        this.setVariables();
        $(window).on("resize", this.setVariables.bind(this));
    }

    setVariables() {
        $("html").css({
            "--viewport-height": $(window).outerHeight() + "px",
            "--header-height": $("header.header").outerHeight() + "px",
        });
    }
}

$(document).ready(function () {
    new Page();

    // General - Quote in the console
    console.log("This theme was made by Thomas Pericoi - https://thomaspericoi.com/");

    // General - Enable ASCII Printer on random
    printRandomAscii();

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

    $("#hp-skills .grid-item").click(function () {
        $("#hp-skills .clickToReveal").hide(250);
        $("#hp-skills .toBeRevealed").show(250);
        $('html, body').animate({
            scrollTop: $("#extra-skills").offset().top
        }, 250);
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