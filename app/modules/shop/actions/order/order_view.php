<?php
$Main->user->PagePrivacy();

$order_info=false;
if ($Main->GPC['order_key'] and $Main->GPC['order_key']!='') {
	$ShopClass->orders->CreateModel();
	$ShopClass->orders->model->columns_where->getKey()->setValue($Main->GPC['order_key']);
	$order_info=$ShopClass->orders->GetItem();
}
elseif ($Main->GPC['id'] and intval($Main->GPC['id'])>0 and $Main->user_info['user_id']>0) {
	$ShopClass->orders->CreateModel();
	$ShopClass->orders->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
	$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['id']);
	$order_info=$ShopClass->orders->GetItem();
}

if ($order_info==false) {
	$Main->error->ObjectNotFound();
	exit;
}

$filter_s=array();
$filter_s['key']='contacts';
$filter_s['show_order']=true;
$contacts=$SettingsClass->GetGroupValues($filter_s);
$statuses = $ShopClass->GetOrderStatus();
$payments = $ShopClass->GetPayments();
$delivery = $ShopClass->GetDeliveryMethods();


if ($Main->GPC['action']=='send_chat') {
	$Main->input->clean_array_gpc('r', array(
		'text'=>TYPE_STR
	));

	$text='';
	$html='';
	$status=true;
	if ($Main->user_info['user_id']==0) {
		$text='Войдите в аккаунт';
		$status=false;
	}
	elseif ($Main->GPC['text']=='') {
		$text='Введите текст';
		$status=false;
	}
	else {
		$Main->db->query_write("INSERT INTO `shop_chat`
                (`chat_order_id`,`chat_text`)
                VALUES (
                ".$Main->db->sql_prepare($order_info['order_id']).",
                ".$Main->db->sql_prepare($Main->GPC['text'])."
                )
          ");
		$text='Сообщение отправлено';

		$order_comments=array();
		$result=$Main->db->query_read("SELECT *
        FROM `shop_chat`
        WHERE chat_order_id=".$Main->db->sql_prepare($order_info['order_id']).'
        ORDER BY chat_id DESC');

		while ($result_item = $Main->db->fetch_array($result))
		{
			$order_comments[]=$result_item;
		}

		$html=$Main->template->Render('frontend/components/chat/items.twig',array(
			'order_comments'=>$order_comments
		));

		$content = $Main->template->Render('shop/order/new_comment.twig',
			array(
				'title' => 'Комментарий к заказу #' . $order_info['order_id'],
				'text' => $Main->GPC['text'],
				'order_id' => $order_info['order_id'],
			)
		);
		$mail_to = $Main->template->global_vars['fields']['about']['email_notify'];

		$from_array = array(
			$Main->config['system']['email_addr'] => $Main->template->global_vars['fields']['about']['about_name']
		);
		$to_array = array(
			$mail_to
		);
		$ShopClass->SendNewOrder('Комментарий к заказу #' . $order_info['order_id'], $from_array, $to_array, $content);

		$users=$Main->user->GetUsers(
			array(
				'user_role_id'=>2,
				'status'=>1
			)
		);
		$title='Комментарий к заказу #'.$order_info['order_id'];
		$no_content='<p>'.$Main->GPC['text'].'</p>';
		$ShopClass->notify_admin->CreateModel();
		$ShopClass->notify_admin->model->columns_update->getTitle()->setValue($title);
		$ShopClass->notify_admin->model->columns_update->getText()->setValue($no_content);
		$ShopClass->notify_admin->model->columns_update->getLink()->setValue(BASE_URL.'/manager/shop/orders/view/'.$order_info['order_id'].'/');
		foreach ($users as $user) {
			$ShopClass->notify_admin->model->columns_update->getUserId()->setValue($user['user_id']);
			$ShopClass->notify_admin->Insert();
		}
	}


	$Main->template->DisplayJson(
		array(
			'status'=>true,
			'text'=>$text,
			'html'=>$html
		)
	);

}


if ($Main->GPC['action']=='process_order' or $Main->GPC['action']=='process_temp') {
	$Main->input->clean_array_gpc('r', array(
		'delivery'=>TYPE_STR,
		'delivery_index'=>TYPE_STR,
		'pickup_id'=>TYPE_STR,

		'delivery_city_id'=>TYPE_UINT,
		'delivery_addr'=>TYPE_STR,
		'comment'=>TYPE_STR,
		'payment' => TYPE_STR,
		'name'=>TYPE_STR,
		'lastname'=>TYPE_STR,
		'phone'=>TYPE_STR,
		'email'=>TYPE_STR,
		'note'=>TYPE_STR
	));

	$reg_error='';
	$new_user=0;
	$register_data=array();
	$user_id=0;

	$lastname=$Main->GPC['lastname'];
	$name=$Main->GPC['name'];
	$email=$Main->GPC['email'];
	$phone=$Main->GPC['phone'];

	if ($Main->user_info['user_id']>0) {
		$user_id=$Main->user_info['user_id'];
	}


	if ($Main->GPC['action']=='process_order') {
		if ($name=='') {
			$error='Введите имя';
		}
		elseif ($email and is_valid_email($email)==false) {
			$error='Введите корректный email';
		}
		elseif ($phone=='') {
			$error='Введите телефон или войдите в свой аккаунт';
		}
		elseif ($Main->GPC['delivery']=='' OR !$delivery[$Main->GPC['delivery']]) {
			$error='Выберите способ доставки';
		}
		elseif ($Main->GPC['pickup_id']=='' && $Main->GPC['delivery']=='pickup') {
			$error='Выберите магазин самовывоза';
		}
		elseif ($Main->GPC['delivery_city_id']==0 && $Main->GPC['delivery']=='dostavkaplus') {
			$error='Выберите город доставки';
		}
		elseif ($Main->GPC['delivery_addr']=='' && $Main->GPC['delivery']=='dostavkaplus') {
			$error='Введите адрес доставки';
		}

		elseif ($Main->GPC['payment']=='' OR !$payments[$Main->GPC['payment']]) {
			$error='Выберите способ оплаты';
		}
	}

	if ($error=='') {
		$items_cost=$order_info['order_items_cost'];
		$Main->template->global_vars['delivery_cities'] = $ShopClass->delivery_cities->getDeliveryCities();
		$delivery_cost=0;
		$cancel_payment_cost=false;

		$total_cost=$items_cost+$delivery_cost;

		$delivery_city='';
		$delivery_addr='';

		if ($Main->GPC['delivery']=='pickup' and isset($contacts['shops'][$Main->GPC['pickup_id']])) {
			$delivery_city=$contacts['shops'][$Main->GPC['pickup_id']]['shop_city'];
			$delivery_addr=$contacts['shops'][$Main->GPC['pickup_id']]['shop_street'];
		}
		if ($Main->GPC['delivery']=='dostavkaplus') {
			$delivery_city=$Main->template->global_vars['delivery_cities'][$Main->GPC['delivery_city_id']]['city_title'];
			$delivery_addr=$Main->GPC['delivery_addr'];
			$k='';
			if ($Main->GPC['delivery_city']) {
				$k.=$Main->GPC['delivery_city'].', ';
			}
			$delivery_addr=$k.$delivery_addr;
		}

		if ($Main->user_info['user_id']>0) {
			$user_stat_balance = $ShopClass->orders->getUnpaidSum( $Main->user_info['user_id'] )-$total_cost;

			if ( $ShopClass->orders->checkOrderCreditLimit( $user_stat_balance, $Main->user_profile['profile_credit'] ) == false ) {
				$error='Ваш кредитный лимит исчерпан. Вы можете сохранить заказ в черновик';
			}

			$unpaid_time = $ShopClass->orders->getFirstUnpaidTime( $Main->user_info['user_id'] );

			if ($ShopClass->orders->checkOrderTimeLimit( $unpaid_time, $Main->user_profile['profile_timeout'] ) == false) {
				$error='У Вас есть просроченный платеж. Вы можете сохранить заказ в черновик';
			}

		}


		if ($error=='') {
			$order_items = $ShopClass->products->GetOrderItems($order_info['order_id']);
			$order_items_sum=0;
			foreach ($order_items as $a) {
				$order_items_sum=$order_items_sum+$a['oid_item_count']*$a['offer_price'];
			}
			if (count($order_items)==0) {
				$error='Выберите товары для заказа';
			}
			else {

				$ShopClass->orders->CreateModel();
				$ShopClass->orders->model->columns_update->getUserId()->setValue($user_id);
				$ShopClass->orders->model->columns_update->getUserLastname()->setValue($lastname);
				$ShopClass->orders->model->columns_update->getUserName()->setValue($name);
				$ShopClass->orders->model->columns_update->getUserPhone()->setValue($phone);
				$ShopClass->orders->model->columns_update->getUserEmail()->setValue($email);
				$ShopClass->orders->model->columns_update->getStatus()->setValue(2);
				$ShopClass->orders->model->columns_update->getGroupId()->setValue(3);
				$ShopClass->orders->model->columns_update->getPayment()->setValue($Main->GPC['payment']);
				$ShopClass->orders->model->columns_update->getDelivery()->setValue($Main->GPC['delivery']);
				$ShopClass->orders->model->columns_update->getDeliveryAddr()->setValue($delivery_addr);
				$ShopClass->orders->model->columns_update->getDeliveryCity()->setValue($delivery_city);
				$ShopClass->orders->model->columns_update->getComment()->setValue($Main->GPC['comment']);
				$ShopClass->orders->model->columns_update->getDeliveryCost()->setValue(0);
				$ShopClass->orders->model->columns_update->getItemsCost()->setValue($order_items_sum);
				$ShopClass->orders->model->columns_update->getTotalCost()->setValue($order_items_sum);
				$ShopClass->orders->model->columns_where->getId()->setValue($order_info['order_id']);
				$ShopClass->orders->Update();

				$ShopClass->order_history->CreateModel();
				$ShopClass->order_history->model->columns_update->getOrderStatusId()->setValue(2);
				$ShopClass->order_history->model->columns_update->getOrderId()->setValue($order_info['order_id']);
				$ShopClass->order_history->Insert();

				$array['redirect']='/orders/'.$order_info['order_id'].'/';
			}
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
if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));
	$ShopClass->order_items->CreateModel();
	$ShopClass->order_items->model->columns_where->getOrderId()->setValue($order_info['order_id']);
	$ShopClass->order_items->model->columns_where->getItemId()->setValue($Main->GPC['item_id']);
	$ShopClass->order_items->Delete();

}
if ($Main->GPC['action']=='add') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));

	$ShopClass->offers->CreateModel();
	$ShopClass->offers->model->columns_where->getId()->setValue($Main->GPC['item_id']);
	$ShopClass->offers->model->columns_where->getStatus()->setValue(true);
	$product=$ShopClass->offers->GetItem();

	$ShopClass->order_items->CreateModel();
	$ShopClass->order_items->model->columns_where->getOrderId()->setValue($order_info['order_id']);
	$ShopClass->order_items->model->columns_where->getItemId()->setValue($Main->GPC['item_id']);
	$item=$ShopClass->order_items->GetItem();

	if ($item==false and $product) {
		$ShopClass->order_items->CreateModel();
		$ShopClass->order_items->model->columns_update->getItemCount()->setValue(1);
		$ShopClass->order_items->model->columns_update->getOrderId()->setValue($order_info['order_id']);
		$ShopClass->order_items->model->columns_update->getItemId()->setValue($Main->GPC['item_id']);
		$ShopClass->order_items->model->columns_update->getTitle()->setValue($product['full_title']);
		$ShopClass->order_items->model->columns_update->getArticle()->setValue($product['offer_article']);
		$ShopClass->order_items->model->columns_update->getItemPrice()->setValue($product['offer_price']);
		$ShopClass->order_items->Insert();
	}



}
if ($Main->GPC['action']=='update') {
	$Main->input->clean_array_gpc('r', array(
		'count' => TYPE_UINT,
		'item_id' => TYPE_UINT
	));
	$ShopClass->order_items->CreateModel();
	$ShopClass->order_items->model->columns_update->getItemCount()->setValue($Main->GPC['count']);
	$ShopClass->order_items->model->columns_where->getOrderId()->setValue($order_info['order_id']);
	$ShopClass->order_items->model->columns_where->getItemId()->setValue($Main->GPC['item_id']);
	$ShopClass->order_items->Update();

}
if ($Main->GPC['action']=='update' or $Main->GPC['action']=='delete' or $Main->GPC['action']=='add') {

	$order_items = $ShopClass->products->GetOrderItems($order_info['order_id']);
	$order_items_sum=0;
	$order_items_count=0;
	$items_sub_total=array();
	foreach ($order_items as $a) {
		$order_items_count=$order_items_count+$a['oid_item_count'];
		$order_items_sum=$order_items_sum+$a['oid_item_count']*$a['offer_price'];
		$items_sub_total[$a['oid_item_id']]=format_money($a['oid_item_count']*$a['offer_price']);

	}

	$Main->template->DisplayJson(
		array(
			'sum'=>$order_items_sum,
			'count'=>$order_items_count,
			'sum_f'=>format_money($order_items_sum),
			'status'=>true,
			'text'=>'Черновик успешно обновлен',
			'items_sub_total'=>$items_sub_total,
			'html'=>$Main->template->Render('frontend/components/basket-list/data.twig',array(
				'items'=>$order_items,
				'order_items_sum'=>$order_items_sum
			))
		)
	);

}


