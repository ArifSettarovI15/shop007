<?php
$Main->user->PagePrivacy();
$statuses=$ShopClass->GetOrderStatus();
$payments=$ShopClass->GetPayments();
$delivery=$ShopClass->GetDeliveryMethods();

$order_info=false;
if ($Main->GPC['order_key']) {
    $ShopClass->orders->CreateModel();
    $ShopClass->orders->model->columns_where->getKey()->setValue($Main->GPC['order_key']);
    $order_info=$ShopClass->orders->GetItem();
}
elseif ($Main->GPC['id'] and $Main->user_info['user_id']>0) {
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

$breadcrumbs=array();
$breadcrumbs[]=array(
    'title'=>'Онлайн-оплата заказа #'.$order_info['order_id']
);

$Main->template->SetPageAttributes(
    array(
        'title'=>'Онлайн-оплата заказа #'.$order_info['order_id'],
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>$breadcrumbs,
        'title'=>'Онлайн-оплата заказа #'.$order_info['order_id']
    )
);

$order_items = $ShopClass->products->GetOrderItems($order_info['order_id']);

$order_items_sum=0;
$order_items_count=0;
foreach ($order_items as $a) {
    $order_items_count=$order_items_count+$a['oid_item_count'];
    $order_items_sum=$order_items_sum+$a['oid_item_count']*$a['oid_item_price'];
}
$total=format_money($total);

$Receipt_data=array(
	'items'=>array(),
	'calculationPlace'=>'xxx',
	'email'=>$order_info['order_user_email'],
	'phone'=>$order_info['order_user_phone'],
	'customerInfo'=>$order_info['order_user_name'],
	'customerInn'=>'',
	'isBso'=>false,
	'AgentSign'=>false,
	'amounts'=>array(
		'electronic'=>$order_items_sum,
		'advancePayment'=>0.00,
		'credit'=>0.00,
		'provision'=>0.00
	)
);

foreach ($order_items as $kk) {
	$Receipt_data['items'][]=array(
			'label'=>$kk['full_title'],
			'price'=>$kk['oid_item_price'],
			'quantity'=>$kk['oid_item_count'],
			'amount'=>($kk['oid_item_count']*$kk['oid_item_price']),
			'vat'=>20,
			'method'=>4,
			'object'=>1,
			'measurementUnit'=>'шт'
	);
}

$Main->template->Display(
    array(
        'order_info'=>$order_info,
        'statuses'=>$statuses,
        'payments'=>$payments,
        'order_items'=>$order_items,
        'item'=>$order_info,
        'order_items_sum'=>$order_items_sum,
        'order_items_count'=>$order_items_count,
	    'Receipt_data'=>json_encode($Receipt_data)
    ));
