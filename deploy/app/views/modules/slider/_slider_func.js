function responsiveSlider(selector, bp, fn) {
    if ($(window).width() < bp) {
        if (!selector.hasClass('slick-initialized')) {
            fn(selector)
        }
    } else {
        if (selector.hasClass('slick-initialized')) {
            destroySlide(selector)
        }
    }
}

function destroySlide(slider) {
    slider.each(function (i, elem) {
        $(elem).slick('unslick');
    });
}
