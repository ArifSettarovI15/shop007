function CheckForm(obj) {
    var error = 0;
    obj.find(".element").each(function () {
        var elem = $(this);
        if (elem.hasClass('required')) {
            if (elem.attr('type') == 'checkbox' || elem.attr('type') == 'radio') {
                var label = elem.closest('.form').find('[data-label="' + elem.attr('name') + '"]')
                if (elem.closest('.form').find('[name="' + elem.attr('name') + '"].element:checked').length > 0) {
                    SetOkToElement(label);
                } else {
                    error = 1;
                    SetErrorToElement(label);
                }
            } else if (elem.attr('type') == 'tel') {
                if (elem.val().length < 2) {
                    error = 1
                    SetErrorToElement(elem);
                    if (elem.attr('data-label')) {
                        SetErrorToElement($('[data-block="' + elem.attr('data-label') + '"'))
                    }
                } else {
                    SetOkToElement(elem);

                    if (elem.attr('data-label')) {
                        SetOkToElement($('[data-block="' + elem.attr('data-label') + '"'))
                    }
                }
            } else {
                if (elem.val() == '' || elem.val() == 0 || elem.val() == null) {
                    error = 1;
                    SetErrorToElement(elem);
                    if (elem.attr('data-label')) {
                        SetErrorToElement($('[data-block="' + elem.attr('data-label') + '"'))
                    }
                } else {
                    if (elem.hasClass('select2')) {
                        SetOkToElement(elem.next('.select2'));
                    }

                    if (elem.attr('data-label')) {
                        SetOkToElement($('[data-block="' + elem.attr('data-label') + '"'))
                    }
                    SetOkToElement(elem);
                }
            }
        }
    });

    if (error == 0) {
        return true;
    } else {
        ShowError('Заполните необходимые поля');
        return false;
    }
}

function SendForm(form_obj, form_options) {
    form_options = form_options || {};

    var options = {
        'form_obj': form_obj
    };
    $.each(form_options, function (index, value) {
        options[index] = value;
    });

    if (options.BeforeFunc) {
        options.BeforeFunc(form_obj, options);
    }
    var data = GetFormData(form_obj);

    if (CheckForm(form_obj)) {
        SendAjaxRequest(
            {
                'data': data,
                'options': options,
                'onComplete': FormComplete,
                'onBefore': FormBefore,
                'ShowLoading2': true
            }
        );
    }
}

function ClearElement(elem) {
    elem.removeClass('input-style_ok');
    elem.removeClass('input-style_error');
    if (elem.attr('type') != 'checkbox') {
        elem.parent().removeClass('element_value_ok');
        elem.parent().removeClass('element_value_error');
    }
}

function SetOkToElement(elem) {
    elem.addClass('input-style_ok');
    elem.removeClass('input-style_error');
    if (elem.hasClass('select2-hidden-accessible')) {
        SetOkToElement(elem.next('.select2-container'));
    }
}

function SetErrorToElement(elem) {
    if (elem.length) {
        elem.addClass('input-style_error');
        elem.removeClass('input-style_ok');
        if (elem.hasClass('select2-hidden-accessible')) {
            SetErrorToElement(elem.next('.select2-container'));
        }
    }
}

function EnableElement(target) {
    if (target.is("input") || target.is("select")) {
        target.prop('disabled', false);
        target.val(0);
    }
    target.removeClass('disabled');

}

function DisableElement(target) {
    if (target.is("input") || target.is("select")) {
        target.prop('disabled', true);
        if (target.is("select")) {
            target.html('<option value="0">-</option>');
        }
    }
    target.addClass('disabled');

}

function FormComplete(response, ajax_config, textStatus, jqXHR) {
    EnableElement(ajax_config.options.form_obj.find('.submit'));
}

function FormBefore(ajax_config, jqXHR) {
    ClearElement(ajax_config.options.form_obj.find('.element'))
    DisableElement(ajax_config.options.form_obj.find('.submit'));
}

function SetMultilineData(id) {
    var values = [];
    $($('.multiline_container[data-value="' + id + '"] .multiline_data >div')).each(function (index, value) {
        var item_value = {};
        $($(this).find('.sub_element')).each(function (index, value) {
            item_value[$(this).attr('data-name')] = $(this).val();
        });
        values.push(item_value);
    });
    $('.multiline_container[data-value="' + id + '"] [data-value="complete_input"]').val(JSON.stringify(values));
}

