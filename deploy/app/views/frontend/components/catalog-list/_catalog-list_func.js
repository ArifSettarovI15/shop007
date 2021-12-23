function initSlider() {
    var slider = $('.js-slider-1')
    slider.each(function (i, elem) {
        var controls = $('[data-control-slider="' + $(elem).attr('data-slider') + '"]')
        $(elem).slick({
            arrows: true,
            dots: false,
            slidesToShow: 4,
            infinite: false,
            rows: 2,
            prevArrow: controls.find('.slide-btn_prev'),
            nextArrow: controls.find('.slide-btn_next'),
            responsive: [
                {
                    breakpoint: 1366,
                    settings: {
                        slidesPerRow: 1,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 479,
                    settings: 'unslick'
                }
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

function initSlider2() {
    var slider = $('.js-slider-2')
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
                    breakpoint: 1366,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 2
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false
                    }
                }
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

function initSlider3() {
    var slider = $('.js-slider-3')
    slider.each(function (i, elem) {
        var controls = $('[data-control-slider="' + $(elem).attr('data-slider') + '"]')
        $(elem).slick({
            arrows: true,
            dots: false,
            slidesToShow: 6,
            infinite: false,
            prevArrow: controls.find('.slide-btn_prev'),
            nextArrow: controls.find('.slide-btn_next'),
            responsive: [
                {
                    breakpoint: 1366,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 1024,
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
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
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

function openThumbDone(response, ajax_config, textStatus, jqXHR) {
    if (response.status) {
        openInlineModal(response.html)
        initCardSlider2(true)
        grunticon.embedIcons(grunticon.getIcons(grunticon.href))
    }
}