<?php
$Main->user->PagePrivacy('admin');


if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));

	$city_info=$ShopClass->delivery_cities->GetItemById($Main->GPC['object_id']);

	$ShopClass->delivery_cities->CreateModel();
	$ShopClass->delivery_cities->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$status=$ShopClass->delivery_cities->Delete();

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

	$city_info=$ShopClass->delivery_cities->GetItemById($Main->GPC['object_id']);

	$ShopClass->delivery_cities->CreateModel();
	$ShopClass->delivery_cities->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$ShopClass->delivery_cities->model->columns_update->getStatus()->setValue($Main->GPC['value']);

	$status=$ShopClass->delivery_cities->Update();

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Статус города обновлен';
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
		'type_id'=>TYPE_STR
	));

	$status=false;

	$info=$ShopClass->delivery_cities->GetItemById($Main->GPC['object_id']);

	if ($Main->GPC['type_id']=='show'
	) {
		$ShopClass->delivery_cities->CreateModel();
		$ShopClass->delivery_cities->model->columns_where->getId()->setValue($Main->GPC['object_id']);
		if ($Main->GPC['type_id']=='show') {
			$ShopClass->delivery_cities->model->columns_update->getShow()->setValue($Main->GPC['value']);
		}
		$status=$ShopClass->delivery_cities->Update();

	}

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Город обновлен';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}



/////////////////////////////////
$Main->input->clean_array_gpc('r', array(
	'city_title' => TYPE_STR,
	'city_url' => TYPE_STR,
	'city_id' => TYPE_UINT,
	'city_status' => TYPE_NUM
));

$variables=array();

$page_name='Города';
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
				'title'=>'Доставка'
			),
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name
	)
);

$Paging =new ClassPaging($Main,1000,false,false);
$Paging->show_per_page=true;


$ShopClass->delivery_cities->CreateModel();

if ($Main->GPC_exists['city_id'] and $Main->GPC['city_id']>0){

	$ShopClass->delivery_cities->model->columns_where->getId()->setValue($Main->GPC['city_id']);
}

if ($Main->GPC_exists['city_status'] and $Main->GPC['city_status']!=-1){
	$ShopClass->delivery_cities->model->columns_where->getStatus()->setValue($Main->GPC['city_status']);
	$variables['city_status']=$Main->GPC['city_status'];
}
else {
	$variables['city_status']=-1;
}
if ($Main->GPC_exists['city_title'] and $Main->GPC['city_title']!=''){
	$ShopClass->delivery_cities->model->columns_where->getTitle()->setValue($Main->GPC['city_title']);
	$ShopClass->delivery_cities->model->columns_where->getTitle()->setSearch(true);
}

if ($Main->GPC_exists['city_url'] and $Main->GPC['city_url']!=''){
	$ShopClass->delivery_cities->model->columns_where->getUrl()->setValue($Main->GPC['city_url']);
	$ShopClass->delivery_cities->model->columns_where->getUrl()->setSearch(true);
}

$variables['groups']=$ShopClass->days->getGroups();

$Paging->total=$ShopClass->delivery_cities->GetTotal();

$ShopClass->delivery_cities->model->setSelectField($ShopClass->delivery_cities->model->getTableName().'.*');
$ShopClass->delivery_cities->model->SetJoinImage('icon',$ShopClass->delivery_cities->model->GetTableItemName('icon'));

$ShopClass->delivery_cities->model->setOrderBy('city_title');
$Paging->data=$ShopClass->delivery_cities->GetList();
$Paging->Display('shop/manage/delivery_cities_table.twig',$variables);
