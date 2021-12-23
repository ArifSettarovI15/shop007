<?php
$Main->user->PagePrivacy('admin');
if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));
	$item=false;
	if ($Main->GPC['object_id']) {
		$ShopClass->subscribe->CreateModel();
		$ShopClass->subscribe->model->columns_where->getId()->setValue($Main->GPC['object_id']);
		$item=$ShopClass->subscribe->GetItem();
	}



	if ($item) {
		$ShopClass->subscribe->CreateModel();
		$ShopClass->subscribe->model->columns_where->getEmail()->setValue($item['subscribe_email']);
		$status=$ShopClass->subscribe->Delete();
	}


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
	'subscribe_email'=>TYPE_STR
));


$Paging =new ClassPaging($Main,20,false,false);
$Paging->show_per_page=true;

$variables=array();
$ShopClass->subscribe->CreateModel();
$ShopClass->subscribe->model->setSelectField($ShopClass->subscribe->model->getTableName().'.*');
if ($Main->GPC_exists['subscribe_email'] and $Main->GPC['subscribe_email']!=''){
	$ShopClass->subscribe->model->columns_where->getEmail()->setValue($Main->GPC['subscribe_email']);
	$ShopClass->subscribe->model->columns_where->getEmail()->setSearch(true);
}
$ShopClass->subscribe->model->SetLists();
$ShopClass->subscribe->model->setGroupBy('subscribe_email');

$Paging->total=$ShopClass->subscribe->GetTotal();

$ShopClass->subscribe->model->setCount($Paging->per_page);
$ShopClass->subscribe->model->setStart($Paging->sql_start);


$ShopClass->subscribe_list->CreateModel();
$ShopClass->subscribe_list->model->setOrderByWithColumn('subscribe_email');
$variables['lists']=$ShopClass->subscribe_list->GetList();


$page_name='Рассылка';
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

$Paging->data=$ShopClass->subscribe->GetList();

$Paging->Display('shop/manage/subscribes_table.twig',$variables);