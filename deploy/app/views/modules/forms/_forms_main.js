
$( document ).on( "focus click", ".element.input-style_error", function() {
    ClearElement($(this));
});
$( document ).on( "click", ".form .submit:not(.disabled)", function() {
    var form_obj=$(this).closest('.form');
    AddObject(form_obj);
});
$('.form input.element[type="text"],.form input.element[type="password"],.form input.element[type="email"]').keyup(function(e){
    if(e.keyCode == 13)
    {
        var form_obj=$(this).closest('.form');
        AddObject(form_obj);
    }
});
$('form.form').submit( function(e){
    e.preventDefault();
});

$( document ).on( "click", ".form-element", function() {
    var type=$(this).mod('type');
    if (type=='input' || type=='textarea' || type=='search') {
        $(this).mod('state','focused');
        $(this).elem('value').focus();
    }
});



$( document ).on( "blur", ".form-element", function() {
    $(this).delMod('state','focused');
});

$( document ).on( "keyup", ".form-element__value", function() {
    if ($(this).val()=='') {
        $(this).block().mod('empty',true);
    }
    else {
        $(this).block().mod('empty',false);
    }
});

$( document ).on( "click", ".logout", function(e) {
    e.preventDefault();
    LogoutUser($(this));
});

initForms()

$(document).on('click change keyup', '.field__input', function() {
    if ($(this).val().length > 0) {
        $(this).addClass('focused');
    } else {
        $(this).removeClass('focused');
    }

    toggleCleanButton($(this))
})

$(document).on('click', '.js-input-clean', function() {
    var input = $(this).siblings('input')
    input.val('').removeClass('focused input-style_error input-style_ok')
    $(this).hide()
})

$(document).on('click', '.basket-add', function(e) {
    e.preventDefault();
    AddToBasket($(this));
})

$(document).on('click', '.js-basket-del', function() {
    deleteBasketItem($(this));
})

$(document).on('click', '.js-basket-clear', function() {
    clearBasket()
})

$(document).on('click', '.send-offer', function() {
    offerSend()
})
