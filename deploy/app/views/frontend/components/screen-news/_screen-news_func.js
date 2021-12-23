function initSlider4() {
    var slider = $('.js-slider-4')
    slider.each(function (i, elem) {
        var controls = $('[data-control-slider="' + $(elem).attr('data-slider') + '"]')
        $(elem).slick({
            arrows: true,
            dots: false,
            slidesToShow: 4,
            infinite: false,
            prevArrow: controls.find('.slide-btn_prev'),
            nextArrow: controls.find('.slide-btn_next'),
            responsive: [
                {
                    breakpoint: 1365,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 479,
                    settings: 'unslick'
                },
            ]
        })

        $(elem).on('setPosition', function () {
            var hiddenElems = controls.find('.slick-hidden')
            if (hiddenElems.length > 0) {
                controls.hide()
            } else {
                controls.show()
            }
        })
    })
}