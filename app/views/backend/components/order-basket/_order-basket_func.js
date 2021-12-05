
function OrderBasketDelete(id) {
  var data_array={};
  data_array['action']='basket_del';
  data_array['offer_id']=id;

  var options={};
  options['AfterDone']=OrderBasketDone;
  SendAjaxRequest(
    {
      'data':data_array,
      'options':options,
      'onlyOne':true
    }
  );
}

function OrderBasketSet(id, count, price) {
  var data_array={};
  data_array['action']='basket_set';
  data_array['offer_id']=id;
  data_array['offer_count']=count;
  data_array['offer_price']=price;

  var options={};
  SendAjaxRequest(
    {
      'data':data_array,
      'options':options,
      'onlyOne':true
    }
  );
}
function OrderBasketUpdate() {
  var data_array={};
  data_array['action']='basket_list';

  var options={};
  options['AfterDone']=OrderBasketDone;
  SendAjaxRequest(
    {
      'data':data_array,
      'options':options,
      'onlyOne':true
    }
  );
}


function OrderBasketDone(response,ajax_config,textStatus,jqXHR) {
  $('.basket-offers-list').html(response.html);
}
