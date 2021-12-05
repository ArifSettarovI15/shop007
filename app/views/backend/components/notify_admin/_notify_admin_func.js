var notify_items=[];

function getAdminNotify() {
  var data={};
  data['action']='get';

  var options={};
  options['AfterDone']=getAdminNotifyDone;
  SendAjaxRequest(
    {
      'url':'/manager/notify_admin/',
      'data':data,
      'options':options,
      'ShowLoading2':true
    }
  );
}

var browser_alert;
var browser_alert_count=0;
var browser_old_title=document.title;
var admin_notify_pid;

function ShowBrowserAlert() {
  document.title = '🔔🔔🔔 '+browser_alert_count + ' уведомления - ' + browser_old_title;
  setTimeout(function() {
    document.title =browser_old_title;
  }, 1500);
}

function closeNotifyInfo() {
  clearInterval(browser_alert);
  document.title =browser_old_title;
}
function showNotifyInfo(value) {
  var link='';
  if (value.notify_link) {
    link='<a class="notify-admin__link" target="_blank" href="'+value.notify_link+'">перейти</a>';
  }

  var html='<div class="notify-admin__item" data-id="'+value.notify_id+'">' +
        '<div class="notify-admin__title">'+value.notify_title+'</div>' +
        '<div class="notify-admin__text">'+value.notify_text+'</div>' +
        '<div class="notify-admin__time">'+value.notify_time+'</div>' +
        link+
        '<div class="notify-admin__close" data-id="'+value.notify_id+'"><i class="fa fa-close"></i></div>' +
    '</div>';
  $(html).appendTo('.notify-admin');
  $('.notify-admin').mod('active', true);
  clearInterval(browser_alert);
  browser_alert = setInterval(function() { // планируем setInterval каждые 10 мс
    ShowBrowserAlert();
  }, 3000);
}

function getAdminNotifyDone(response,ajax_config,textStatus,jqXHR) {
  $.each(response.items, function(i, value) {
    if (value.notify_id in notify_items) {

    }
    else {
      notify_items[value.notify_id]=value;
      browser_alert_count=browser_alert_count+1;
      showNotifyInfo(value);
    }
  });


}

function deleteAdminNotify (notify_id) {
  if (notify_id in notify_items) {
      $('[data-id="'+notify_id+'"].notify-admin__item').remove();
    browser_alert_count=browser_alert_count-1;
    if (browser_alert_count<=0) {
      closeNotifyInfo();
    }


    var data={};
    data['action']='delete';
    data['id']=notify_id;

    SendAjaxRequest(
      {
        'url':'/manager/notify_admin/',
        'data':data,
        'ShowLoading2':true
      }
    );
  }
}
