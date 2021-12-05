$( document ).on( 'click', '.add_aks', function() {
    var data={};
    data['action']='add_aks';
    $('.also_select select').each(function () {
        if ($(this).val()!=0) {
            data['value']=$(this).val();
        }

    });

    var options={};
    options['insert_elem']=$('.aks_list');
    SendAjaxRequest(
        {
            'data': data,
            'options':options
        }
    );
});

$( document ).on( 'click', '.aks_list i', function() {
    var data={};
    data['action']='del_aks';
    data['value']=$(this).attr('data-id');

    var options={};
    options['insert_elem']=$('.aks_list');
    SendAjaxRequest(
        {
            'data': data,
            'options':options
        }
    );
});