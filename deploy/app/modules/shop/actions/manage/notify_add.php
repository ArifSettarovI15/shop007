<?php
$Main->user->PagePrivacy('admin');

$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'id' => TYPE_UINT
	));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;
	$data_info=$ShopClass->notify_data->GetItemById($Main->GPC['id']);
	if ($data_info) {

	}
	else {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
	$Main->input->clean_array_gpc('r', array(
		'notify_id' => TYPE_UINT,
		'notify_style' => TYPE_STR,
		'notify_list_id' => TYPE_UINT,
		'notify_text'=>TYPE_STR
	));

	$error='';
	$array=array();


	if ($Main->GPC['notify_style']=='') {
		$error='Выберите стиль';
		$array['error_field']='notify_style';
	}
	elseif ($Main->GPC['notify_list_id']==0) {
		$error='Выберите список';
		$array['error_field']='notify_list_id';
	}
	elseif ($Main->GPC['notify_text']=='') {
		$error='Аведите текст';
		$array['error_field']='notify_text';
	}
	else{

		$ShopClass->notify_data->CreateModel();
		$ShopClass->notify_data->model->columns_update->getStyle()->setValue($Main->GPC['notify_style']);
		$ShopClass->notify_data->model->columns_update->getListId()->setValue($Main->GPC['notify_list_id']);
		$ShopClass->notify_data->model->columns_update->getText()->setValue($Main->GPC['notify_text']);

		if ($Main->GPC['action'] == 'process_edit') {
			$id=$Main->GPC['notify_id'];

			$ShopClass->notify_data->model->columns_where->getId()->setValue($Main->GPC['notify_id']);
			$result=$ShopClass->notify_data->Update();

			if ($result ) {
				$array['status'] = true;
				$array['text'] = 'Значение успешно обновлено';
			} else {
				$array['text'] = 'Ошибка обновления';
			}

		} else {
			$id=$ShopClass->notify_data->Insert();

			$ShopClass->notify->CreateModel();
			$ShopClass->notify->model->columns_where->getListId()->setValue($Main->GPC['notify_list_id']);
			$data=$ShopClass->notify->GetList();
			foreach ($data as $d) {
				$Main->user->UpUserNotify($d['notify_user_id']);
			}

			$array['text'] = 'Значение успешно добавлено';
			$array['status'] = true;
		}
	}

	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}
	else {
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

$page_name=$a_name.' уведомление';
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
				'title'=>'Уведомления',
				'link'=>BASE_URL.'/manager/shop/notify/'
			),
			array(
				'title'=>$a_name
			),
		),
		'title'=>$page_name
	)
);


$ShopClass->notify_list->CreateModel();
$n_list=$ShopClass->notify_list->GetList();


$Main->template->Display(array(
		'info'=>$data_info,
		'edit'=>$edit,
		'n_list'=>$n_list
	)
);
