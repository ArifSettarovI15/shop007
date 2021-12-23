function closeOpenRange() {
    $('.js-input-select.open').removeClass('open')
}

function initRange() {
    $('.js-input-range').each(function(i, elem) {
        var key= $(elem).attr('data-name');
        var nodes = [
            $(elem).closest('.js-input-select').find('.js-range-from'),
            $(elem).closest('.js-input-select').find('.js-range-to')
        ]
        var min = $(elem).attr('data-min')
        var max = $(elem).attr('data-max')
        var vMin = $(elem).attr('data-v-min')
        var vMax = $(elem).attr('data-v-max')
        if ($(elem).hasClass('noUi-target')) {

        } else {
            noUiSlider.create(elem, {
                start: [vMin, vMax],
                connect: true,
                range: {
                    'min': +min,
                    '50%': Math.round(max/2),
                    'max': +max
                },
                pips: {
                    mode: 'range',
                    density: 2
                },
                format: {
                    to: function ( value ) {
                        return parseInt(value);
                    },
                    from: function ( value ) {
                        return parseInt(value);
                    }
                }
            })

            elem.noUiSlider.on('update', function (values, handle, unencoded, isTap, positions) {
                var value = values[handle];

                if (handle===0) {
                    $('.'+key+'-min').val(value*1) ;

                }
                else {
                    $('.'+key+'-max').val(value*1) ;
                }

                nodes[handle].html(values[handle]);
            });
            elem.noUiSlider.on('end', function (values, handle, unencoded, isTap, positions) {
                sendFiltersData($(elem).closest('[data-list="filters"]'))
            })
        }
    })

}
