$(document).on('click', '.js-slide-text', function (e) {
    e.preventDefault();
    var el = $('.js-overflow'),
        curHeight = el.height(),
        autoHeight = el.css('height', 'auto').height(),
        text = $(this).find('.link__text')

    if (el.hasMod('show')) {
        el.animate({
            height: +el.attr('data-height')
        }, {
            complete: function () {
                $(this).mod('show', false);
                $('html, body').animate({scrollTop: $(this).offset().top - 50})
                text.html('Показать целиком')
            }
        });
    } else {
        el.height(curHeight).animate({
            height: autoHeight,
        }, {
            complete: function () {
                $(this).mod('show', true);
                $('html, body').animate({scrollTop: $(this).offset().top - 50})
                text.html('Свернуть')
            }
        });
    }

    $('.js-main-header').addClass('header_up')
})