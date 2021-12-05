function bg404() {
    var container = $('.error404__block-img')
    var request = null
    var mouse = {
        x: 0,
        y: 0
    }

    var fixer = -0.03
    var speed = 2

    var cx =  container.width() * 0.5
    var cy = container.height() * 0.5

    $('body').on('mousemove', function(e) {
        mouse.x = e.pageX
        mouse.y = e.pageY

        cancelAnimationFrame(request)
        request = requestAnimationFrame(bgUpdate)
    })

    function bgUpdate() {
        var dx =mouse.x - cx + container.width()
        var dy = mouse.y - cy + container.height()

        TweenLite.to('.svg-image-404', 1, {x: dx * speed * fixer, y: dy * speed * fixer, ease: Power1.easeOut})
        TweenLite.to('.pattern-404', 1, {x: -(dx * speed * fixer), y: -(dy * speed * fixer), ease: Power1.easeOut})
    }

    $(window).resize(function() {
        cx = window.innerWidth / 2;
        cy = window.innerHeight / 2;
    });
}

// function pulse404() {
//     TweenMax.to('.error404__block-text', 0.6, {
//         scale:1.06,
//         repeat:-1,
//         yoyo: true,
//         ease: Power0.easeNone,
//     });
// }


$(document).ready(function() {
    if ($('.error404').length > 0) {
        // pulse404()
        bg404()
    }
})

