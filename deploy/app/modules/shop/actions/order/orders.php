<?php
$Main->user->PagePrivacy('user,admin,manager');
$Main->input->clean_array_gpc('r', array(
	'status' => TYPE_UINT,
	'q' => TYPE_STR,
	'date_start'=>TYPE_STR,
	'date_end'=>TYPE_STR,
	'group_id'=>TYPE_UINT
));



if ($Main->GPC['action'] == 'cancel_order') {
	$Main->input->clean_array_gpc('r', array(
		'order_id' => TYPE_UINT,
		'type' => TYPE_UINT
	));

	$ShopClass->orders->CreateModel();
	$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);
	$order_info=$ShopClass->orders->GetItem();

	$array = array();
	$array['status'] = true;

	if ($order_info && $order_info['order_user_id'] == $Main->user_info['user_id']) {
		if ($order_info['order_status'] <5) {
			$array['text'] = 'Заказ отменен';
			$ShopClass->orders->CreateModel();
			$ShopClass->orders->model->columns_update->getStatus()->setValue(10);
			$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);

			$ShopClass->orders->Update();

			$ShopClass->order_history->CreateModel();
			$ShopClass->order_history->model->columns_update->getOrderStatusId()->setValue(10);
			$ShopClass->order_history->model->columns_update->getOrderId()->setValue($Main->GPC['order_id']);
			$ShopClass->order_history->Insert();

		} else {
			$array['text'] = 'Заказ уже в обработке. Его нельзя отменить';
			$array['status'] = false;
		}

	} else {
		$array['text'] = 'Такой заказ не существует';
		$array['status'] = false;
	}
	if ($array['status'] and $Main->GPC['type']==1) {
		$array['reload'] = true;
	}
	$Main->template->DisplayJson($array);
}

if ($Main->GPC['action'] == 'save_order_comment') {
	$Main->input->clean_array_gpc('r', array(
		'order_id' => TYPE_UINT,
		'value' => TYPE_STR
	));

	$ShopClass->orders->CreateModel();
	$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);
	$order_info=$ShopClass->orders->GetItem();

	$array = array();
	$array['status'] = true;
	if ($order_info && $order_info['order_user_id'] == $Main->user_info['user_id']) {

			$ShopClass->orders->CreateModel();
			$ShopClass->orders->model->columns_update->getComment()->setValue($Main->GPC['value']);
			$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);

			$ShopClass->orders->Update();


	} else {
		$array['status'] = false;
	}
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'delete_order') {
	$Main->input->clean_array_gpc('r', array(
		'order_id' => TYPE_UINT,
		'type' => TYPE_UINT
	));

	$ShopClass->orders->CreateModel();
	$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);
	$order_info=$ShopClass->orders->GetItem();

	$array = array();
	$array['status'] = true;
	if ($order_info && $order_info['order_user_id'] == $Main->user_info['user_id']) {
		if ($order_info['order_group_id'] == 4) {
			$array['text'] = 'Заказ удален из архива';

			$ShopClass->orders->CreateModel();
			$ShopClass->orders->model->columns_update->getStatus()->setValue(12);
			$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);

			$ShopClass->orders->Update();

		} else {
			$array['text'] = 'Заказ не может быть удален из архива';
			$array['status'] = false;
		}

	} else {
		$array['text'] = 'Такой заказ не существует';
		$array['status'] = false;
	}
	if ($array['status'] and $Main->GPC['type']==1) {
		$array['reload'] = true;
	}
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'unarchive_order') {
	$Main->input->clean_array_gpc('r', array(
		'order_id' => TYPE_UINT,
		'type' => TYPE_UINT
	));

	$ShopClass->orders->CreateModel();
	$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);
	$order_info=$ShopClass->orders->GetItem();

	$array = array();
	$array['status'] = true;
	if ($order_info && $order_info['order_user_id'] == $Main->user_info['user_id']) {
		if ($order_info['order_group_id'] == 4) {
			$array['text'] = 'Заказ восстановлен из архива';
			$statuses=$ShopClass->GetOrderStatus();

			$ShopClass->orders->CreateModel();
			$ShopClass->orders->model->columns_update->getGroupId()->setValue($statuses[$order_info['order_status']]['group_id']);
			$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);

			$ShopClass->orders->Update();

		} else {
			$array['text'] = 'Заказ не может быть восстановлен из архива';
			$array['status'] = false;
		}

	} else {
		$array['text'] = 'Такой заказ не существует';
		$array['status'] = false;
	}
	if ($array['status'] and $Main->GPC['type']==1) {
		$array['reload'] = true;
	}
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'archive_order') {
	$Main->input->clean_array_gpc('r', array(
		'order_id' => TYPE_UINT,
		'type' => TYPE_UINT
	));

	$ShopClass->orders->CreateModel();
	$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);
	$order_info=$ShopClass->orders->GetItem();

	$array = array();
	$array['status'] = true;
	if ($order_info && $order_info['order_user_id'] == $Main->user_info['user_id']) {
		if ($order_info['order_group_id'] != 4 and $order_info['order_payment_status']) {
			$array['text'] = 'Заказ отправлен в архив';
			$ShopClass->orders->CreateModel();
			$ShopClass->orders->model->columns_update->getGroupId()->setValue(4);
			$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['order_id']);

			$ShopClass->orders->Update();
		} else {
			$array['text'] = 'Заказ не может быть отправлен в архив';
			$array['status'] = false;
		}

	} else {
		$array['text'] = 'Такой заказ не существует';
		$array['status'] = false;
	}
	if ($array['status'] and $Main->GPC['type']==1) {
		$array['reload'] = true;
	}
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'mass_archive_order') {
	$Main->input->clean_array_gpc('r', array(
		'order_ids' => TYPE_ARRAY_INT
	));

	$array = array();
	$array['status'] = true;
	$array['text']='';

		$all=true;
		foreach ($Main->GPC['order_ids'] as $order_id) {
			if ($order_info && $order_info['order_user_id'] == $Main->user_info['user_id'] and $order_info['order_group_id'] == 1 and $order_info['order_payment_status']) {
				$array['text'] = 'Заказ отправлен в архив';
				$ShopClass->orders->CreateModel();
				$ShopClass->orders->model->columns_update->getGroupId()->setValue( 4 );
				$ShopClass->orders->model->columns_where->getId()->setValue( $order_id );
				$ShopClass->orders->Update();
			}
			else {
				$all=false;
			}
		}

		if ($all) {
			$array['text'] = 'Все заказы отправлены в архив';
		}
		else {
			$array['text'] = 'Часть заказов не было отправлено в архив';
		}




	$Main->template->DisplayJson($array);
}

