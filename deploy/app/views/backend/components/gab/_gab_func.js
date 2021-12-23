function ChangeCatGab(obj) {
    var data={};
    data['action']='update_gab';
    data['cat_id']=obj.attr('data-item');
    data['weight']=$('.gab_info[data-item="'+data['cat_id']+'"][data-gab="weight"]').val();
    data['length']=$('.gab_info[data-item="'+data['cat_id']+'"][data-gab="length"]').val();
    data['width']=$('.gab_info[data-item="'+data['cat_id']+'"][data-gab="width"]').val();
    data['height']=$('.gab_info[data-item="'+data['cat_id']+'"][data-gab="height"]').val();

    SendAjaxRequest(
        {
            'data': data
        }
    );
}