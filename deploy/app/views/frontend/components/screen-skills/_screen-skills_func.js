function initSkillSlider(slider) {
    slider.each(function(i, elem) {
        var $elem = $(elem)
        var isRow = $(window).width() < 480 && $elem.attr('data-sm-row') ? $elem.attr('data-sm-row') : 1

        $(elem).slick({
            dots: true,
            arrows: false,
            slidesToShow: 3,
            infinite: false,
            appendDots: $elem.siblings('.dots-container'),
            rows: isRow,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        })
    })

}