$( document ).on( 'click', '.add_filter_value', function() {
    var obj=$(this).closest('.item_filter_data');
    var data={};
    data['action']='add_filter_value';
    data['value']=obj.find('.filters_values_select option:selected').val();
    data['title']=obj.find('.filters_values_select option:selected').text();
    data['sprav_id']=$(this).closest('.item_filter_data').attr('data-sprav');
    data['key']=$(this).closest('.item_filter_data').attr('data-key');

    var options={};
    options['insert_elem']=obj.find('.filters_values_list');
    if ($(this).attr('data-callback')) {
      options['AfterDone']=window[$(this).attr('data-callback')];
    }
    if (data['value']>0) {
        SendAjaxRequest(
            {
                'data': data,
                'options':options
            }
        );
    }
});
$( document ).on( 'click', '.save_filter_value', function() {
    var obj=$(this).closest('.item_filter_data');
    var data={};
    data['action']='add_filter_value';
    data['text_value']=obj.find('.filters_values_text').val();
    data['sprav_id']=$(this).closest('.item_filter_data').attr('data-sprav');
    data['key']=$(this).closest('.item_filter_data').attr('data-key');

    var options={};
    options['insert_elem']=obj.find('.filters_values_list');
    SendAjaxRequest(
        {
            'data': data,
            'options':options
        }
    );
});

$( document ).on( 'click', '.filters_values_list i', function() {
    var obj=$(this).closest('.item_filter_data');
    var data={};
    data['action']='del_filter_value';
    data['value']=$(this).attr('data-id');
    data['sprav_id']=$(this).closest('.item_filter_data').attr('data-sprav');
    data['key']=$(this).closest('.item_filter_data').attr('data-key');

    var options={};
    options['insert_elem']=obj.find('.filters_values_list');
    SendAjaxRequest(
        {
            'data': data,
            'options':options
        }
    );
});



$( document ).on( 'click', '.add_user_vendor_value', function() {
  var obj=$(this).closest('.user_vendor_data');
  var data={};
  data['action']='add_user_vendor_value';
  data['value']=obj.find('.user_vendor_values_select option:selected').val();
  data['title']=obj.find('.user_vendor_values_select option:selected').text();
  data['discount']=obj.find('.user_discount').val();
  data['group_id']=obj.find('.user_group_id').val();

  var options={};
  options['insert_elem']=obj.find('.user_vendor_values_list');
  if ($(this).attr('data-callback')) {
    options['AfterDone']=window[$(this).attr('data-callback')];
  }
  if (data['value']>0) {
    SendAjaxRequest(
      {
        'data': data,
        'options':options
      }
    );
  }
});
$( document ).on( 'click', '.save_user_vendor_value', function() {
  var obj=$(this).closest('.user-vendor-discount');
  var data={};
  data['action']='save_user_vendor_value';
  data['value']=obj.find('.user-d-id').val();
  data['discount']=obj.find('.user-d-value').val();
  data['group_id']=obj.find('.user-g-value').val();


  var options={};
  options['insert_elem']=obj.find('.user_vendor_values_list');
  if ($(this).attr('data-callback')) {
    options['AfterDone']=window[$(this).attr('data-callback')];
  }
  if (data['value']>0) {
    SendAjaxRequest(
      {
        'data': data,
        'options':options
      }
    );
  }
});
$( document ).on( 'click', '.user_vendor_values_list i', function() {
  if (confirm('Точно удалить скидку?')) {
  var obj=$(this).closest('.user_vendor_data');
  var data={};
  data['action']='del_user_vendor_value';
  data['value']=$(this).attr('data-id');

  var options={};
  options['insert_elem']=obj.find('.user_vendor_values_list');
  SendAjaxRequest(
    {
      'data': data,
      'options':options
    }
  );
  }
});
