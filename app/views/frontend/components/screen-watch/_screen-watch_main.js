$(document).on('click', '.js-watch-clear', function(e) {
    e.preventDefault()
    Cookies.remove('last_viewed')
    $('.last-viewed').fadeOut(300, function() {
        $(this).html('')
    })
})