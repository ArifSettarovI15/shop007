function initTimePicker() {
    var picker =  $('.time-picker')
    picker.datepicker({
        minDate: new Date(),
        position: 'top left',
        timepicker: true,
        autoClose: false,
        disableNavWhenOutOfRange: true,
        navTitles: {
            days: 'MM yyyy',
        },
        onSelect: function() {
            picker.addClass('focused')
        }
    })
}

function checkDeliveryMethod(obj) {
    var targets = $('.js-box-target')

    if (obj.attr('data-id') == 3) {
        targets.slideUp()
        targets.find('.element').removeClass('required')
    } else {
        targets.slideDown()
        targets.find('.element').addClass('required')
    }

    var priceElem = $('.order-price')
    var price = priceElem.attr('data-current-price') * 1
    var self = obj

    return function() {
        if (self.attr('data-price')) {
            price += self.attr('data-price') * 1
        }

        priceElem.attr('data-price', price)
        priceElem.html(price)
    }()
}