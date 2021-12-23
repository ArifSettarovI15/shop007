<?php
$Main->user->PagePrivacy('admin');

if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));

	$banner_info=$ShopClass->banners->GetItemById($Main->GPC['object_id']);

	$ShopClass->banners->CreateModel();
	$ShopClass->banners->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$status=$ShopClass->banners->Delete();

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

	$banner_info=$ShopClass->banners->GetItemById($Main->GPC['object_id']);

	$ShopClass->banners->CreateModel();
	$ShopClass->banners->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$ShopClass->banners->model->columns_update->getStatus()->setValue($Main->GPC['value']);

	$status=$ShopClass->banners->Update();

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Статус баннера обновлен';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}




/////////////////////////////////
$Main->input->clean_array_gpc('r', array(

));

$variables=array();

$page_name='Баннеры';
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

$Paging =new ClassPaging($Main,20,false,false);
$Paging->show_per_page=true;


$ShopClass->banners->CreateModel();

$ShopClass->banners->model->setSelectField($ShopClass->banners->model->getTableName().'.*');
$ShopClass->banners->model->JoinCats();
$ShopClass->banners->model->SetJoinImage('icon',$ShopClass->banners->model->GetTableItemName('photo_id'));
$Paging->data=$ShopClass->banners->GetList();
$Paging->Display('shop/manage/banners_table.twig',$variables);
