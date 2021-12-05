<?php
$Main->user->PagePrivacy('user,admin,manager');
$error='';
$error_field='';


if ($Main->GPC['action'] == 'process_subscribe2') {
	$Main->input->clean_array_gpc('r', array(
		'keys' => TYPE_ARRAY
	));


	$ShopClass->notify->CreateModel();
	$ShopClass->notify->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
	$ShopClass->notify->Delete();

	$ShopClass->notify->CreateModel();
	$ShopClass->notify->model->columns_update->getUserId()->setValue($Main->user_info['user_id']);
	foreach ($Main->GPC['keys'] as $id=>$status) {
		if ($status) {
			$ShopClass->notify->model->columns_update->getListId()->setValue($id);
			$ShopClass->notify->Insert();
		}
	}

	$array['text']='Настройки обновлены';
	$array['status']=true;

	$Main->template->DisplayJson($array);
}

if ($Main->GPC['action'] == 'process_subscribe') {
	$Main->input->clean_array_gpc('r', array(
		'keys' => TYPE_ARRAY
	));

	$ShopClass->subscribe->CreateModel();
	$ShopClass->subscribe->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
	$ShopClass->subscribe->Delete();

	$ShopClass->subscribe->CreateModel();
	$ShopClass->subscribe->model->columns_update->getUserId()->setValue($Main->user_info['user_id']);

	foreach ($Main->GPC['keys'] as $id=>$status) {
		if ($status) {
			$ShopClass->subscribe->model->columns_update->getListId()->setValue($id);
			$ShopClass->subscribe->Insert();
		}
	}
	$ShopClass->subscribe->CreateModel();
	$ShopClass->subscribe->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
	$data=$ShopClass->subscribe->GetList();
	$user_lists2=array();
	foreach ($data as $d) {
		$user_lists2[]=$d['notify_list_id'];
	}

	if (count($user_lists2)>0) {
		$su=1;
	}
	else {
		$su=0;
	}
	$Main->user->UpdateUserSubscribe($Main->user_info['user_id'], $su);

	$array['text']='Настройки обновлены';
	$array['status']=true;

	$Main->template->DisplayJson($array);
}


$page_name='Настройки';
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

$ShopClass->subscribe_list->CreateModel();
$lists=$ShopClass->subscribe_list->GetList();


$ShopClass->subscribe->CreateModel();
$ShopClass->subscribe->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
$data=$ShopClass->subscribe->GetList();
$user_lists=array();
foreach ($data as $d) {
	$user_lists[]=$d['subscribe_list_id'];
}


$ShopClass->notify_list->CreateModel();
$lists2=$ShopClass->notify_list->GetList();


$ShopClass->notify->CreateModel();
$ShopClass->notify->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
$data=$ShopClass->notify->GetList();
$user_lists2=array();
foreach ($data as $d) {
	$user_lists2[]=$d['notify_list_id'];
}

if (count($user_lists2)) {
	$su=1;
}
else {
	$su=0;
}
$Main->user->UpdateUserSubscribe($Main->user_info['user_id'], $su);

$Paging =new ClassPaging($Main,5,true,false);
$Paging->show_per_page=true;

$ShopClass->notify_data->CreateModel();
$ShopClass->notify_data->model->columns_where->getUserId()->inValues(array(0,$Main->user_info['user_id']));
$Paging->total=$ShopClass->notify_data->GetTotal();

$ShopClass->notify_data->model->setCount($Paging->per_page);
$ShopClass->notify_data->model->setStart($Paging->sql_start);
$ShopClass->notify_data->model->setOrderByWithColumn('id');
$ShopClass->notify_data->model->setOrderWay('DESC');
$notify_list_data=$ShopClass->notify_data->GetList();
$Paging->pages=$Paging->GetPages();

$paging_data=$Paging->GetPagesOptions();
if ($Main->GPC['ajax']==1) {
	$html=$Main->template->Render('frontend/components/notify/notify.twig',
		array(
			'notify_list_data' => $notify_list_data
		)
	);

	$array=array();
	$array['html']=$html;
	$array['paging']=$Paging->GetPagingTemplate2();
	$Main->template->DisplayJson($array);
}

if ($Main->user_profile['profile_notify']) {
	$Main->user->UpdateUserNotify($Main->user_info['user_id'],0);
	$Main->user_profile['profile_notify']=0;
}

$Main->template->Display(array(
		's_lists'=>$lists,
		'user_lists'=>$user_lists,
		's_lists2'=>$lists2,
		'user_lists2'=>$user_lists2,
		'notify_list_data'=>$notify_list_data,
		'paging_data'=>$paging_data,
		'adv'=>$ShopClass->getAdv(),
		'last_views'=>$ShopClass->getLastViews()
	)
);
