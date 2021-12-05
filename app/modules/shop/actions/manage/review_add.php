<?php
$Main->user->PagePrivacy('admin');
$array = array();


$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
    $Main->input->clean_array_gpc('r', array(
        'id' => TYPE_UINT
    ));
}


if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
    $edit=1;
    $data_info=$ShopClass->reviews->GetItemFromIdAdmin($Main->GPC['id']);
    if ($data_info) {
        $array['review'] = $data_info;
    }
    else {
        $Main->error->ObjectNotFound();
    }
}
if ($Main->GPC['action']=='process_review'){
    $Main->input->clean_array_gpc('r', array(
        'uemail' => TYPE_STR,
        'uname'=> TYPE_STR,
        'item_id' =>TYPE_UINT,
        'comment' => TYPE_STR,
        'admin_comment' => TYPE_STR,
        'review_status' => TYPE_UINT,
        'rating' =>TYPE_UINT,
        'file' =>TYPE_UINT,

    ));

    if ($Main->GPC['file']){
        $file =intval($Main->GPC['file']);
    }
    else $file = 0;

    $error ='';
    $ShopClass->reviews->CreateModel();

    $ShopClass->reviews->model->columns_update->getUEmail()->setValue($Main->GPC["uemail"]);
    if ($file) $ShopClass->reviews->model->columns_update->getPhoto()->setValue($file);
    $ShopClass->reviews->model->columns_update->getUName()->setValue($Main->GPC["uname"]);
    $ShopClass->reviews->model->columns_update->getItemId()->setValue($Main->GPC["item_id"]);
    $ShopClass->reviews->model->columns_update->getComment()->setValue($Main->GPC["comment"]);
    $ShopClass->reviews->model->columns_update->getAdminComment()->setValue($Main->GPC["admin_comment"]);
    $ShopClass->reviews->model->columns_update->getRating()->setValue($Main->GPC['rating']);
    $ShopClass->reviews->model->columns_update->getStatus()->setValue($Main->GPC['review_status']);
    $ShopClass->reviews->model->columns_where->getId()->setValue($Main->GPC['id']);

    $result = $ShopClass->reviews->Update();

    if ($result){
        $array['status'] = true;
        $array['text'] = 'Значение успешно обновлено';
        $Main->template->DisplayJson($array);
    }

}

if ($edit==1) {
    $a_name='Редактировать';
}
else {
    $a_name='Добавить';
}

$page_name=$a_name.' отзыв';
$Main->template->SetPageAttributes(
    array(
        'title'=>$page_name,
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>array(
            array(
                'title'=>'Отзывы',
                'link'=>BASE_URL.'/manager/shop/review/'
            ),
            array(
                'title'=>$a_name
            ),
        ),
        'title'=>$page_name
    )
);
$array['edit'] = $edit;
$Main->template->Display($array);