

$(window).scroll(function() {
    if ($(window).width() < 767) {
        var height = $('.shop-card').height()
        if (window.pageYOffset > height) {
            $('.s-card-info__elem_2').hide()
        } else {
            $('.s-card-info__elem_2').show()
        }
    }
})