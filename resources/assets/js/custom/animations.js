jQuery(document).ready(function($) {
	var firstAnimation = new TimelineMax();

firstAnimation.insert(TweenMax.to($('.logoContainer'), 1, {height: 0, width: 0}));
firstAnimation.insert(TweenMax.fromTo($('.scrollDown'), 4, {opacity: 1}, {opacity: 0}))
firstAnimation.insert(TweenMax.fromTo($('.logoContainer'), 4, {opacity: 1}, {opacity: 0,display:'none'}))
firstAnimation.insert(TweenMax.to($('.logoText'), 1, {opacity: 0}));
firstAnimation.insert(TweenMax.to($('.mensajeInicio'),4,{marginTop:'18em'}));
firstAnimation.insert(TweenMax.from($('.se-slope:first-child .se-content:eq(0)'), 1, {y: "-14%"}));
firstAnimation.insert(TweenMax.from($('.menuPrincipal'), 1, {marginLeft: -2 * elementosComunes.anchoMenuCerrado}));
firstAnimation.insert(TweenMax.fromTo($('.scrollDown'), 1, {bottom:$('.scrollDown').outerHeight()+$('.scrollDown> img').outerHeight()},{bottom:-1*($('.scrollDown').outerHeight()+$('.scrollDown> img').outerHeight())}));
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
    //fourthAnimation.insert(TweenMax.from($('.se-slope:eq(2)'), 1, {y: "-40%"}));
    var scene = new ScrollMagic.Scene({
        triggerElement: '.se-slope:nth-of-type(3)',
        duration: jQuery('.se-container').find('.iconoLeft:eq(1)').closest('.se-content').outerHeight()
    })
    .setTween(fourthAnimation)
        //.addIndicators({name: "Mensaje As Effective"})
        .addTo(controller);
        var fifthAnimation = new TimelineMax();
        fifthAnimation.insert(TweenMax.from($('.fixedDown'), 1, {height: 0,'padding':0}));

        var scene = new ScrollMagic.Scene({
            triggerElement: '.capabilitiesContainer',
            duration: jQuery('.se-container').find('.iconoLeft:eq(1)').closest('.se-content').outerHeight()
        })
        .setTween(fifthAnimation)
        //.addIndicators({name: "Capabilities"})
        .addTo(controller);

        var totalAnimation = new TimelineMax();

        totalAnimation.insert(TweenMax.fromTo($('.menuPrincipal'), 1, {top: '7%'}, {top: '10%'}));
        var scene = new ScrollMagic.Scene({
            triggerElement: "#trigger1",
            duration: $('#content-wrapper').height()
        })
        .setTween(totalAnimation)
        //.addIndicators({name: "Mensaje As Effective"})
        .addTo(controller);