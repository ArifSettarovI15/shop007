<?php
$Main->user->PagePrivacy('user,admin,manager');
$error='';
$error_field='';

$ShopClass->products->CreateModel();
$ShopClass->products->model->SetJoinAll ();
$ShopClass->products->model->SetJoinLastViews();
$ShopClass->products->model->addWhereCustom( $ShopClass->products->SqlWherePrepare( 'simple', 'siv_sessionhash', $Main->user_info['sessionhash'] ) );
$ShopClass->products->model->setCount( 100);
$last_total = $ShopClass->products->GetTotal();


$ShopClass->orders->CreateModel();
$ShopClass->orders->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
$orders_total=$ShopClass->orders->GetTotal();

$ShopClass->orders->CreateModel();
$ShopClass->orders->model->setSelectField(' SUM(order_items_cost) as sum ');
$ShopClass->orders->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
$ShopClass->orders->model->columns_where->getStatus()->inValues(array(1,5,14,15,16,17));
$orders_total_sum=$ShopClass->orders->GetItem();
$orders_total_sum=format_money($orders_total_sum['sum']);

$ShopClass->orders->CreateModel();
$ShopClass->orders->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
$ShopClass->orders->model->columns_where->getStatus()->inValues(array(1,14,15,16,17));
$ShopClass->orders->model->setOrderByWithColumn('id');
$ShopClass->orders->model->setOrderWay('DESC');
$last_order=$ShopClass->orders->GetItem();

$variables['statuses'] = $ShopClass->GetOrderStatus();
$variables['payments'] = $ShopClass->GetPayments();
$variables['delivery'] = $ShopClass->GetDeliveryMethods();

if ($last_order) {
	$variables['order_items'][$last_order['order_id']] = $ShopClass->products->GetOrderItems($last_order['order_id']);
}



$page_name='Личный кабинет';
$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name

	)
);

$ShopClass->products->CreateModel();
$ShopClass->products->model->columns_where->getStatus()->setValue(true);
$ShopClass->products->model->columns_where->getNew()->setValue(true);
$new_items=$ShopClass->products->GetTotal();

$Main->template->Display(array(
		'orders_total'=>$orders_total,
		'orders_total_sum'=>$orders_total_sum,
		'last_total'=>$last_total,
		'adv'=>$ShopClass->getAdv(),
		'last_order'=>$last_order,
		'variables'=>$variables,
		'new_items'=>$new_items
	)
);
