$( document ).on( "click", ".search-offer__result .item-search__item", function(e) {
  $('[name="offer_id"]').val($(this).attr('data-offer-id'));
  $('.search-offer__input').val('');
  $('.search-offer__result').html('');
  OrderBasketUpdate();
});




$( document ).on( "keyup", ".search-offer__input", function(e) {
  if ($(this).val()) {
    SearchOffers($(this).val());
  }
  else {
    $('.search-offer__result').html('');
  }
});
