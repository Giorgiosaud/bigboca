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