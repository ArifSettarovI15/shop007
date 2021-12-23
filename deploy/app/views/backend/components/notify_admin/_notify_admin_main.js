

$( document ).on( "click", ".notify-admin__close", function(e) {
  deleteAdminNotify($(this).attr('data-id'))
});
