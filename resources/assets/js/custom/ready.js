jQuery(document).ready(function ($) {
    $('#formularioDeContacto').submit(function(event){
        return false;
        event.preventDefault;
        console.log('Enviado');
    });
    $('#submitForm').click(function(event) {
       event.preventDefault;
       console.log('Enviado');
   });
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
    $(document).on('click touchstart', '.showChildrensButton2', function (event) {
        event.preventDefault();
        var that = $(this);
        //jQuery('.showChildrensButton2').parent().siblings('.hiddenChildrens').
        //console.log(that.parent().siblings('.hiddenChildrens'));
        $(this).parent().siblings('.hiddenChildrens').slideToggle('slow', function () {
            if (!$(this).is(":visible")) {
                console.log('aaa');
                that.text('Show more +');

            }
            else {
                console.log('bbb');
                that.text('Show Less -');
            }
        });

    });
    $(document).on('click touchstart', '.showChildrensButton', function (event) {
        event.preventDefault();
        var that = $(this);
        //console.log(that.parent().siblings('.hiddenChildrens'));
        $(this).parent().parent().parent().siblings('.hiddenChildrens').slideToggle('slow', function () {
            if (!$(this).is(":visible")) {
                console.log('aaa');
                that.text('Show more +');

            }
            else {
                console.log('bbb');
                that.text('Show Less -');
            }
        });

    });
    $(document).on('click touchstart', '.dropMenu', function (event) {
        event.preventDefault();
        $('.hiddenMenuElements').slideToggle('slow');
    });
    $(document).on('click touchstart', '.clickable', function (event) {
        event.preventDefault();
        if ($(this).data("target")) {
            console.log($(this));
            console.log($(this).data("target"));
            $('body').animate({scrollTop: ($($(this).data("target")).offset().top)}, 'slow')
            $('body').animatescroll({element: $(this).data("target")});
            $(this).parent().slideToggle('slow');
        }
        else {
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
    $(window).bind("load", function() {
   // code here

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
   .insert(TweenMax.to(
    $('.hiddenContentOnLoad'),1,{
        opacity:0,
    }
    ))
   .add(TweenMax.to(
    $('.hiddenContentOnLoad'),0.1,{
        'display':'none'
    }
    ))
   .add(TweenMax.from(
    $('.scrollDown'), 1, {
        opacity: 0,
    }
    )
   )
   ;
});
});