function TabsSet (item) {
    var tab_block=item.block();
    var tabs_block_id=tab_block.attr('data-tab');

    var tab_id=item.attr('data-id');
    var tabs_content=$('.tabs-content[data-tab="'+tabs_block_id+'"]');

    tab_block.elem('link').delMod('active');
    item.mod('active',true);

    tabs_content.elem('content').delMod('active');
    tabs_content.elem('content').filter( '[data-id="'+tab_id+'"]' ).mod('active',true);
}


function openTab(tab,item_id) {
  var tabs_block_id=tab;
  var tab_block=$('[data-tab="'+tab+'"]');

  var tab_id=item_id;
  var tabs_content=$('.tabs-content[data-tab="'+tabs_block_id+'"]');

  tab_block.elem('link').delMod('active');
  tab_block.find('[data-id="'+item_id+'"].tabs__link').mod('active',true);

  tabs_content.elem('content').delMod('active');
  tabs_content.elem('content').filter( '[data-id="'+tab_id+'"]' ).mod('active',true);
}
