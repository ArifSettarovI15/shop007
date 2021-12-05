$(document).on('click', '.js-anchor', function(e) {
    var target = $(this.hash)
    target = target.length ? target : $('[data-name=' + this.hash.slice(1) + ']')

    if (target.length) {
        e.preventDefault()

        if ($('body').hasClass('menu-open')) {
            menuClose()
        }

        $('html, body').animate({
            scrollTop: target.offset().top - 60
        }, 1000, function() {
            var $target = $(target)
            $target.focus()

            if ($target.is(":focus")) {
                return false
            } else {
                $target.attr('tabindex','-1')
                $target.focus()
            }
        })
    }
})

new HeadsUp( '.js-main-header' );

$(document).on('click', '.js-burger', function() {
    var page = $('body')
    var backdrop = $('.js-backdrop-menu')
    if (page.hasClass('menu-open')) {
        page.removeClass('menu-open')
        backdrop.off('click', menuClose)

        if (window.pageYOffset > 1) {
            $('.header').addClass('header_move')
        }
    } else {
        page.addClass('menu-open')
        backdrop.on('click', menuClose)
    }
})