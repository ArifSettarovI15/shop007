<?php
$Main->user->PagePrivacy();
if ($Main->GPC['ajax']) {
	$error='';
	$Main->input->clean_array_gpc('r', array(
		'name'=>TYPE_STR,
		'email'=>TYPE_STR
	));

	if ($Main->GPC['name']=='') {
		$error='Введите имя';
		$array['error_field']='name';
	}
	elseif ($Main->GPC['email']=='') {
		$error='Введите email';
		$array['error_field']='email';
	}
	elseif (is_valid_email($Main->GPC['email'])==false) {
		$error='Введите корректный email';
		$array['error_field']='email';
	}
	else {
		$ShopClass->subscribe->CreateModel();
		$ShopClass->subscribe->model->columns_where->getEmail()->setValue($Main->GPC['email']);
		$ShopClass->subscribe->Delete();

		$ShopClass->subscribe->CreateModel();
		$ShopClass->subscribe->model->columns_update->getListId()->setValue(1);
		$ShopClass->subscribe->model->columns_update->getEmail()->setValue($Main->GPC['email']);
		$ShopClass->subscribe->Insert();
		$text='Подписка успешно оформлена';
	}



	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}
	else {
		$array['text']=$text;
		$array['status']=true;
	}
	$Main->template->DisplayJson($array);
}
$Main->error->AccessDenied();
