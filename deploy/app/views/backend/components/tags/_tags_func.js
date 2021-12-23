function TagAddSave(val) {

    var data_array={};
    data_array['action']='tag_add_save';
    data_array['value']=val;

    var options={};
    options['AfterDone']=TagAddSaveDone;
    SendAjaxRequest(
        {
            'data':data_array,
            'options':options
        }
    );
}


function TagAddSaveDone(response,ajax_config,textStatus,jqXHR) {
    $('[name="tags_list"]').html(response.select);
    $('.tags-list').html(response.html);
}
function TagSaveDone(response,ajax_config,textStatus,jqXHR) {
    $('.tags-list').html(response.html);
}
function TagSave(val) {

    var data_array={};
    data_array['action']='tag_save';
    data_array['value']=val;

    var options={};
    options['AfterDone']=TagSaveDone;

    SendAjaxRequest(
        {
            'data':data_array,
            'options':options
        }
    );
}


function TagDelete(val) {

    var data_array={};
    data_array['action']='tag_delete';
    data_array['value']=val;

    var options={};
    options['AfterDone']=TagDeleteDone;

    SendAjaxRequest(
        {
            'data':data_array,
            'options':options
        }
    );
}

function TagDeleteDone(response,ajax_config,textStatus,jqXHR) {
    $('[data-id="'+ajax_config.data.value+'"].tags-list__item').remove();
}