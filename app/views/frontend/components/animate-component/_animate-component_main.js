$(window).on('load', function () {
    if ($('.ajax-loading_preload').length) {
        $('.ajax-loading').fadeOut(1000, function() {
            $('.ajax-loading').mod('preload', false)
            $('body').fadeIn()
        })
    }


    // animate skills

})