function AddObject(form_obj) {
    if (form_obj.attr('data-before')) {
        window[form_obj.attr('data-before')];
    }
    var data = GetFormData(form_obj);
    var options = {};
    options['form_obj'] = form_obj;
    if (CheckForm(form_obj)) {
        SendAjaxRequest(
            {
                'url': form_obj.attr('data-url'),
                'data': data,
                'options': options,
                'onComplete': FormComplete,
                'onBefore': FormBefore
            }
        );
    }
}

function GetFormData(form_obj) {
    var data = {};
    if (typeof (tinyMCE) != "undefined") {
        tinyMCE.triggerSave(true, true);
    }
    form_obj.find(".element").each(function () {
        var elem = $(this);
        if (elem.closest('.form').is(form_obj)) {
            var type = elem.attr('type');
            if ((elem.attr('data-no-empty') && elem.val() != 0 && elem.val() != '') ||
                !elem.attr('data-no-empty')) {
                if (elem.attr('data-value') == 'complete_input') {
                    SetMultilineData(elem.closest('.multiline_container').attr('data-value'));
                } else if (elem.attr('data-type') == 'switch') {
                    data[elem.attr('data-name')] = elem.find('.active').attr('data-value');
                } else if (type == 'checkbox') {
                    var val = false;
                    if (elem.prop('checked')) {
                        if (elem.hasClass('element_array')) {
                            if (data[elem.attr('name')]) {

                            } else {
                                data[elem.attr('name')] = [];
                            }
                            data[elem.attr('name')].push(elem.val());

                        } else {
                            val = true;
                            if (elem.attr('value')) {
                                val = elem.attr('value');
                            }
                            if (elem.attr('name')) {
                                data[elem.attr('name')] = val;
                            }
                        }
                    }
                } else if (type == 'radio') {
                    if (elem.is(':checked')) {
                        data[elem.attr('name')] = elem.val();
                    }
                } else {
                    if (elem.attr('name')) {
                        if (elem.hasClass('element_array')) {
                            if (data[elem.attr('name')]) {

                            } else {
                                data[elem.attr('name')] = [];
                            }
                            data[elem.attr('name')].push(elem.val());
                        } else {
                            data[elem.attr('name')] = elem.val();
                        }

                    }
                }
            }
        }

    });
    return data;
}

function LogoutUser(obj) {
    var options = {};
    options['form_obj'] = obj;
    options['reload'] = false;
    options['AfterDone'] = LogoutUserDone;
    SendAjaxRequest(
        {
            'url': obj.attr('data-url'),
            'options': options,
            'ShowLoading2': true
        }
    );
}

function LogoutUserDone(response, ajax_config, textStatus, jqXHR) {
    window.location.href = home_url;
}

function initForms() {
    var $selects = $('select.select2').not('.select2-hidden-accessible');
    $selects.each(function (i, elem) {
        $(elem).select2({
            width: '100%',
            placeholder: ' ',
            theme: $(elem).attr('data-theme'),
            dropdownParent: $(elem).closest('.select'),
            minimumResultsForSearch: Infinity,
            tokenSeparators: [','],
            closeOnSelect: !$(elem).prop('multiple'),
            language: {
                noResults: function (params) {
                    return 'Результаты не найдены';
                }
            }
        })

        $(elem).on('select2:open', function (e) {
            var evt = 'scroll.select2';
            $(e.target).parents().off(evt);
            $(window).off(evt);
            setTimeout(function () {
                initScroll($('.select2-results__options'))
            }, 0)
        })

        if ($('.js-auto-size').length > 0) {
            $('.js-auto-size').textareaAutoSize()
        }
    })


    initCbsAndRadio()
    MaskPhone()
}

function initCbsAndRadio() {
    var templates = {
        checkbox: '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
            '<path fill-rule="evenodd" clip-rule="evenodd" d="M14.0405 3.29289C14.431 3.68342 14.431 4.31658 14.0405 4.70711L6.70713 12.0404C6.3166 12.431 5.68344 12.431 5.29291 12.0404L1.95958 8.70711C1.56906 8.31658 1.56906 7.68342 1.95958 7.29289C2.3501 6.90237 2.98327 6.90237 3.37379 7.29289L6.00002 9.91912L12.6262 3.29289C13.0168 2.90237 13.6499 2.90237 14.0405 3.29289Z" fill="white"/>\n' +
            '</svg>'
    }

    $('.js-cbs').each(function (i, elem) {
        if ($(elem).parent().hasClass('iradio') || $(elem).parent().hasClass('icheckbox')) {
            return
        } else {
            $(elem).iCheck({
                labelHover: false,
                cursor: true,
                insert: $(elem).attr('type') === 'checkbox' ? '<div class="cbs__check">' + templates[$(elem).attr('data-type')] + '</div>' : '',
            });
        }
    })
}

