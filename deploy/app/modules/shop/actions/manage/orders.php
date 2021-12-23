<?php
$Main->user->PagePrivacy('admin,manager');

if ($Main->GPC['action']=='get_emails') {

	$ok=array();


	$ShopClass->orders->CreateModel();
	if ($Main->user_info['user_role_id']==3) {
		$ShopClass->orders->model->addWhereCustom('user_manager_id='.$Main->db->sql_prepare($Main->user_info['user_id']));
	}
	else {
		if ($Main->GPC_exists['user_manager_id'] and $Main->GPC['user_manager_id']!=-1){
			$ShopClass->orders->model->addWhereCustom('user_manager_id='.$Main->db->sql_prepare($Main->GPC['user_manager_id']));
		}
	}

	$variables['order_status']=-1;
	$ShopClass->orders->model->SetJoinManagers();
	$ShopClass->orders->model->SetJoinItems();
	$ShopClass->orders->model->setOrderByWithColumn($ShopClass->orders->model->columns_where->getId()->getName());
	$ShopClass->orders->model->setOrderWay('DESC');
	$data=$ShopClass->orders->GetList();


	ob_start();
	$fp = fopen('php://output','w');
	fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

	$fields=array(
		'Email',
		'Имя'
	);
	fputcsv($fp, $fields,';');

	foreach ($data as $row)
	{
		if ($row['order_user_email'] and in_array($row['order_user_email'], $ok)==false) {
			$ok[]=$row['order_user_email'];
			$fields=array(
				$row['order_user_email'],
				$row['order_user_name']
			);
			fputcsv($fp, $fields,';');
		}


	}
	fclose($fp);

	header("Content-type: text/csv");
	header("Cache-Control: no-store, no-cache");
	header('Content-Disposition: attachment; filename="smak_emails.csv"');
	header('Expires: 0');
	header('Content-Length: '. ob_get_length());


	ob_end_flush();
	exit;
}

if ($Main->GPC['action']=='update_badge_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL,
		'type_id'=>TYPE_STR
	));

	$status=false;

	if ($Main->GPC['type_id']=='payment' ) {
		$ShopClass->orders->CreateModel();
		$ShopClass->orders->model->columns_update->getPaymentStatus()->setValue($Main->GPC['value']);

		$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['object_id']);
		$ShopClass->orders->Update();
		$status=true;
	}

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Заказ обновлен';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}


$Main->input->clean_array_gpc('r', array(
	'order_id'=>TYPE_UINT,
	'order_status'=>TYPE_NUM,
	'date_from'=>TYPE_STR,
	'date_to'=>TYPE_STR,
	'order_name'=>TYPE_STR,
	'order_city'=>TYPE_UINT,
	'user_manager_id'=>TYPE_NUM
));


$ShopClass->orders->CreateModel();

if ($Main->user_info['user_role_id']==3) {
	$ShopClass->orders->model->addWhereCustom('user_manager_id='.$Main->db->sql_prepare($Main->user_info['user_id']));
}
else {
	if ($Main->GPC_exists['user_manager_id'] and $Main->GPC['user_manager_id']!=-1){
		$ShopClass->orders->model->addWhereCustom('user_manager_id='.$Main->db->sql_prepare($Main->GPC['user_manager_id']));
	}
}

if ($Main->GPC_exists['order_status'] and $Main->GPC['order_status']!=-1){
	$ShopClass->orders->model->columns_where->getStatus()->setValue($Main->GPC['order_status']);
	$variables['order_status']=$Main->GPC['order_status'];
}
else {
	$variables['order_status']=-1;
}
if ($Main->GPC['order_id']){
	$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);
}
if ($Main->GPC['date_from']){
	$date_from=strtotime($Main->GPC['date_from'].' 00:00:00');
	$ShopClass->orders->model->columns_where->getTime()->moreValue($date_from);
}
if ($Main->GPC['date_to']){
	$date_to=strtotime($Main->GPC['date_to'].' 00:00:00');
	$ShopClass->orders->model->columns_where->getTime()->lessValue($date_to);
}
if ($Main->GPC['order_city']){
	$ShopClass->orders->model->columns_where->getTime()->setValue($Main->GPC['order_city']);
}

if ($Main->GPC['order_name']){
	$ShopClass->orders->model->addWhereCustom('(
		'.$ShopClass->orders->SqlWherePrepare('like',$ShopClass->orders->model->GetTableItemName('user_lastname'),$Main->GPC['order_name']).' or 
		'.$ShopClass->orders->SqlWherePrepare('like',$ShopClass->orders->model->GetTableItemName('user_name'),$Main->GPC['order_name']).'
		
	)');
}


$variables['statuses']=$ShopClass->GetOrderStatus();
$page_name='Заказы';
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
$ShopClass->orders->model->SetJoinManagers();
$Paging->total=$ShopClass->orders->GetTotal();

if ($Main->GPC['action']=='search') {
	$ShopClass->orders->model->setCount(100);
}
else {
	$ShopClass->orders->model->setCount($Paging->per_page);
}

$ShopClass->orders->model->setStart($Paging->sql_start);

$ShopClass->orders->model->SetJoinItems();

$ShopClass->orders->model->setOrderByWithColumn($ShopClass->orders->model->columns_where->getId()->getName());
$ShopClass->orders->model->setOrderWay('DESC');
$Paging->data=$ShopClass->orders->GetList();

$filter_options=array();
$filter_options['order']='name';
$filter_options['user_role_id']=3;
$filter_options['status']=1;
$variables['managers']=$Main->user->GetUsers($filter_options,100);

$Paging->Display('shop/manage/orders_table.html.twig',$variables);
