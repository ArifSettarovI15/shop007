function SearchItems(item) {
    var val=item.val();
    var obj=item.closest('.search-block-items');

    var data_array={};
    data_array['action']='search';
    data_array['q']=val;

    var options={};
    options['AfterDone']=SearchItemsDone;
    options['obj']=obj;
    SendAjaxRequest(
        {
            'url':'/manager/shop/products/',
            'data':data_array,
            'options':options,
            'onlyOne':true
        }
    );
}

function SearchItemsDone(response,ajax_config,textStatus,jqXHR) {
  $('.item-search__result').html(response.html);
}

function SearchMainItem(item) {
  var val=item.val();

  var data_array={};
  data_array['action']='search';
  data_array['q']=val;

  var options={};
  options['AfterDone']=SearchMainItemDone;
  SendAjaxRequest(
    {
      'url':'/manager/shop/products/',
      'data':data_array,
      'options':options,
      'onlyOne':true
    }
  );
}


function SearchMainItemDone(response,ajax_config,textStatus,jqXHR) {
  $('.search-block-main__result').html(response.html);
}

function SetMainItem(item) {

  var item_id=item.attr('data-id');
  var obj=item.closest('.search-block-items');

  var data_array={};
  data_array['action']='set_main';
  data_array['item_id']=item_id;


  var options={};
  options['AfterDone']=SetMainItemDone;
  options['obj']=obj;
  SendAjaxRequest(
    {
      'data':data_array,
      'options':options
    }
  );
}
function SetMainItemDone(response,ajax_config,textStatus,jqXHR) {
  $(".search-block-main__value").html(response.value);
  $('.search-block-main__result').html('');
    $('.offer_id').val(response.item_id);
    $('.product_id').val(response.id);
}

function AddContentItem(item) {

    var item_id=item.attr('data-id');
    var obj=item.closest('.search-block-items');

    var data_array={};
    data_array['action']='add_item';
    data_array['item_id']=item_id;
    data_array['block']=obj.attr('data-block');


    var options={};
    options['AfterDone']=AddContentItemDone;
    options['obj']=obj;
    SendAjaxRequest(
        {
            'data':data_array,
            'options':options
        }
    );
}
function AddContentItemDone(response,ajax_config,textStatus,jqXHR) {
  ajax_config.options.obj.find(".item-search__result [data-id='"+ajax_config.data.item_id+"'].item-search__item").appendTo( ajax_config.options.obj.find(".item-search__result2") );
}
function DeleteContentItem(item) {
    var item_id=item.attr('data-id');
  var obj=item.closest('.search-block-items');

    var data_array={};
    data_array['action']='delete_item';
  data_array['block']=obj.attr('data-block');
    data_array['item_id']=item_id;

    var options={};
    options['AfterDone']=DeleteContentItemDone;
  options['obj']=obj;
    SendAjaxRequest(
        {
            'data':data_array,
            'options':options
        }
    );
}

function DeleteContentItemDone(response,ajax_config,textStatus,jqXHR) {
  ajax_config.options.obj.find(".item-search__result2 [data-id='"+ajax_config.data.item_id+"'].item-search__item").remove();
}

function SaveContentItemsSort(list,name) {
    var data={};
    data['action']='items_sort';
    data['name']=name;
    data['data_sort']=list;
    SendAjaxRequest(
        {
            'data': data
        }
    );
}
function SaveContentItemsSort2(list,name,block) {
  var data={};
  data['action']='items_sort';
  data['name']=name;
  data['data_sort']=list;
  data['block']=block;
  SendAjaxRequest(
    {
      'data': data
    }
  );
}
