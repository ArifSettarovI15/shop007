getAdminNotify();

admin_notify_pid = setInterval(function() {
  getAdminNotify();
}, 60000);


$( document ).on( "click", ".notify-admin__close", function(e) {
  deleteAdminNotify($(this).attr('data-id'))
});
