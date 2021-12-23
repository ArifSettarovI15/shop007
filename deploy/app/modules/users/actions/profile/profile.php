<?php
$Main->user->PagePrivacy('user,admin,manager');
$error='';
$error_field='';

$ShopClass->delivery_cities->CreateModel();
$ShopClass->delivery_cities->model->columns_where->getCat()->setValue(0);
$ShopClass->delivery_cities->model->setOrderBy('city_title');
$cities=$ShopClass->delivery_cities->GetList();


if ($Main->GPC['action'] == 'delete-user-addr') {
	$Main->input->clean_array_gpc('r', array(
		'id' => TYPE_UINT
	));


	if ($Main->GPC['id']==0) {
		$error='Введите id';
	}

	$array=array(
		'text'=>''
	);
	if ($error=='') {
		$ShopClass->delivery_user->DeleteUserAddr($Main->user_info['user_id'],$Main->GPC['id']);
		$array['text']='Адрес доставки удален';
	}


	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
		$array['error_field']=$error_field;
	}
	else {
		$array['status']=true;
	}
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'get-del') {
	$Main->input->clean_array_gpc('r', array(
		'id' => TYPE_UINT
	));

	$addr=$ShopClass->delivery_user->GetUserAddrById($Main->GPC['id'], $Main->user_info['user_id']);
	if ($addr) {
		$array['html']=$Main->template->Render('frontend/components/modal-personal-ship/modal-personal-ship.twig', array(
			'addr'=>$addr,
			'skip_addr'=>1,
			'cities'=>$cities,
		));
		$array['status']=true;
	}
	else {
		$array['status']=false;
	}

	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'process_profile_edit3_up') {
	$Main->input->clean_array_gpc('r', array(
		'city' => TYPE_UINT,
		'addr' => TYPE_STR,
		'fio' => TYPE_STR,
		'id'=>TYPE_UINT
	));

	if ($Main->GPC['city']==0) {
		$error='Введите город';
		$error_field='city';
	}
	elseif ($Main->GPC['addr']=='') {
		$error='Введите адрес';
		$error_field='addr';
	}
	$array=array(
		'text'=>''
	);
	if ($error=='') {
		$Main->db->query_write("UPDATE users_delivery
		SET 
		delivery_to_name=".$Main->db->sql_prepare($Main->GPC['fio']).",
		delivery_city=".$Main->db->sql_prepare($Main->GPC['city']).",
		delivery_addr=".$Main->db->sql_prepare($Main->GPC['addr'])."
		WHERE delivery_user_id=".$Main->db->sql_prepare($Main->user_info['user_id'])." AND
		delivery_id=".$Main->db->sql_prepare($Main->GPC['id']));
		$array['text']='Адрес доставки успешно обновлен';
	}


	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
		$array['error_field']=$error_field;
	}
	else {
		$array['status']=true;
		$array['html']=$Main->template->Render('frontend/components/del-list/del-list.twig', array(
			'addr'=>$ShopClass->delivery_user->GetUserAddr($Main->user_info['user_id']),
			'cities'=>$cities
		));
	}
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'process_profile_edit3') {
	$Main->input->clean_array_gpc('r', array(
		'city' => TYPE_UINT,
		'addr' => TYPE_STR,
		'fio' => TYPE_STR
	));


	if ($Main->GPC['city']=='') {
		$error='Введите город';
		$error_field='city';
	}
	elseif ($Main->GPC['addr']=='') {
		$error='Введите адрес';
		$error_field='addr';
	}
	$array=array(
		'text'=>''
	);
	if ($error=='') {
		$Main->db->query_write("INSERT INTO users_delivery
		(delivery_user_id,delivery_to_name,delivery_type, delivery_city, delivery_addr) VALUES(
		".$Main->db->sql_prepare($Main->user_info['user_id']).",
		".$Main->db->sql_prepare($Main->GPC['fio']).",
		".$Main->db->sql_prepare('home').",
		".$Main->db->sql_prepare($Main->GPC['city']).",
		".$Main->db->sql_prepare($Main->GPC['addr'])."
		)");
		$array['text']='Адрес доставки успешно добавлен';
	}


	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
		$array['error_field']=$error_field;
	}
	else {
		$array['status']=true;
		$array['html']=$Main->template->Render('frontend/components/del-list/del-list.twig', array(
			'addr'=>$ShopClass->delivery_user->GetUserAddr($Main->user_info['user_id']),
			'cities'=>$cities
		));
	}
	$Main->template->DisplayJson($array);
}


