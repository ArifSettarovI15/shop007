$(document).on('click', '.js_add_to_cart', function(){
    var item_id =  $(this).attr('data-id')
    var count = $(this).parent().find('.js_items_count').val()
    SendAjaxRequest({
        url: '/basket/',
        data: {'action':'add', 'item_id':item_id, 'count':count},
        onComplete: BasketUpdateDone
    })
})

function BasketUpdateDone(response){
    if (response.status){
        console.log(response.items_count)
        $('.header__links_basket_count').html(response.total_count)
    }

}