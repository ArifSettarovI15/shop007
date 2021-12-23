$( document ).on( "click", ".order-basket-del", function(e) {
  OrderBasketDelete($(this).attr('data-id'));
});
$( document ).on( "blur", ".order-basket-count", function(e) {
  OrderBasketSet($(this).attr('data-id'),$(this).val(),0);
});
$( document ).on( "blur", ".order-basket-price", function(e) {
  OrderBasketSet($(this).attr('data-id'),0,$(this).val());
});