$variables['statuses'] = $ShopClass->GetOrderStatus();
$variables['payments'] = $ShopClass->GetPayments();
$variables['delivery'] = $ShopClass->GetDeliveryMethods();


$ShopClass->orders->CreateModel();
$ShopClass->orders->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);

$Paging =new ClassPaging($Main,20,true,false);
$Paging->show_per_page=false;

if ($Main->GPC['q']) {
	$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['q']);
	$Main->GPC['group_id']=0;
}
if ($Main->GPC['date_start'] and $Main->GPC['date_end']) {
	$t=strtotime($Main->GPC['date_start'].' 00:00:00');
	$t2=strtotime($Main->GPC['date_end'].' 23:59:59');
	$ShopClass->orders->model->columns_where->getTime()->rangeValue($t,$t2);
}
elseif ($Main->GPC['date_start']) {
	$t=strtotime($Main->GPC['date_start'].' 00:00:00');
	$ShopClass->orders->model->columns_where->getTime()->moreValue($t);
}
elseif ($Main->GPC['date_end']) {
	$t=strtotime($Main->GPC['date_end'].' 23:59:59');
	$ShopClass->orders->model->columns_where->getTime()->lessValue($t);
}

$ShopClass->orders->model->columns_where->getStatus()->inValues(array());
if ($Main->GPC['status']==1) {
	$ShopClass->orders->model->columns_where->getStatus()->inValues(array(1,14,15,16,17));
}
elseif ($Main->GPC['status']==2) {
	$ShopClass->orders->model->columns_where->getStatus()->inValues(array(5));
}
elseif ($Main->GPC['status']==3) {
	$ShopClass->orders->model->columns_where->getStatus()->inValues(array(7,8,9,10,13));
}
if (!$Main->GPC['ajax']) {
	$Main->GPC['group_id']=3;
}
if ($Main->GPC['group_id']) {
	$ShopClass->orders->model->columns_where->getGroupId()->setValue($Main->GPC['group_id']);
}
$ShopClass->orders->model->columns_where->getStatus()->notValue(12);

$Paging->total=$ShopClass->orders->GetTotal();

$ShopClass->orders->model->setCount($Paging->per_page);
$ShopClass->orders->model->setStart($Paging->sql_start);

$Paging->data=array();

$variables['total_closed']=$Paging->total-$variables['total_opened'];

$variables['order_items']=array();
$variables['type']='numbers';

if ($Paging->total) {
	$ShopClass->orders->model->setOrderByWithColumn($ShopClass->orders->model->columns_where->getId()->getName());
	$ShopClass->orders->model->setOrderWay('DESC');
	$Paging->data=$ShopClass->orders->GetList();
}
$page_name='Мои заказы';
$ShopClass->orders->CreateModel();
$ShopClass->orders->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
$ShopClass->orders->model->columns_where->getStatus()->notValue(12);
$ShopClass->orders->model->setSelectField('count(order_id) as count, order_group_id');
$ShopClass->orders->model->setGroupByWithColumn('group_id');
$ShopClass->orders->model->setTablePrimaryKey('');
$orders_groups_count=$ShopClass->orders->GetList();

$variables['order_groups_count']=array();

$total=0;
$variables['order_groups']=$ShopClass->GetOrderGroups();

foreach ($variables['order_groups'] as $key=>$a) {
	$variables['order_groups_count'][$key]=0;
}
foreach ($orders_groups_count as $a) {
	$variables['order_groups_count'][$a['order_group_id']]=$a['count'];
	$total=$total+$a['count'];
}
$variables['order_groups_count'][0]=$total;



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
$variables['group_id']=$Main->GPC['group_id'];
if ($variables['group_id']==0 and $Main->GPC_exists['group_id']==false) {
	$variables['group_id']=3;
}
$variables['order_info']=$order_info;
$variables['show_profile_links']=true;
$variables['filters_html']=$Main->template->Render('frontend/components/orders/tabs.twig',array(
	'variables'=>$variables
));
$variables['insert_filters']=true;

$Paging->Display('frontend/components/order-info/orders_list.twig',$variables);


