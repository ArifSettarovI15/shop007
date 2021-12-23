$(document).on('click', '.js-size-change', function() {
    var data = {
        ID: $(this).attr('data-id'),
        PRICE: $(this).attr('data-price'),
        PRICE_OLD: $(this).attr('data-price-sale'),
        WEIGHT: $(this).attr('data-weight'),
        DIAM: $(this).attr('data-size'),
        ICON: $(this).attr('data-icon') || null
    }

    var block = $(this).closest('.product')

    block.find('.product-price').html(data.PRICE)
    block.find('.product-sale').html(data.PRICE_OLD)
    block.find('.product-weight').html(data.WEIGHT)
    block.find('.product-diam').html(data.DIAM)
    if (data.ICON){
        block.find('.product_icon').attr('src', data.ICON)
        $('.s-card-preview__dop-item.slick-current').removeClass('slick-current')
    }
    block.find('.product-add').attr('data-id', data.ID)

    block.find('.js-size-change').removeClass('active')
    $(this).addClass('active')
})