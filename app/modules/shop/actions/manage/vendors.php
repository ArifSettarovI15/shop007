<?php
$Main->user->PagePrivacy('admin');
if ($Main->GPC['action']=='update_status') {
    $Main->input->clean_array_gpc('r', array(
        'object_id'=>TYPE_UINT,
        'value'=>TYPE_BOOL
    ));

	$ShopClass->vendors->CreateModel();
	$ShopClass->vendors->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$ShopClass->vendors->model->columns_update->getStatus()->setValue($Main->GPC['value']);
	$status=$ShopClass->vendors->Update();

    $array=array();
    $array['status']=$status;
    if ($status) {
        $array['text']='Статус бренда обновлен';
    }
    else {
        $array['text']='Ошибка';
    }
    $Main->template->DisplayJson($array);
}
if ($Main->GPC['action']=='update_badge_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL,
		'type_id'=>TYPE_STR,
		'cat_id'=>TYPE_UINT
	));

	$status=false;
	if ($Main->GPC['type_id']=='minus' or $Main->GPC['type_id']=='pop') {
		$ShopClass->vendors->CreateModel();
		$ShopClass->vendors->model->columns_where->getId()->setValue($Main->GPC['object_id']);
		if ($Main->GPC['type_id']=='minus') {
			$ShopClass->vendors->model->columns_update->getMinus()->setValue($Main->GPC['value']);
		}
		elseif ($Main->GPC['type_id']=='pop') {
			$ShopClass->vendors->model->columns_update->getVendorPop()->setValue($Main->GPC['value']);
		}
		$status=$ShopClass->vendors->Update();
	}

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Бренд обновлен';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));

	$ShopClass->vendors->CreateModel();
	$ShopClass->vendors->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$status=$ShopClass->vendors->Delete();

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
$Main->input->clean_array_gpc('r', array(
    'vendor_id' => TYPE_UINT,
    'vendor_status'=>TYPE_NUM,
    'vendor_pop'=>TYPE_NUM,
    'vendor_new'=>TYPE_NUM,
    'vendor_premium'=>TYPE_NUM,
    'vendor_icon'=>TYPE_NUM,
    'vendor_bg'=>TYPE_NUM,
    'vendor_name'=>TYPE_STR,
    'order'=>TYPE_STR
));


$Paging =new ClassPaging($Main,20,false,false);
$Paging->show_per_page=true;

$variables=array();
$ShopClass->vendors->CreateModel();
if ($Main->GPC_exists['vendor_id'] and $Main->GPC['vendor_id']>0){
	$ShopClass->vendors->model->columns_where->getId()->setValue($Main->GPC['vendor_id']);
}
if ($Main->GPC_exists['vendor_status'] and $Main->GPC['vendor_status']!=-1){
	$ShopClass->vendors->model->columns_where->getStatus()->setValue($Main->GPC['vendor_status']);
}
else {
	$variables['vendor_status']=-1;
}
if ($Main->GPC_exists['vendor_icon'] and $Main->GPC['vendor_icon']!=-1){
	if ($Main->GPC['vendor_icon']==0) {
		$ShopClass->vendors->model->columns_where->getPhotoId()->setValue(0);
	}
	else {
		$ShopClass->vendors->model->columns_where->getPhotoId()->notValue(0);
	}
}
else {
	$variables['vendor_icon']=-1;
}
if ($Main->GPC_exists['vendor_pop'] and $Main->GPC['vendor_pop']!=-1){
	if ($Main->GPC['vendor_pop']==0) {
		$ShopClass->vendors->model->columns_where->getVendorPop()->setValue(0);
	}
	else {
		$ShopClass->vendors->model->columns_where->getVendorPop()->notValue(0);
	}
}
else {
	$variables['vendor_pop']=-1;
}
if ($Main->GPC_exists['vendor_new'] and $Main->GPC['vendor_new']!=-1){
	if ($Main->GPC['vendor_new']==0) {
		$ShopClass->vendors->model->columns_where->getNew()->setValue(0);
	}
	else {
		$ShopClass->vendors->model->columns_where->getNew()->notValue(0);
	}
}
else {
	$variables['vendor_new']=-1;
}

if ($Main->GPC_exists['vendor_bg'] and $Main->GPC['vendor_bg']!=-1){
	if ($Main->GPC['vendor_bg']==0) {
		$ShopClass->vendors->model->columns_where->getPhotoId2()->setValue(0);
	}
	else {
		$ShopClass->vendors->model->columns_where->getPhotoId2()->notValue(0);
	}
}
else {
	$variables['vendor_bg']=-1;
}


if ($Main->GPC_exists['vendor_name'] and $Main->GPC['vendor_name']!=''){
	$ShopClass->vendors->model->columns_where->getTitle()->setValue($Main->GPC['vendor_name']);
	$ShopClass->vendors->model->columns_where->getTitle()->setSearch(true);
}

$Paging->total=$ShopClass->vendors->GetTotal();



$ShopClass->vendors->model->setSelectField($ShopClass->vendors->model->getTableName().'.*');
$ShopClass->vendors->model->SetJoinImage('icon',$ShopClass->vendors->model->GetTableItemName('icon'));
$ShopClass->vendors->model->SetJoinImage('bg',$ShopClass->vendors->model->GetTableItemName('bg'));
$ShopClass->vendors->model->setCount($Paging->per_page);
$ShopClass->vendors->model->setStart($Paging->sql_start);

if ($Main->GPC_exists['order']){
	if ($Main->GPC['order']!='') {
		$ShopClass->vendors->model->setOrderByWithColumn($Main->GPC['order']);
	}
	$variables['order']=$Main->GPC['order'];
}
else {
	$ShopClass->vendors->model->setOrderByWithColumn($ShopClass->vendors->model->columns_where->getTitle()->getName());
	$variables['order']='name';
}


$page_name='Бренды';
$Main->template->SetPageAttributes(
    array(
        'title'=>$page_name,
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>array(
            array(
                'title'=>'Магазин',
                'link'=>BASE_URL.'/manager/shop/'
            ),
            array(
                'title'=>$page_name
            )
        ),
        'title'=>$page_name
    )
);

$Paging->data=$ShopClass->vendors->GetList();


$variables['countries']=$Main->sprav->GetSpravValues(
	array(
		'svid_status'=>1,
		'sprav_name'=>'strana',
		'show_order'=>true
	),
	'all'
);


$Paging->Display('shop/manage/vendors_table.html.twig',$variables);
