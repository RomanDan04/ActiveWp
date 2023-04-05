$(function(){

    /* fixed header */
    let header = $("#header");
    let intro = $("#intro");
    let introH = intro.innerHeight();
    let scrollPos = $(window).scrollTop();
    let nav = $("#nav");
    let slider = $("#reviews__slider")

    $(window).on("scroll load resize",function(){
        introH = intro.innerHeight();
        scrollPos=$(this).scrollTop();

        checkScroll(scrollPos,introH);
    });

    function checkScroll(scrollPos,introH){
        if(scrollPos >= introH-90){
            header.addClass("fixed");
        }else{
            header.removeClass("fixed");
        }
    }

    /* smoth scroll */
    $("[data-scroll]").on("click",function(event){
        event.preventDefault();

        let elementID = $(this).data('scroll');
        let elementOffset = $(elementID).offset().top;
        elementOffset=elementOffset-90;

        $("html, body").animate({
            scrollTop: elementOffset
        });


        nav.removeClass("show");
    });

    /* Toggle click */
    $("#navToggle").on("click",function(){
        nav.toggleClass("show");
    });

    /* reviews slider  https://kenwheeler.github.io/slick/ */
    slider.slick({
        infite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: false,
        arrows: false,
        dots: true
    });

    /*logo onclick*/
    $(".img__logo").on("click",function(){
        $("html, body").animate({
            scrollTop: 0
        });
    })
});