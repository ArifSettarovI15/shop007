$( document ).on( 'click', '.add_filter', function() {
    var data={};
    data['action']='add_filter';
    data['value']=$('.filters_select option:selected').val();
    var options={};
    options['insert_elem']=$('.filters_list');
    if (data['value']>0) {
        SendAjaxRequest(
            {
                'data': data,
                'options':options
            }
        );
    }
});

$( document ).on( 'click', '.filters_list i', function() {
    var data={};
    data['action']='del_filter';
    data['value']=$(this).attr('data-id');

    var options={};
    options['insert_elem']=$('.filters_list');
    SendAjaxRequest(
        {
            'data': data,
            'options':options
        }
    );
});
