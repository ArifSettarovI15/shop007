<?php
require_once ROOT_DIR . '/app/modules/users/init.php';
$Main->user->PagePrivacy('admin');

$faqs_info=$ShopClass->faqs->GetItemById($Main->GPC['id'],1);
if ($faqs_info) {

}
else {
	$Main->error->ObjectNotFound();
}
if ($Main->GPC['action']=='sort_table') {
	$Main->input->clean_array_gpc('r', array(
		'data_sort' => TYPE_ARRAY_UINT
	));

	$pos=0;
	$ShopClass->faqs_list->CreateModel();

	foreach ($Main->GPC['data_sort'] as $line_key) {
		$ShopClass->faqs_list->model->columns_where->getId()->setValue($line_key);
		$ShopClass->faqs_list->model->columns_update->getSort()->setValue($pos);
		$ShopClass->faqs_list->Update();
		$pos++;
	}

	$array['status']=true;
	$array['text']='Позиции обновлены';
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));

	$banner_info=$ShopClass->faqs_list->GetItemById($Main->GPC['object_id']);

	$ShopClass->faqs_list->CreateModel();
	$ShopClass->faqs_list->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$status=$ShopClass->faqs_list->Delete();

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
if ($Main->GPC['action']=='sort_table') {
	$Main->input->clean_array_gpc('r', array(
		'data_sort' => TYPE_ARRAY_UINT
	));

	$pos=0;
	$ShopClass->faqs_list->CreateModel();

	foreach ($Main->GPC['data_sort'] as $line_key) {
		$ShopClass->faqs_list->model->columns_where->getId()->setValue($line_key);
		$ShopClass->faqs_list->model->columns_update->getSort()->setValue($pos);
		$ShopClass->faqs_list->Update();
		$pos++;
	}

	$array['status']=true;
	$array['text']='Позиции обновлены';
	$Main->template->DisplayJson($array);
}

if ($Main->GPC['action']=='update_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL
	));

	$banner_info=$ShopClass->faqs_list->GetItemById($Main->GPC['object_id']);

	$ShopClass->faqs_list->CreateModel();
	$ShopClass->faqs_list->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$ShopClass->faqs_list->model->columns_update->getStatus()->setValue($Main->GPC['value']);

	$status=$ShopClass->faqs_list->Update();

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




/////////////////////////////////
$Main->input->clean_array_gpc('r', array(

));

$variables=array();

$page_name=$faqs_info['faqs_title'];
$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>'Студия'
			),
			array(
				'title'=>'FAQ',
				'link'=>BASE_URL.'/manager/tiger/faqs/'
			),
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name
	)
);


$ShopClass->faqs_list->CreateModel();
$ShopClass->faqs_list->model->columns_where->getFaq()->setValue($Main->GPC['id']);
$ShopClass->faqs_list->model->setOrderByWithColumn($ShopClass->faqs_list->model->columns_where->getSort()->getName());
$list=$ShopClass->faqs_list->GetList();


$Main->template->Display(array(
		'list'=>$list,
		'faqs_info'=>$faqs_info
	)
);
