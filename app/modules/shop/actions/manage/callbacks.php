<?php
$Main->user->PagePrivacy('admin');
$array = array();

if ($Main->GPC['action']=='delete') {
    $Main->input->clean_array_gpc('r', array(
        'object_id' => TYPE_UINT
    ));

    $ShopClass->callbacks->GetItemById($Main->GPC['object_id']);

    $ShopClass->callbacks->CreateModel();
    $ShopClass->callbacks->model->columns_where->getId()->setValue($Main->GPC['object_id']);
    $status=$ShopClass->callbacks->Delete();

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

if ($Main->GPC['action']=='update_status') {
    $Main->input->clean_array_gpc('r', array(
        'object_id'=>TYPE_UINT,
        'value'=>TYPE_BOOL
    ));

    $ShopClass->callbacks->CreateModel();
    $ShopClass->callbacks->model->columns_where->getId()->setValue($Main->GPC['object_id']);
    $ShopClass->callbacks->model->columns_update->getStatus()->setValue($Main->GPC['value']);
    $status=$ShopClass->callbacks->Update();

    $array=array();
    $array['status']=$status;
    if ($status) {
        $array['text']='Статус обновлен';
    }
    else {
        $array['text']='Ошибка';
    }
    $Main->template->DisplayJson($array);exit;
}

$Main->input->clean_array_gpc('r', array(
    'callback_id' =>TYPE_UINT,
    'callback_name' =>TYPE_STR,
    'callback_phone' =>TYPE_NUM,
    'callback_status' =>TYPE_NUM,
));

$Paging = new ClassPaging($Main, 25, false,false);
$Paging->show_per_page=false;

$ShopClass->callbacks->CreateModel();

$ShopClass->callbacks->model->setSelectField($ShopClass->callbacks->model->getTableName().".*");

if ($Main->GPC_exists['callback_id'] and $Main->GPC['callback_id']!=''){
    $ShopClass->callbacks->model->columns_where->getId()->setValue($Main->GPC['callback_id']);
    $ShopClass->callbacks->model->columns_where->getId()->setSearch(true);
}
if ($Main->GPC_exists['callback_name'] and $Main->GPC['callback_name']!=''){
    $ShopClass->callbacks->model->columns_where->getName()->setValue($Main->GPC['callback_name']);
    $ShopClass->callbacks->model->columns_where->getName()->setSearch(true);
}
if ($Main->GPC_exists['callback_phone'] and $Main->GPC['callback_phone']!=''){
    $ShopClass->callbacks->model->columns_where->getPhone()->setValue($Main->GPC['callback_phone']);
    $ShopClass->callbacks->model->columns_where->getPhone()->setSearch(true);
}
if ($Main->GPC_exists['callback_status'] and $Main->GPC['callback_status']!=-1){
    $ShopClass->callbacks->model->columns_where->getStatus()->setValue($Main->GPC['callback_status']);
    $ShopClass->callbacks->model->columns_where->getStatus()->setSearch(true);
}
$ShopClass->callbacks->model->setOrderBy('callback_id DESC');
$ShopClass->callbacks->model->setStart($Paging->sql_start);
$ShopClass->callbacks->model->setCount($Paging->per_page);

$Paging->total = $ShopClass->callbacks->GetTotal();
$Paging->data = $ShopClass->callbacks->GetList();

$page_name='Заявки';
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

$Paging->Display('shop/manage/callbacks/table.twig',$array);