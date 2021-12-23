$( document ).on( "click", ".chat__send", function(e) {
  e.preventDefault();
  SendChat($('.chat__input').val());
});

$( document ).on( "click keyup change", ".chat__input", function(e) {
  if(e.keyCode == 13)
  {
    SendChat($('.chat__input').val());
  }
});

initChatScroll();
