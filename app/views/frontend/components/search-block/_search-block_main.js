$( document ).on( 'click', function (e) {
  var container = $('.search-block');
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    CloseTopSearch();
  }
});

if ($('#app').length>0 && Modernizr.touchevents) {
  Hammer(document.getElementById('app')).on('tap', function (e) {
    var container = $('.search-block');
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      CloseTopSearch();
    }
  });
}


$( document ).on( "focus", ".search-block__input", function(e) {
  searchFocused($(this).block());
});

$( document ).on( "click", ".search-block__default", function(e) {
  $(this).block().elem('input').focus();
  openSearchBlock($(this).block());
  SearchTop($(this).block());
  searchFocused($(this).block());
  $(this).block().mod('opened', true);
});

$( document ).on( "click", ".search-block__placeholder", function(e) {
  $(this).block().elem('input').focus();
});


$( document ).on( "click keyup change", ".search-block__input", function(e) {
  openSearchBlock($(this).block());
  if(e.keyCode == 13)
  {
    ForceSearch($(this).block());
  }
  else if(e.keyCode == 27)
  {
    EscSearch();
  }
  else {
    if ($(this).val()!=='') {
      $(this).block().mod('opened', true);
    }
    else {
      $(this).block().mod('opened', false);
    }

    if ($(this).block().find('.list-block__item').length>0) {
      $('.page').mod('over',true);
    }

    SearchTop($(this).block());
  }
});

$( document ).on( "click", ".search-block__delete", function(e) {
  $('.search-block__drop').html('');
  $('.search-block__input').val('');
  $('.header').mod('search', false);
  CloseTopSearch();
  $('.layout__side').show();
});

$( document ).on( "click", ".search-block__button", function(e) {
  $(this).block().elem('button').mod('active', false);
  $(this).mod('active', true);
  $(this).block().elem('element').mod('active', false);
  $(this).block().find('[data-id="'+$(this).attr('data-id')+'"].search-block__element').mod('active', true);
});

$( document ).on( "click", ".search-open", function(e) {
  if ($('.header').hasMod('search')) {
    $('.header').mod('search', false);
    $('.layout__side').show();
  }
  else {
    $('.header').mod('search', true);
    $('.layout__side').hide();
  }
});
