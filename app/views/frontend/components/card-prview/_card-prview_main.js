function initCardNav() {
    var slider = $('.js-slider-card-1')
    if (slider.length > 0) {
        slider.slick({
            vertical: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: false,
            dots: false,
            prevArrow: $('.s-card-preview__arrow_prev'),
            nextArrow: $('.s-card-preview__arrow_next'),
            draggable: false,
            // asNavFor: '.js-slider-card-2',
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
            ]
        })
    }

    slider.find('.s-card-preview__dop-item').on('click', function() {
        var index = $(this).index()
        var path = $(this).find('img').attr('src')
        slider.slick('slickGoTo', parseInt(index) + 1)
        $('.s-card-preview__dop-item').removeClass('slick-current')
        $('.product_icon').attr('src', path)
        $(this).addClass('slick-current')
    })
}

initCardNav()

initCardSlider2(false, '.js-slider-card-1')

