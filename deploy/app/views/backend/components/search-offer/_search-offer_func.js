
function SearchOffers(val) {
  var data_array={};
  data_array['action']='search';
  data_array['q']=val;

  var options={};
  options['AfterDone']=SearchOffersDone;
  SendAjaxRequest(
    {
      'url':'/manager/shop/offers/',
      'data':data_array,
      'options':options,
      'onlyOne':true
    }
  );
}

function SearchOffersDone(response,ajax_config,textStatus,jqXHR) {
  $('.search-offer__result').html(response.html);
}