function initScroll(container) {
    var perfectScrollbarOptions = {
        suppressScrollX: true,
        maxScrollbarLength: 100
    }
    if (container.length > 0) {
        if (container.hasClass('ps-container')) {
            container.scrollTop(0)
            container.perfectScrollbar('destroy')
            container.perfectScrollbar(perfectScrollbarOptions)
        } else {
            container.perfectScrollbar(perfectScrollbarOptions)
        }
    }
}

function MaskPhone() {
    var inputTel = $('input[type="tel"]')
    if ((inputTel.length > 0 && inputTel.is(':visible')) || inputTel.closest('.js-accord-drop').length) {
        inputTel.inputmask('+9(999) 999-9999', {
            clearMaskOnLostFocus: true,
            showMaskOnHover: false,
            showMaskOnFocus: true,
            autoUnmask: true,
            positionCaretOnClick: 'lvp'
        })
    }
}

function toggleCleanButton(input) {
    var close = input.siblings('.field__clean')
    if (input.val().length > 3) {
        close.show()
    } else {
        close.hide()
    }
}

function AddToBasket(obj) {
    var data = {};
    data['action'] = 'add'
    data['item_id'] = obj.attr('data-id')
    var counter = $('[data-id="' + obj.attr('data-id') + '"].counter').not('.cart-counter') || null
    if (counter.length > 0) {
        data['count'] = counter.attr('data-value')
    }

    var options = {};
    if (obj.attr('data-order')) {
        options['order'] = 1
    }

    options['AfterDone'] = BasketAddDone;
    SendAjaxRequest(
        {
            'url': '/basket/',
            'data': data,
            'options': options,
            'ShowLoading2': true
        }
    )
}

function BasketAddDone(response, ajax_config, textStatus, jqXHR) {
    if (response.status) {
        var headerCounter = $('.basket-counter')
        var clearButton = $('.js-basket-clear')
        var sendButton = $('.send-offer')

        if (response.total_count === 0) {
            headerCounter.removeClass('active')
            clearButton.prop('disabled', true)
            sendButton.prop('disabled', true)
        } else {
            headerCounter.addClass('active')
            clearButton.prop('disabled', false)
            sendButton.prop('disabled', false)
        }
        $('.js-basket-ajax').html(response.html)
        $('.total-sum').html(response.total_price)

        var counterText = response.total_count + ' ' + getProductText(response.total_count)

        $('.total-count').html(counterText)
        headerCounter.find('.basket-counter-value').html(response.total_count)

        grunticon.embedIcons(grunticon.getIcons(grunticon.href))

        if (ajax_config.options.order) {
            offerSend()
        }
    } else {
        if (response.count && ajax_config.options.input) {
            ajax_config.options.input.val(response.count)
            ajax_config.options.element.attr('data-value', response.count);
            ajax_config.options.element.attr('data-value-real', response.count);
        }
    }
}

function getProductText(num) {
    var worlds = ['товар', 'товара', 'товаров']
    var cases = [2, 0, 1, 1, 1, 2]
    return worlds[(num % 100 > 4 && num % 100 < 20) ? 2 : cases[Math.min(num % 10, 5)]];
}

function deleteBasketItem(obj) {
    var data = {};
    data['action'] = 'delete';
    data['item_id'] = obj.attr('data-id');

    var options = {};
    options['AfterDone'] = BasketAddDone;
    SendAjaxRequest(
        {
            'url': '/basket/',
            'data': data,
            'options': options,
            'ShowLoading2': true
        }
    )
}

function getOfferDone(response, ajax_config, textStatus, jqXHR) {
    if (response.status) {
        openInlineModal(response.html)
        initForms()
        grunticon.embedIcons(grunticon.getIcons(grunticon.href))
        initScroll($('.js-modal-scroll'))
        initTimePicker()
        checkDeliveryMethod($('.js-toggle-box:checked'))
    }
}

function offerSend() {
    var data = {};
    data['action'] = 'get_order_modal';

    var options = {};
    options['AfterDone'] = getOfferDone;
    SendAjaxRequest(
        {
            'url': '/basket/',
            'data': data,
            'options': options,
            'ShowLoading2': true
        }
    )
}

function clearBasket() {
    var data = {};
    data['action'] = 'clean';

    var options = {};
    options['AfterDone'] = BasketAddDone;
    SendAjaxRequest(
        {
            'url': '/basket/',
            'data': data,
            'options': options,
            'ShowLoading2': true
        }
    )
}


