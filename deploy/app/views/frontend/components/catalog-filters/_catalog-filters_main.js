$(document).on('select2:select', '.select-submit', function (e) {
    sendFiltersData($(e.target).closest('[data-list="filters"]'))
})

$(document).on('click', '.js-display-change', function() {
    var obj = $(this).closest('[data-trigger]')
    var table = $('[data-list="' + obj.attr('data-trigger') + '"]')
    if ($(this).attr('data-mod')) {
        table.addClass($(this).attr('data-mod'))
    } else {
        table.removeClass('inline', false)
    }
    $('.js-display-change').removeClass('active')
    $(this).addClass('active')
})

$(document).on('click', '.js-filter-apply', function() {
    sendFiltersData($(this).closest('.table-data').find('[data-list="filters"]'), true)
})

$(document).on('click', '.js-filter-reset', function() {
    var data_array = {};
    data_array['action'] = 'get_filter';

    var options = {};
    options['AfterDone'] = filterSelectDone;
    options['table'] = 'projects'
    SendAjaxRequest(
        {
            'data': data_array,
            'options': options,
        }
    )
})