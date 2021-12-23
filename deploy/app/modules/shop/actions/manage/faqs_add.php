<?php
require_once ROOT_DIR . '/app/modules/users/init.php';
$Main->user->PagePrivacy('admin');

$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'faqs_id' => TYPE_UINT
	));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;
	$data_info=$ShopClass->faqs->GetItemById($Main->GPC['faqs_id'],1);
	if ($data_info) {

	}
	else {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
	$Main->input->clean_array_gpc('r', array(
		'faqs_id' => TYPE_UINT,
		'faqs_title'=>TYPE_STR
	));
	$photo_id=intval($Main->GPC[$photo_input]);
	$error='';
	$array=array();

	if ($Main->GPC['faqs_title']=='') {
		$error='Введите название';
		$array['error_field']='faqs_title';
	}
	else{
		$ShopClass->faqs->CreateModel();
		$ShopClass->faqs->model->columns_update->getTitle()->setValue($Main->GPC['faqs_title']);

		if ($Main->GPC['action'] == 'process_edit') {
			$id=$Main->GPC['faqs_id'];

			$ShopClass->faqs->model->columns_where->getId()->setValue($Main->GPC['faqs_id']);
			$result=$ShopClass->faqs->Update();

			if ($result ) {
				$array['status'] = true;
				$array['text'] = 'Значение успешно обновлено';
			} else {
				$array['text'] = 'Ошибка обновления';
			}

		} else {
			$id=$ShopClass->faqs->Insert();
			$array['text'] = 'Значение успешно добавлено';
			$array['status'] = true;
			$array['redirect'] = BASE_URL.'/manager/faqs/view/'.$id.'/';
		}
	}

	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}
	else {
		$array['status']=true;
		//$array['redirect']=BASE_URL.'/manager/tiger/sections/';
	}
	$Main->template->DisplayJson($array);
}

if ($edit==1) {
	$a_name='Редактировать';
}
else {
	$a_name='Добавить';
}

$page_name=$a_name.' faq';
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
				'title'=>'Faqs',
				'link'=>BASE_URL.'/manager/tiger/faqs/'
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
		'edit'=>$edit
	)
);
