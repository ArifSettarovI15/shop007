function initSliderProduct3() {
    var slider = $('.js-slider-product-3')
    slider.each(function (i, elem) {
        var controls = $('[data-control-slider="' + $(elem).attr('data-slider') + '"]')
        $(elem).slick({
            arrows: true,
            dots: false,
            slidesToShow: 2,
            infinite: false,
            prevArrow: controls.find('.slide-btn_prev'),
            nextArrow: controls.find('.slide-btn_next'),
            responsive: [
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        })

        $(elem).on('setPosition', function() {
            var hiddenElems = controls.find('.slick-hidden')
            if (hiddenElems.length > 0) {
                controls.hide()
            } else {
                controls.show()
            }
        })
    })
}