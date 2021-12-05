$(document).on('click', '.js-counter-plus', function(e) {
    ChangeBasketCount('up', $(this));
})

$(document).on( "click", ".js-counter-minus", function(e) {
    ChangeBasketCount('down', $(this));
});

$(document).on('change keyup', '.js-counter-val', function() {
    ChangeBasketCount('input', $(this));
})