$page_name='Карточка заказа';
$order_items = $ShopClass->products->GetOrderItems($order_info['order_id']);


if ($Main->GPC['ajax']) {
	$array=array(
		'html'=>$Main->template->Render('frontend/components/order-info/order-info.twig', array(
			'statuses'=>$statuses,
			'payments'=>$payments,
			'delivery'=>$delivery,
			'order_items'=>$order_items,
			'item'=>$order_info
		)),
		'order_id'=>$order_info['order_id'],
		'status'=>true
	);
	$Main->template->DisplayJson($array);
	exit;
}


$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>'Мои заказы',
				'link'=>'/orders/'
			),
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name
	)
);

$order_items_sum=0;
$order_items_count=0;
foreach ($order_items as $a) {
	$order_items_count=$order_items_count+$a['oid_item_count'];
	$order_items_sum=$order_items_sum+$a['oid_item_count']*$a['oid_item_price'];
}

$ShopClass->order_del_item->CreateModel();
$ShopClass->order_del_item->model->columns_where->getItemId()->setValue(array_values($order_items)[0]['oid_id']);
$del=$ShopClass->order_del_item->GetItem();

if ($del) {
	$ShopClass->order_del->CreateModel();
	$ShopClass->order_del->model->columns_where->getId()->setValue($del['od_del_id']);
	$del_date=$ShopClass->order_del->GetItem();
}

$order_comments=array();
$result=$Main->db->query_read("SELECT *
        FROM `shop_chat`
        WHERE chat_order_id=".$Main->db->sql_prepare($order_info['order_id']).'
        ORDER BY chat_id DESC');
while ($result_item = $Main->db->fetch_array($result))
{
	$order_comments[]=$result_item;
}


$Main->template->Display(array(
	'statuses'=>$statuses,
	'payments'=>$payments,
	'delivery'=>$delivery,
	'order_items'=>$order_items,
	'item'=>$order_info,
	'order_items_sum'=>$order_items_sum,
	'order_items_count'=>$order_items_count,
	'show_profile_links'=>true,
	'contacts'=>$contacts,
	'del_date'=>$del_date,
	'order_comments'=>$order_comments
));



