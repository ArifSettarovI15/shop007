$('#jstree_div').on('changed.jstree', function (e, data) {
    if(typeof(data.event) !== 'undefined') {
        if(data['node'] && data['node']['children'].length == 0) {
            window.open(data['node']['a_attr']['href'], '_blank');
        } else {
            $('#jstree_div').jstree("toggle_node", data['node']);
        }
    }
})
    .jstree({
        "search" : {
            "show_only_matches": true,
            show_only_matches_children:true
        },
        'plugins' : ['search',"unique","wholerow" ],
    });


var to = false;
$('#jstree_div_search').keyup(function () {
    if ($(this).hasClass('f_pos')) {
        $(this).addClass('f_pos');
        $('#jstree_div').height($('#jstree_div').height());
    }
    if(to) { clearTimeout(to); }
    to = setTimeout(function () {
        var v = $('#jstree_div_search').val();
        $('#jstree_div').jstree(true).search(v);
    }, 250);
});
