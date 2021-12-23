
function SendChat(text) {
  if (text) {
    var data={};
    data['action']='send_chat';
    data['text']=text;

    var options={};
    options['show_and_hide']=3;
    options['AfterDone']=SendChatDone;
    SendAjaxRequest(
      {
        'data':data,
        'options':options,
        'ShowLoading2':true
      }
    );
  }
  else {
    ShowError('Введите текст');
  }

}

function SendChatDone(response,ajax_config,textStatus,jqXHR) {
  if (response.status) {
      $('.chat__items').html(response.html);
    initChatScroll();
  }
}

function initChatScroll() {
  if ($('.chat__items').length>0) {
    $('.chat__items').perfectScrollbar();
    setTimeout(function(){
      $('.ps-theme-default').perfectScrollbar('update');
    },100);
    $('.chat__items')[0].scrollTop=0;
  }
}
