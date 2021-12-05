$(document).on('click', '.js-accord', function(e) {
    e.preventDefault();
    var obj = $(this).parent()
    var objContent = obj.find('.js-accord-drop')
    var siblings = $('.active .js-accord-drop').not(objContent)


    if (obj.hasClass('active')) {
        objContent.slideUp(300, function () {
            obj.removeClass('active')
        })
    } else {
        obj.addClass('active')
        if (!$(this).attr('data-multiple')) {
            siblings.each(function(i, elem) {
                $(elem).slideUp(125, function() {
                    $(this).parent().removeClass('active')
                })
            })
        }
        objContent.slideDown(300)
    }
})