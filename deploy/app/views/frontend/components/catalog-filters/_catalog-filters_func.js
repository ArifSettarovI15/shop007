function sendFiltersData(obj, complete) {

    complete = complete || false
    var data_array = {};
    data_array['action'] = 'get_filter'

    obj.find('.filter-element').each(function (i, elem) {
        var $elem = $(elem)
        if ($elem.val()) {
            data_array[$elem.attr('name')] = $elem.val()
        }
    })

    var layout = $('.js-display-change.active') || null
    if (layout.attr('data-mod')) {
        data_array['layout'] = layout.attr('data-mod')
    }
    var url = home_url + '/' + data_array['cat_cat'] + '/'

    var options = {};
    options['url'] = data_array['cat_cat']
    options['table'] = obj.attr('data-table')
    if (obj.closest('.modal').length && complete === false) {
        options['modal'] = obj.closest('.modal')
    }
    options['AfterDone'] = filterSelectDone
    SendAjaxRequest(
        {
            'url': url,
            'data': data_array,
            'options': options,
        }
    )
}

function filterSelectDone(response, ajax_config, textStatus, jqXHR) {
    if (response.status) {
        var obj = $('.table-data')
        obj.find('[data-list="filters"]').html(response.filters_html)

        console.log(ajax_config.options)

        if (!ajax_config.options.modal) {
            if (response.html) {
                obj.find('[data-list="' + ajax_config.options.table + '"]').html(response.html)
            } else {
                obj.find('[data-list="' + ajax_config.options.table + '"]').html('<div class="cat-no-text">Нет товаров соттветсвующих критерию</div>')
            }

            obj.find('[data-list="paging"]').html(response.paging)
            changePageUrl(response, ajax_config)
        }

        initRange()
        initForms()
        grunticon.embedIcons(grunticon.getIcons(grunticon.href))

        if (obj.length>0) {
            var v = obj.offset().top-60;
            $("html, body").animate({scrollTop: v}, 750);
        }
    }
}

function changePageUrl(response, ajax_config) {
    if (ajax_config.options.table == 'bouquets') {
        if (document.location.href !== home_url + '/' + ajax_config.options.url + '/') {
            if (ajax_config.options.url) {
                var title_part1 = response.page_title;
                var title_part2 = $('.company_name_part').val()
                document.title = title_part1+'|'+title_part2
                $('.category-head__title').html(response.page_title)
                window.history.pushState({'html': response.html, 'pageTitle': document.title},'', '/' + ajax_config.options.url + '/');
            }
        }
    }
}