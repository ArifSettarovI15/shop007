$(function() {

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

var js_popup=$(".js-popup");
if (js_popup.length>0) {
    js_popup.magnificPopup({
        type: 'ajax',
        fixedContentPos: true,
        fixedBgPos: true,
        closeMarkup:'<div class="mfp-close"></div>',
        overflowY: 'auto',
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in',
        callbacks: {
            beforeOpen: function() {
                StartAjaxLoading();
                if (top_slider!==false) {
                    top_slider.slick('slickPause');
                }
            },
            ajaxContentAdded: function() {
                StopAjaxLoading();
                if ($('.js-auto-size').length>0) {
                    $('.js-auto-size').textareaAutoSize();
                }

            },
          open: function() {
            onOpenModal();
          },
            close: function() {
                if (top_slider!==false) {
                    top_slider.slick('slickPlay');
                }
              CloseModals();
            }
        }
    });
}

$(document).on('click', '.popup-open', function(e) {
    e.preventDefault()
    openInlineModal($(this).attr('data-mfp-src'))
})

$(document).on('click', '.js-modal-close', function() {
    CloseModals()
})

$( document ).on('click', "#notification .close", function() {
    HideNotification()
})


$( document ).on( "click", ".tabs__link", function(e) {
    e.preventDefault();
    TabsSet($(this));
});


if ($(window).width()<768) {
    $('.tabs-content__head').mod('active',false);
    $('.tabs-content__content').mod('active',false);
}});