<?php
$Main->user->PagePrivacy();
$Main->input->clean_array_gpc('r', array(
	'status' => TYPE_UINT,
	'q' => TYPE_STR,
	'date_start'=>TYPE_STR,
	'date_end'=>TYPE_STR
));

$order_info=false;
if ($Main->GPC['order_key']) {
	$ShopClass->orders->CreateModel();
	$ShopClass->orders->model->columns_where->getKey()->setValue($Main->GPC['order_key']);
	$order_info=$ShopClass->orders->GetItem();
}
elseif ($Main->GPC['id']) {
	$ShopClass->orders->CreateModel();
	$ShopClass->orders->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
	$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['id']);
	$order_info=$ShopClass->orders->GetItem();

}

if ($Main->user_info['user_id']==0 and $order_info==false) {
	SiteRedirect();
	exit;
}

if ($order_info['order_payment_status']==0 and $order_info['order_status']>3 and $order_info['order_status']<10) {

}
else {
	SiteRedirect();
	exit;
}

$ShopClass->bill->CreateModel();
$ShopClass->bill->model->columns_where->getOrderId()->setValue($order_info['order_id']);
$bill_info=$ShopClass->bill->GetItem();

if ($bill_info) {
	$bill_info['bill_date']=date('d.m.Y', strtotime($bill_info['bill_time']));
}
else {

	if ($Main->user_profile['profile_company']) {
		$name=$Main->user_profile['profile_company'];
	}
	else {
		$name=$Main->user_profile['profile_lastname'].' '.$Main->user_profile['profile_name'];
	}

	$phone=$Main->user_profile['profile_phone'];


	$ShopClass->bill->CreateModel();
	$ShopClass->bill->model->columns_update->getOrderId()->setValue($order_info['order_id']);
	$ShopClass->bill->model->columns_update->getName()->setValue($name);
	$ShopClass->bill->model->columns_update->getPhone()->setValue($phone);
	$bill_id=$ShopClass->bill->Insert();
	$bill_date=date('d.m.Y');

	$bill_info=array(
		'bill_id'=>$bill_id,
		'bill_date'=>$bill_date,
		'bill_phone'=>$phone,
		'bill_name'=>$name
	);
}


$order_items = $ShopClass->products->GetOrderItems($order_info['order_id']);

$breadcrumbs=array();
$breadcrumbs[]=array(
	'title'=>'Счет #'.$bill_id
);

$Main->template->SetPageAttributes(
	array(
		'title'=>'Счет #'.$bill_id,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>'Счет #'.$bill_id
	)
);

$Main->template->Display(
	array(
		'order_info'=>$order_info,
		'bill_info'=>$bill_info,
		'order_items'=>$order_items
	));
