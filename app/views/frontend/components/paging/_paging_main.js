$( document ).on( "change keyup", ".table-data [data-type='filter_value']", function() {
    if ($(this).attr('data-notrigger')!=1) {
        FilterTableData(1,$(this));
    }
});
$( document ).on( "click", ".js-paging", function(e) {
    e.preventDefault();
    console.log(123123123)
    FilterTableData($(this).attr('data-value'),$(this));
});

// $( document ).on( "click", ".table-data [data-type='filter_value'][data-trigger='click']", function() {
//     if ($(this).attr('data-notrigger')!=1) {
//         if ($(this).attr('data-active')==1) {
//             $(this).closest('.table-data').find('[data-name="'+$(this).attr('data-name')+'"]').attr('data-active',0);
//             $(this).attr('data-active',0);
//         }
//         else {
//             $(this).closest('.table-data').find('[data-name="'+$(this).attr('data-name')+'"]').attr('data-active',0);
//             $(this).attr('data-active',1);
//         }
//         FilterTableData(1,$(this));
//     }
// });