if ($Main->GPC['action'] == 'process_profile_edit4') {
	$Main->input->clean_array_gpc('r', array(
		'profile_bank'=>TYPE_STR,
		'profile_bik'=>TYPE_STR,
		'profile_bank_account'=>TYPE_STR,
		'profile_corr_account'=>TYPE_STR
	));

	$profile_data=array(
		'profile_bank'=>$Main->GPC['profile_bank'],
		'profile_bik'=>$Main->GPC['profile_bik'],
		'profile_bank_account'=>$Main->GPC['profile_bank_account'],
		'profile_corr_account'=>$Main->GPC['profile_corr_account']
	);


		$Main->user->UpdateProfileData($Main->user_info['user_id'],$profile_data);
		$array['text']='Ваш профиль успешно обновлен.';
		$Main->user_info=$Main->user->GetUserById($Main->user_info['user_id']);
		$Main->user_profile=$Main->user->GetUserProfile($Main->user_info['user_id']);


		$array['status']=true;
		$array['reload']=true;

	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'process_profile_edit2') {
	$array=array(
		'text'=>''
	);

	$Main->input->clean_array_gpc('r', array(
		'old_password' => TYPE_NOCLEAN,
		'password' => TYPE_NOCLEAN,
		'password2' => TYPE_NOCLEAN
	));

	$error='';
	$user_data=$Main->user->GetUserById($Main->user_info['user_id']);
	$entered_password=sha1($user_info['user_salt']. sha1($user_info['user_salt']. sha1($Main->GPC['old_password'])));
	if ($Main->GPC['old_password']=='') {
		$error='Введите текущий пароль';
		$error_field='old_password';
	}
	elseif ($Main->GPC['password']=='') {
		$error='Введите новый пароль';
		$error_field='password';
	}
	elseif ($Main->GPC['password2']=='') {
		$error='Введите повторно новый пароль';
		$error_field='password2';
	}
	elseif ($Main->GPC['password2']!=$Main->GPC['password']) {
		$error='Новые пароли не совпадают';
		$error_field='password,password2';
	}
	elseif ( $entered_password!= $user_data['user_password']) {
		$error='Текущий пароль введен не верно';
		$error_field='old_password';
	}
	else {
		$Main->user->UpdateUserPassword($Main->user_info['user_id'],$Main->GPC['password']);
		$array['text'].=' Пароль успешно обновлен';
	}


	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
		$array['error_field']=$error_field;
	}
	else {
		$array['status']=true;
		$array['reload']=true;
	}
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'process_profile_edit') {
	$Main->input->clean_array_gpc('r', array(
		'name' => TYPE_STR,
		'lastname' => TYPE_STR,
		'phone' => TYPE_STR,
		'email' => TYPE_STR,
		'city' => TYPE_STR,
		'company' => TYPE_STR,
		'inn'=>TYPE_STR,
		'kpp'=>TYPE_STR,
		'ogrn'=>TYPE_STR,
		'site'=>TYPE_STR
	));

	$profile_data=array(
		'profile_name'=>$Main->GPC['name'],
		'profile_lastname'=>$Main->GPC['lastname'],
		'profile_phone'=>$Main->GPC['phone'],
		'profile_company'=>$Main->GPC['company'],
		'profile_city'=>$Main->GPC['city'],
		'profile_inn'=>$Main->GPC['inn'],
		'profile_kpp'=>$Main->GPC['kpp'],
		'profile_ogrn'=>$Main->GPC['ogrn'],
		'profile_site'=>$Main->GPC['site']
	);

	if ($Main->GPC['name']=='') {
		$error=$Main->lang->data['enter_name'];
		$error_field='name';
	}
	elseif ($Main->GPC['phone']=='') {
		$error=$Main->lang->data['enter_phone'];
		$error_field='phone';
	}
	elseif ($Main->GPC['email']=='') {
		$error='Введите email';
		$error_field='email';
	}
	elseif ($Main->GPC['email']!='' and is_valid_email($Main->GPC['email'])==false) {
		$error='Введите корректный email';
		$error_field='email';
	}
	$array=array(
		'text'=>''
	);
	if ($error=='') {
		$Main->user->UpdateProfileData($Main->user_info['user_id'],$profile_data);
		$array['text']='Ваш профиль успешно обновлен.';
		$Main->user_info=$Main->user->GetUserById($Main->user_info['user_id']);
		$Main->user_profile=$Main->user->GetUserProfile($Main->user_info['user_id']);
	}

	$Main->input->clean_array_gpc('r', array(
		'email' => TYPE_STR
	));

	if ($error=='' && $Main->GPC['email'] && $Main->GPC['email']!=$Main->user_info['user_email']) {

		list($error, $error_field) = $Main->user->ProcessChangeEmail($Main->user_info['user_id'], $Main->GPC["email"]);
		if ($error=='') {
			$array['text'] .= ' '.$Main->lang->SetVars(
					$Main->lang->data['users']['change_email_sent'],
					array(
						$Main->GPC["email"]
					)
				);
		}


	}

	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
		$array['error_field']=$error_field;
	}
	else {
		$array['status']=true;
		$array['reload']=true;
	}
	$Main->template->DisplayJson($array);
}



$page_name='Профиль';
$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>'Личный кабинет',
				'link'=>BASE_URL.'/account/'
			),
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name

	)
);


$Main->template->Display(array(
		'show_profile_links'=>true,
		'cities'=>$cities,
		'addr'=>$ShopClass->delivery_user->GetUserAddr($Main->user_info['user_id']),
		'user_balance'=> $ShopClass->orders->getUnpaidSum( $Main->user_info['user_id'] )
	)
);
