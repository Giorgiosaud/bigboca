/* Scroll Magic Init*/

function setCarouselHeight(id) {
    var slideHeight = [];
    jQuery(id + ' .item').each(function () {
        // add all slide heights to an array
        slideHeight.push(jQuery(this).height());
    });

    // find the tallest item
    max = Math.max.apply(null, slideHeight);

    // set the slide's height
    jQuery(id + ' .carousel-inner').each(function () {
        jQuery(this).css('height', max + 'px');
    });
}

var elementosComunes = {};
function resizeElementOnLoadAndResize() {

    jQuery('.fullheight').height(elementosComunes.alturaPantalla - elementosComunes.alturaFooter);
    jQuery('.logoContainer').width(jQuery('.logoContainer').height());

}
jQuery(window).resize(function () {
    setCarouselHeight('#carrusel_ProductSampling');
    resizeElementOnLoadAndResize();
});
jQuery( window ).scroll(function() {
    jQuery('.hiddenMenuElements').slideUp('slow');
});
jQuery(document).ready(function ($) {
    controller = new ScrollMagic.Controller({
        globalSceneOptions: {
            triggerHook: (0.8)
        }
    });
    elementosComunes.alturaFooter = jQuery('.footer').outerHeight();
    elementosComunes.alturaPantalla = jQuery(window).height();
    setCarouselHeight('#carrusel_ProductSampling');
    resizeElementOnLoadAndResize();
    elementosComunes.alturaLogo = jQuery('.logoContainer').height();
    elementosComunes.anchoMenuCerrado = jQuery('.menuPrincipal').width();

    //acciones de click
    $(document).on('click touchstart', '.dropMenu', function (event) {
        event.preventDefault();
        $('.hiddenMenuElements').slideToggle('slow');
    });
    $(document).on('click touchstart', '.clickable', function (event) {
        event.preventDefault();
        if($(this).data("target")) {
            console.log($(this));
            console.log($(this).data("target"));
            $('body').animate({scrollTop: ($($(this).data("target")).offset().top)}, 'slow')
            $('body').animatescroll({element: $(this).data("target")});
            $(this).parent().slideToggle('slow');
        }
        else{
            console.log($(this));

        }
    });
    $(document).on('click touchstart', '.contacto', function (e) {
        e.preventDefault();

        var animacionContactanos = new TimelineMax();
        ofsetLeft = ($('.contactUs').offset().left == 0) ? '100%' : '0';
        animacionContactanos.insert(
            TweenMax.to($('.contactUs'), 1.5, {
                left: ofsetLeft
            })
        )

    });
    var tl1 = new TimelineMax();
    tl1.add(TweenMax.fromTo(
        $('.logoContainer'), 1.5,
        {
            marginTop: -2 * elementosComunes.alturaLogo + "px",
            opacity: 0,
            ease: Cubic.easeOut
        },
        {
            marginTop: 10,
            opacity: 1
        }

        , 'easeinour'))
        .add(TweenMax.from(
            $('.scrollDown'), 1, {
                opacity: 0,
                marginTop: -2 * elementosComunes.alturaLogo
            }
        )
    );
    var firstAnimation = new TimelineMax();

    firstAnimation.insert(TweenMax.to($('.logoContainer'), 1, {height: 0, width: 0}));
    firstAnimation.insert(TweenMax.fromTo($('.scrollDown'), 4, {opacity: 1}, {opacity: 0}))
    firstAnimation.insert(TweenMax.fromTo($('.logoContainer'), 4, {opacity: 1}, {opacity: 0}))
    firstAnimation.insert(TweenMax.from($('.mensajeInicial:eq(0)'), 1, {marginTop: "-8em"}));
    firstAnimation.insert(TweenMax.from($('.se-slope:first-child .se-content'), 1, {y: "-14%"}));
    firstAnimation.insert(TweenMax.from($('.menuPrincipal'), 1, {marginLeft: -2 * elementosComunes.anchoMenuCerrado}));
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger1",
        duration: $('.se-container :nth-of-type(1)').height()
    })
        .setTween(firstAnimation)
        .addTo(controller);
    var secondAnimation = new TimelineMax();
    secondAnimation.insert(TweenMax.from($('.se-container').first().find('.iconoLeft:eq(0)'), 1, {width: 0}));
    var scene = new ScrollMagic.Scene({
        triggerElement: ".se-slope:nth-of-type(1)",
        duration: jQuery('.se-container').find('.iconoLeft:eq(0)').closest('.se-content').outerHeight()
    })
        .setTween(secondAnimation)
        //.addIndicators({name: "Mostrar Us"})
        .addTo(controller);
    var thirdAnimation = new TimelineMax();
    thirdAnimation.insert(TweenMax.from($('.iconoRight'), 1, {width: 0}));
    var scene = new ScrollMagic.Scene({
        triggerElement: '.se-slope:nth-of-type(2)',
        duration: jQuery('.se-container').find('.iconoRight:eq(0)').closest('.se-content').first().outerHeight()
    })
        .setTween(thirdAnimation)
        //.addIndicators({name: "Mostrar We Speak The Language"})
        .addTo(controller);
    var fourthAnimation = new TimelineMax();
    fourthAnimation.insert(TweenMax.from($('.se-container').first().find('.iconoLeft:eq(1)'), 1, {width: 0}));
    fourthAnimation.insert(TweenMax.from($('.se-slope:eq(2)'), 1, {y: "-14%"}));
    var scene = new ScrollMagic.Scene({
        triggerElement: '.se-slope:nth-of-type(3)',
        duration: jQuery('.se-container').find('.iconoLeft:eq(1)').closest('.se-content').outerHeight()
    })
        .setTween(fourthAnimation)
        .addIndicators({name: "Mensaje As Effective"})
        .addTo(controller);
    var fifthAnimation = new TimelineMax();
    fifthAnimation.insert(TweenMax.from($('.mensajeInicial:eq(1)'), 1, {marginTop: "-10em"}));

    var scene = new ScrollMagic.Scene({
        triggerElement: '.se-container:nth-of-type(3)',
        duration: jQuery('.se-container').find('.iconoLeft:eq(1)').closest('.se-content').outerHeight()
    })
        .setTween(fifthAnimation)
        //.addIndicators({name: "Capabilities"})
        .addTo(controller);

    var totalAnimation = new TimelineMax();

    totalAnimation.insert(TweenMax.fromTo($('.menuPrincipal'), 1, {top: '7%'},{top: '10%'}));
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger1",
        duration: $('#content-wrapper').height()
    })
        .setTween(totalAnimation)
        //.addIndicators({name: "Mensaje As Effective"})
        .addTo(controller);

});

