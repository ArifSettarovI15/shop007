function FilterTableData(page,obj) {
    if (obj.attr('data-before')) {
        var func=window[obj.attr('data-before')];
        func(obj);
    }
    var data_array={};
    if (page % 1 === 0) {

    }
    else {
        page=1;
    }
    data_array['page']=page

    obj.closest('.table-data').find('.filter-element').each(function(index,value) {
        if (($(this).attr('data-no-empty') && $(this).val()!=0 && $(this).val()!='') ||
            !$(this).attr('data-no-empty')) {
            if ($(this).attr('data-value') && $(this).attr('data-value')!='') {
                if ($(this).attr('data-active')==1) {
                    data_array[$(this).attr('data-name')] = $(this).attr('data-value');
                }
            }
            else {
                data_array[$(this).attr('name')] = $(this).val();
            }
        }
    })

    var url = document.URL
    if (data_array['cat_cat']) {
        url = home_url + '/' + data_array['cat_cat'] + '/'
    }


    var options={};
    options['table'] = obj.closest('.table-paging').attr('data-table')
    options['AfterDone'] = filterSelectDone

    SendAjaxRequest(
        {
            'data':data_array,
            'options':options,
            'url': url
        }
    );
}



function FilterTableDataDone(response,ajax_config,textStatus,jqXHR) {
    if (ajax_config['options']['obj'].attr('data-insert')==1) {
        ajax_config['options']['obj'].closest('.table-data').find('.table-content').append(response.html);
        if (ajax_config['data']['page']>1) {
            if ($('.table-content-part').length>0) {
                $("html, body").animate({scrollTop: $('.table-content-part:last-child').offset().top-50}, 750);
            }
        }
        else {
            ajax_config['options']['obj'].closest('.table-data').find('.table-content').html(response.html);
            if ($('.table-data').length>0) {
                ScrollTop();
            }

        }
        ajax_config['options']['obj'].closest('.table-data').find('.table-paging').html(response.paging);
        if (ajax_config['options']['obj'].closest('.table-data').find('.table-filters').hasMod('empty')) {
            ajax_config['options']['obj'].closest('.table-data').find('.sidefilter-list').html(response.filters);
        }
        else {
            ajax_config['options']['obj'].closest('.table-data').find('.table-filters').html(response.filters);
        }

    }
    else {
        ajax_config['options']['obj'].find('.table-paging').html(response.paging);
        ajax_config['options']['obj'].find('.table-content').html(response.html);

        if (ajax_config['options']['obj'].closest('.table-data').length>0) {
            var v= ajax_config['options']['obj'].closest('.table-data').offset().top-60;
            $("html, body").animate({scrollTop: v}, 750);
        }
    }
    // $('.table-total').html(response.total);
    grunticon.embedIcons(grunticon.getIcons(grunticon.href));
}

function ScrollTop() {
    var v=$('.wrapper__main').offset().top-60;
    $("html, body").animate({scrollTop: v}, 750);
}
