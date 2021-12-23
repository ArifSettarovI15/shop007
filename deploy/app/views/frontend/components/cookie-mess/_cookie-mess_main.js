if (!Cookies.get('mes_cookie')) {
    $('.cookie-notification').animate({height: 'show'}, 500)

    $(document).on('click', '.js-cookie-close', setCookieMessHandler)

    $(document).on('click', '.js-cookie-slide', function() {
        var text = $(this).siblings('.cookie-notification__text')
        if (text.hasClass('show')) {
            text.css('max-height', 50).removeClass('show')
            $(this).html('Развернуть')
        } else {
            text.css('max-height', 200).addClass('show')
            $(this).html('Свернуть')
        }
    })
}