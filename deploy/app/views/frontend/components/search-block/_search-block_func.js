function SearchDone(response,ajax_config,textStatus,jqXHR) {
      if (ajax_config.options.form_obj.attr('data-name')=='top') {
        $('.page').mod('over',true);
      }

      initSearchScroll();
  grunticon.embedIcons(grunticon.getIcons(grunticon.href));
}
function CloseTopSearch() {

  $('.search-block').each(function(index,value) {
    if ($(this).hasMod('focused')) {
      $(this).mod('opened', false);
      $('.page').mod('over',false);
      if ($(this).elem('input').val()=='') {
        $(this).mod('focused', false);
      }
    }
  });
}

function searchFocused(obj) {
  if (obj.attr('data-name')=='top') {
    $('.page').mod('over',true);
  }
  $(obj).mod('focused', true);
}

function openSearchBlock(obj) {
  if (obj.attr('data-name')=='top') {
    $('.page').mod('over',true);
    $('.m-menu').mod('active', false);
    $('body').removeClass('body_overflow');
  }

}

function SearchTop(obj) {
  if (obj.elem('input').val()!=='') {
    AddObject(obj);
  }
  else {

  }
}

function initSearchScroll() {
  if ($('.search-list').length>0) {
    $('.search-list').perfectScrollbar();
    setTimeout(function(){
      $('.ps-theme-default').perfectScrollbar('update');
    },100);
  }
}


function ForceSearch(obj) {
    var q=obj.find('[name="q"]').val();
    if (q!=='') {
      EscSearch();
      window.location.href=obj.attr('data-url')+q+'/';
    }
}


function EscSearch() {
  $.xhrPool.abortAll();
  CloseTopSearch();
}
