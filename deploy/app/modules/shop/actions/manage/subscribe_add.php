<?php
$Main->user->PagePrivacy('admin');

$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'email' => TYPE_STR
	));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;
	$ShopClass->subscribe->CreateModel();
	$ShopClass->subscribe->model->columns_where->getEmail()->setValue($Main->GPC['email']);
	$data_info = $ShopClass->subscribe->GetItem();

	if ($data_info) {

	}
	else {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
	$Main->input->clean_array_gpc('r', array(
		'subscribe_id' => TYPE_UINT,
		'list' => TYPE_ARRAY,
		'subscribe_email'=>TYPE_STR
	));

	$error='';
	$array=array();

	if ($Main->GPC['subscribe_email']=='' or is_valid_email($Main->GPC['subscribe_email'])==false) {
		$error='Введите корректный  Email';
	}
	elseif (count($Main->GPC['list'])==0) {
		$error='Выберите категорию';
	}
	else {
		$ShopClass->subscribe->CreateModel();
		$ShopClass->subscribe->model->columns_where->getEmail()->setValue($Main->GPC['subscribe_email']);
		$ShopClass->subscribe->Delete();

		foreach ($Main->GPC['list'] as $item){
			$ShopClass->subscribe->CreateModel();
			$ShopClass->subscribe->model->columns_update->getListId()->setValue($item);
			$ShopClass->subscribe->model->columns_update->getEmail()->setValue($Main->GPC['subscribe_email']);
			$ShopClass->subscribe->Insert();
		}
	}


	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}
	else {
		$array['text']='Ок';
		$array['status']=true;
	}
	$Main->template->DisplayJson($array);
}

if ($edit==1) {
	$a_name='Редактировать';
}
else {
	$a_name='Добавить';
}

$page_name=$a_name.' Email';

$ShopClass->subscribe_list->CreateModel();
$ShopClass->subscribe_list->model->setOrderByWithColumn('subscribe_email');
$list=$ShopClass->subscribe_list->GetList();

$s_list=array();
if ($edit==1) {
	$ShopClass->subscribe->CreateModel();
	$ShopClass->subscribe->model->columns_where->getEmail()->setValue($data_info['subscribe_email']);
	$s_list=$ShopClass->subscribe->GetList();
	foreach ($s_list as $s1) {
		$s_list[]=$s1['subscribe_list_id'];
	}
}



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
				'title'=>'Рассылка',
				'link'=>BASE_URL.'/manager/shop/subscribes/'
			),
			array(
				'title'=>$a_name
			),
		),
		'title'=>$page_name
	)
);


$Main->template->Display(array(
		'info'=>$data_info,
		'list'=>$list,
		'list2'=>$s_list,
		'edit'=>$edit
	)
);