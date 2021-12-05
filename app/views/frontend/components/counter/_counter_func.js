function ChangeBasketCount(way, obj) {
    var element = obj.block();
    var input = element.elem('val')
    var value = input.val() * 1
    var min = element.attr('data-min') * 1 || 1;
    var max = element.attr('data-max') * 1 || 20;
    var elPlus = element.find('.js-counter-plus')
    var elMinus = element.find('.js-counter-minus')

    if (way === 'up') {
        value = value + element.attr('data-step') * 1
        value= element.attr('data-value-real') * 1+ 1
    } else if (way === 'down') {
        value = value - element.attr('data-step')*1
        if (value < min && element.attr('data-min')){
            value = min;
        }
        if (value < 1){
            value = 1;
        }

        value = element.attr('data-value-real') * 1 - 1;
    }

    if (value > max) {
        value = max
    }

    value=Math.round(value * 100) / 100;
    input.val(value)
    element.attr('data-value',value);
    element.attr('data-value-real',value);

    if (value === min) {
        elMinus.prop('disabled', true)
    } else {
        elMinus.prop('disabled', false)
    }

    if (value >= max) {
        elPlus.prop('disabled', true)
    } else {
        elPlus.prop('disabled', false)
    }

    if (element.attr('data-update')) {
        var data={};
        data['action']='update';
        data['item_id']=element.attr('data-id')
        data['count'] = element.attr('data-value')

        var options={};
        options['input'] = input
        options['element'] = element
        options['AfterDone'] = BasketAddDone
        SendAjaxRequest(
            {
                'url':'/basket/',
                'data':data,
                'options':options,
                'ShowLoading2':true
            }
        )
    }

}