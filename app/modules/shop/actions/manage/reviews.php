<?php
$Main->user->PagePrivacy('admin');

$array =array();
if ($Main->GPC['action']=='delete') {
    $Main->input->clean_array_gpc('r', array(
        'object_id' => TYPE_UINT
    ));

    $city_info=$ShopClass->reviews->GetItemFromIdAdmin($Main->GPC['object_id']);
    $ShopClass->reviews->CreateModel();
    $ShopClass->reviews->model->columns_where->getId()->setValue($Main->GPC['object_id']);
    $status=$ShopClass->reviews->Delete();

    $array=array();
    $array['status']=$status;
    if ($status) {
        $array['text']='Объект успешно удален';
    }
    else {
        $array['text']='Ошибка удаления объекта';
    }
    $Main->template->DisplayJson($array);
}

if ($Main->GPC['action']=='update_badge_status') {
    $Main->input->clean_array_gpc(
        'r',
        [
            'object_id' => TYPE_UINT,
            'value'     => TYPE_BOOL,
            'type_id'   => TYPE_STR
        ]
    );
    $info=$ShopClass->reviews->GetItemFromIdAdmin($Main->GPC['object_id']);

    $ShopClass->reviews->CreateModel();

    $ShopClass->reviews->model->columns_where->getId()->setValue($Main->GPC['object_id']);
    $ShopClass->reviews->model->columns_update->getStatus()->setValue($Main->GPC['value']);
    $status=$ShopClass->reviews->Update();

    $array=array();
    $array['status']=$status;
    if ($status) {
        $array['text']='Статус обновлен';
    }
    else {
        $array['text']='Ошибка';
    }
    $Main->template->DisplayJson($array);
}


$Paging = new ClassPaging($Main,20);
$Paging->show_per_page=true;

$Main->input->clean_array_gpc('r', array(
    'review_id'=>TYPE_STR,
    'review_uname'=>TYPE_STR,
    'review_uemail'=>TYPE_STR,
    'review_comment'=>TYPE_STR,
    'review_item_id'=>TYPE_STR,
    'review_rating'=>TYPE_STR,
    'review_time'=>TYPE_STR,
    'review_status'=>TYPE_UINT,

));

$ShopClass->reviews->CreateModel();

$ShopClass->reviews->model->setSelectField($ShopClass->reviews->model->getTableName().".*");

if ($Main->GPC_exists['review_status'] and $Main->GPC['review_status']!=''){
    $ShopClass->reviews->model->columns_where->getStatus()->setValue($Main->GPC['review_status']);
    $ShopClass->reviews->model->columns_where->getStatus()->setSearch(true);
}
if ($Main->GPC_exists['review_time'] and $Main->GPC['review_time']!=''){
    $ShopClass->reviews->model->columns_where->getTime()->setValue($Main->GPC['review_time']);
    $ShopClass->reviews->model->columns_where->getTime()->setSearch(true);
}
if ($Main->GPC_exists['review_rating'] and $Main->GPC['review_rating']!=''){
    $ShopClass->reviews->model->columns_where->getRating()->setValue($Main->GPC['review_rating']);
    $ShopClass->reviews->model->columns_where->getRating()->setSearch(true);
}
if ($Main->GPC_exists['review_item_id'] and $Main->GPC['review_item_id']!=''){
    $ShopClass->reviews->model->columns_where->getItemId()->setValue($Main->GPC['review_item_id']);
    $ShopClass->reviews->model->columns_where->getItemId()->setSearch(true);
}
if ($Main->GPC_exists['review_uemail'] and $Main->GPC['review_uemail']!=''){
    $ShopClass->reviews->model->columns_where->getUEmail()->setValue($Main->GPC['review_uemail']);
    $ShopClass->reviews->model->columns_where->getUEmail()->setSearch(true);

}
if ($Main->GPC_exists['review_comment'] and $Main->GPC['review_comment']!=''){
    $ShopClass->reviews->model->columns_where->getComment()->setValue($Main->GPC['review_comment']);
    $ShopClass->reviews->model->columns_where->getComment()->setSearch(true);
}
if ($Main->GPC_exists['review_uname'] and $Main->GPC['review_uname']!=''){
    $ShopClass->reviews->model->columns_where->getUName()->setValue($Main->GPC['review_uname']);
    $ShopClass->reviews->model->columns_where->getUName()->setSearch(true);
}
if ($Main->GPC_exists['review_id'] and $Main->GPC['review_id']!=''){
    $ShopClass->reviews->model->columns_where->getId()->setValue($Main->GPC['review_id']);
    $ShopClass->reviews->model->columns_where->getId()->setSearch(true);
}
$ShopClass->reviews->model->setOrderBy("review_id DESC");
$ShopClass->reviews->model->setStart($Paging->sql_start);
$ShopClass->reviews->model->setCount($Paging->per_page);
$Paging->total= $ShopClass->reviews->GetTotal();

$Paging->data = $ShopClass->reviews->GetList();

$page_name='Отзывы';

$Main->template->SetPageAttributes(
    array(
        'title'=>$page_name,
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>array(
            array(
                'title'=>$page_name
            )
        ),
        'title'=>$page_name
    )
);
$array['status'] = true;

$Paging->Display('shop/manage/reviews_table.twig',$array);