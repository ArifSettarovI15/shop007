function initCardSlider2(isDots, chainSlider) {
    var selector = $('.js-slider-card-2')
    if (selector.length > 0) {
        var isDotsMobile = false
        selector.find('.s-card-preview__item').length > 0 ? isDotsMobile = true  : isDotsMobile

        selector.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            arrows: false,
            dots: isDots,
            draggable: false,
            asNavFor: chainSlider,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        dots: isDotsMobile
                    }
                }
            ]
        })
    }
}