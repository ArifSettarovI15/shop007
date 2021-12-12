$(document).on('click', '.js_add_cart', function (e){
    e.preventDefault()
    var item_id = $(this).attr('data-id')
    var count = 1
    SendAjaxRequest({
        url: '/basket/',
        data: {'action':'add', 'item_id':item_id, 'count':count},
        onComplete: BasketUpdateDone
    })
})