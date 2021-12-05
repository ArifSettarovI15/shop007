function DeliveryDelete() {

    var data_array={};
    data_array['action']='delete_delivery';

    var options={};
    options['AfterDone']=DeliveryDeleteDone;
    SendAjaxRequest(
        {
            'data':data_array,
            'options':options
        }
    );
}


function DeliveryDeleteDone(response,ajax_config,textStatus,jqXHR) {
  window.location.reload();
}