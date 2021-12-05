function GetCollections(response,ajax_config,textStatus,jqXHR) {

  var data={};
  data['action']='get_collections';

  var options={};
  options['insert_elem']=$('.collections-list');
  SendAjaxRequest(
    {
      'data': data,
      'options':options
    }
  );
}
