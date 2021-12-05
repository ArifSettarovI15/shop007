initSlider()
initSlider2()
initSlider3()

$(document).on('click', '.js-th-open', function (e) {
    e.preventDefault()
    var data = {}
    data['action'] = 'get_modal';
    data['item_url'] = $(this).attr('data-id');

    var options = {};
    options['AfterDone'] = openThumbDone;
    SendAjaxRequest(
        {
            'url': $(this).closest('.t-2__image-inner').attr('href'),
            'data': data,
            'options': options,
        }
    )
})