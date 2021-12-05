$(document).on('click', function(e) {
    var a = $('.js-input-select.open')

    a.is(e.target) || a.has(e.target).length !== 0 || closeOpenRange();
})

$(document).on('click', '.js-dropdown-trigger', function() {
    closeOpenRange()
    $(this).closest('.js-input-select').addClass('open', true)
})

initRange()
