$(document).on('click', '.js_delete_basket_item', function(){
    SendAjaxRequest({
        url: '/basket/',
        data: {action:'delete', 'item_id':$(this).attr('data-id')},
        onComplete: RenderBasket
    })
})
$(document).on('change', '.js_update_basket_item', function(){
    SendAjaxRequest({
        url: '/basket/',
        data: {action:'update', 'item_id':$(this).attr('data-id'), 'count':$(this).val()},
        onComplete: RenderBasket
    })
})

function  RenderBasket(response){
    if (response.status){
        $('.js_basket_wrapper').html(response.html)
    }
}