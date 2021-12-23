$( document ).on( "keyup change", ".item-search", function(e) {
    var obj=$(this).closest('.search-block-items');

    if ($(this).val()!='') {
        SearchItems($(this));
    }
    else {
      obj.find('.item-search__result').html('');
    }
});

$( document ).on( "click", ".item-search__result .item-search__item", function(e) {
  var obj=$(this).closest('.search-block-items');
    if ( obj.find(".item-search__result2 [data-id='"+$(this).attr('data-id')+"'].item-search__item").length==0) {
        AddContentItem($(this));
    }
});

$( document ).on( "click", ".item-search__result2 .item-search__delete", function(e) {
    DeleteContentItem($(this).closest('.item-search__item'));
});

if ((".sortable_content_items").length>0) {
    $('.sortable_content_items').sortable({
        appendTo: "body",
        helper: "clone",
        opacity: 0.8,
        update: function () {
            var sortable_data = $(this).sortable("toArray", {attribute: 'data-id'});
            SaveContentItemsSort2(sortable_data,$(this).attr('data-sort-name'), $(this).closest('.search-block-items').attr('data-block'));
        }
    });
    $(".sortable_content_items").disableSelection();
}

$( document ).on( "keyup change", ".search-block-main__input", function(e) {
  var obj=$(this).block();

  if ($(this).val()!='') {
    SearchMainItem($(this));
  }
  else {
    obj.elem('result').html('');
  }

});

$( document ).on( "click", ".search-block-main__result .item-search__item", function(e) {
  SetMainItem($(this));
});
