$(document).on('click', '.cats_tree a',function(e){
    e.preventDefault()
    if ($(window).width() < 1024){
        if($(this).hasClass('link_opened')){
            window.location.href = $(this).attr('href')
        }else{
            $('.cats_tree').find('a').removeClass('link_opened')
            if($(this).closest('li').find('ul').length) {
                $(this).addClass('link_opened')
            }else{
                window.location.href = $(this).attr('href')
            }

        }
        if ($(this).closest('li').hasClass('li_opened')){
            $(this).closest('li').removeClass('li_opened')
        }else{
            if($(this).closest('li').parent().parent().hasClass('cats_tree')){
                $('.cats_tree').find('li').removeClass('li_opened')
            }
            $(this).closest('li').addClass('li_opened')

        }

    }
})

$(document).on('click', '.js_menu_btn', function (){
    if ($(this).hasClass('open')){
        $(this).removeClass('open')
        $('.js_menu').removeClass('open')
    }else{
        $(this).addClass('open')
        $('.js_menu').addClass('open')
    }
})