<?php
$Main->user->PagePrivacy('admin,manager');
$statuses=$ShopClass->GetOrderStatus();
$payments=$ShopClass->GetPayments();
$delivery=$ShopClass->GetDeliveryMethods();


$data_info=$ShopClass->orders->GetItemById($Main->GPC['id'],1);

if ($data_info) {

}
else {
	$Main->error->ObjectNotFound();
}

if ($Main->GPC['action']=='basket_set') {
	$Main->input->clean_array_gpc('r', array(
		'offer_id' => TYPE_UINT,
		'offer_count' => TYPE_UINT,
		'offer_price' => TYPE_UINT
	));
	$error='';
	if ($Main->GPC['offer_id']==0) {
		$error = 'Товар не найден';
	}
	elseif ($Main->GPC['offer_count']==0 and $Main->GPC['offer_price']==0) {
		$error = 'Укажите параметра';
	}
	else {
		$offer_info=$ShopClass->offers->GetItemById($Main->GPC['offer_id']);

		if ($offer_info==false) {
			$error = 'Товар не найден';
		}
	}


	$order_item_info=$ShopClass->products->GetOrderItem($data_info['order_id'], $Main->GPC['offer_id']);

	if ($error!='') {

	}
	elseif ($order_item_info) {
		$ShopClass->order_items->CreateModel();
		if ($Main->GPC['offer_count']) {
			$ShopClass->order_items->model->columns_update->getItemCount()->setValue( $Main->GPC['offer_count'] );
		}
		if ($Main->GPC['offer_price']) {
			$ShopClass->order_items->model->columns_update->getItemPrice()->setValue( $Main->GPC['offer_price'] );
		}
		$ShopClass->order_items->model->columns_where->getId()->setValue( $order_item_info['oid_id'] );
		$ShopClass->order_items->Update();

		$ShopClass->orders->setOrderSum($data_info['order_id']);

	}

	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}
	else {
		$array['text'] = 'Товар обновлен';
		$array['status']=true;
	}
	$Main->template->DisplayJson($array);

}

elseif ($Main->GPC['action']=='basket_del') {
	$Main->input->clean_array_gpc('r', array(
		'offer_id' => TYPE_UINT
	));
	$error='';
	if ($Main->GPC['offer_id']==0) {
		$error = 'Товар не найден';
	}
	else {
		$offer_info=$ShopClass->offers->GetItemById($Main->GPC['offer_id']);

		if ($offer_info==false) {
			$error = 'Товар не найден';
		}
	}


	$order_item_info=$ShopClass->products->GetOrderItem($data_info['order_id'], $Main->GPC['offer_id']);

	if ($error!='') {

	}
	elseif ($order_item_info) {
		$ShopClass->order_items->CreateModel();
		$ShopClass->order_items->model->columns_where->getId()->setValue( $order_item_info['oid_id'] );
		$ShopClass->order_items->Delete();
	}

	$items = $ShopClass->products->GetOrderItems($data_info['order_id']);
	$ShopClass->orders->setOrderSum($data_info['order_id']);

	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}

	else {
		$array['text'] = 'Товар удален';
		$array['status']=true;
		$array['html']=$Main->template->Render('backend/components/order-basket/order-basket.twig', array(
			'items'=>$items
		));
	}
	$Main->template->DisplayJson($array);

}
elseif ($Main->GPC['action']=='basket_list') {
	$items = $ShopClass->products->GetOrderItems($data_info['order_id']);

	$array['status']=true;
	$array['html']=$Main->template->Render('backend/components/order-basket/order-basket.twig', array(
		'items'=>$items
	));

	$Main->template->DisplayJson($array);
}
elseif ($Main->GPC['action']=='add_basket') {

	$Main->input->clean_array_gpc('r', array(
		'offer_id' => TYPE_UINT,
		'amount'=>TYPE_UINT
	));
	$error='';
	if ($Main->GPC['offer_id']==0) {
		$error = 'Товар не найден';
	}
	else {
		$offer_info=$ShopClass->offers->GetItemById($Main->GPC['offer_id']);

		if ($offer_info==false) {
			$error = 'Товар не найден';
		}
	}


	$order_item_info=$ShopClass->products->GetOrderItem($data_info['order_id'], $Main->GPC['offer_id']);
	$oid=false;

	if ($Main->GPC['amount']<1) {
		$Main->GPC['amount']=1;
	}

	if ($error!='') {

	}
	elseif ($order_item_info){
		$ShopClass->order_items->CreateModel();

		$ShopClass->order_items->model->columns_update->getItemCount()->setValue($order_item_info['oid_item_count']+$Main->GPC['amount']);
		$ShopClass->order_items->model->columns_where->getId()->setValue($order_item_info['oid_id']);
		$ShopClass->order_items->Update();
		$oid=$order_item_info['oid_id'];

	}
	else {
		$order_profile_info=$Main->user->GetUserProfile($offer_info['order_user_id']);
		$price_name=$ShopClass->getOfferPriceById($ShopClass->getOfferPriceById($order_profile_info['profile_price_id']));
		$price_vv=$offer_info[$price_name];

		$ShopClass->order_items->CreateModel();
		$ShopClass->order_items->model->columns_update->getOrderId()->setValue($data_info['order_id']);
		$ShopClass->order_items->model->columns_update->getItemId()->setValue($Main->GPC['offer_id']);
		$ShopClass->order_items->model->columns_update->getTitle()->setValue($offer_info['full_title']);
		$ShopClass->order_items->model->columns_update->getArticle()->setValue($offer_info['offer_article']);
		$ShopClass->order_items->model->columns_update->getItemPrice()->setValue($price_vv);


		$ShopClass->order_items->model->columns_update->getItemCount()->setValue($Main->GPC['amount']);
		$oid=$ShopClass->order_items->Insert();
	}
	$items = $ShopClass->products->GetOrderItems($data_info['order_id']);
	$ShopClass->orders->setOrderSum($data_info['order_id']);
	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}
	else {
		$array['text'] = 'Товар добавлен в корзину';
		$array['status']=true;
		$array['html']=$Main->template->Render('backend/components/order-basket/order-basket.twig', array(
			'items'=>$items
		));
	}
	$Main->template->DisplayJson($array);

}


if ($Main->GPC['action']=='send_chat') {
	$Main->input->clean_array_gpc('r', array(
		'text'=>TYPE_STR
	));

	$text='';
	$html='';
	$status=true;
	if ($Main->GPC['text']=='') {
		$text='Введите текст';
		$status=false;
	}
	else {
		$Main->db->query_write("INSERT INTO `shop_chat`
                (`chat_order_id`,`chat_text`,chat_admin)
                VALUES (
                ".$Main->db->sql_prepare($data_info['order_id']).",
                ".$Main->db->sql_prepare($Main->GPC['text']).",
                1
                )
          ");
		$text='Сообщение отправлено';

		$order_comments=array();
		$result=$Main->db->query_read("SELECT *
        FROM `shop_chat`
        WHERE chat_order_id=".$Main->db->sql_prepare($data_info['order_id']).'
        ORDER BY chat_id DESC');

		while ($result_item = $Main->db->fetch_array($result))
		{
			$order_comments[]=$result_item;
		}

		$html=$Main->template->Render('frontend/components/chat/items.twig',array(
			'order_comments'=>$order_comments
		));


		$user_info=$Main->user->GetUserById($data_info['order_user_id']);

		$content = $Main->template->Render('shop/order/new_comment2.twig',
			array(
				'title' => 'Комментарий к заказу #' . $data_info['order_id'],
				'text' => $Main->GPC['text'],
				'order_id' => $data_info['order_id'],
			)
		);
		$mail_to = $user_info['user_email'];

		$from_array = array(
			$Main->config['system']['email_addr'] => $Main->template->global_vars['fields']['about']['about_name']
		);
		$to_array = array(
			$mail_to
		);
		$ShopClass->SendNewOrder('Комментарий к заказу #' . $data_info['order_id'], $from_array, $to_array, $content);
	}


	$Main->template->DisplayJson(
		array(
			'status'=>true,
			'text'=>$text,
			'html'=>$html
		)
	);

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

if ($_REQUEST['action']=='update_status') {
	$Main->input->clean_array_gpc('r', array(
		'status_id' => TYPE_UINT
	));
	$array=array();
	$array['status']=true;
	$array['text']='Статус заказа обновлен';

	$order_info=$data_info;

	if ($order_info) {

		if ($array['status']!=false) {
			if (in_array($Main->GPC['status_id'], array(6,7))) {
				$del_date=false;


				$times=$ShopClass->days->getTime();


				if ($order_info['order_del_id']==0) {
					if ($order_info['order_delivery_city_id']) {
						$ShopClass->delivery_cities->CreateModel();
						$ShopClass->delivery_cities->model->columns_where->getId()->setValue($order_info['order_delivery_city_id']);
						$city_info=$ShopClass->delivery_cities->GetItem();
					}

					if ($city_info['city_group_id']) {
						$del_data = false;
						$ShopClass->days->CreateModel();
						$ShopClass->days->model->columns_where->getCityId()->setValue($city_info['city_group_id']);
						$ShopClass->days->model->setOrderBy('delivery_priem_day');
						$del_info=$ShopClass->days->GetList();

						foreach ($del_info as $d) {
							$del_data=true;
						}

						if ($del_data) {
							$date_number=date('N');
							$time_value=date('H');

							$isset=false;
							$next_del=array();
							foreach ($del_info as $d) {

								if ($isset==false) {
									$up_time=strtotime(date('Y-m-d '.$times[$d['delivery_priem_time']].':59'));
									if ($date_number<=$d['delivery_priem_day'] and TIMENOW<$up_time) {
										$next_del=$d;
										$isset=true;
									}
									elseif ($date_number<$d['delivery_priem_day']) {
										$next_del=$d;
										$isset=true;
									}
								}
							}

							if (count($next_del)>0) {
								$del_date=date('d.m.Y', strtotime($ShopClass->days->getDayName($next_del['delivery_go_day'])));
							}
							elseif(count($del_info)>0) {
								$del_date=date('d.m.Y', strtotime('next '.$ShopClass->days->getDayName(array_values($del_info)[0]['delivery_go_day'])));
							}

							if ($del_date==false) {
								$array['status']=false;
								$array['text']='День доставки не найден';
							}

							if ($del_date) {
								$ShopClass->order_del->CreateModel();
								$ShopClass->order_del->model->columns_where->getCityId()->setValue($order_info['order_delivery_city_id']);
								$ShopClass->order_del->model->columns_where->getUserId()->setValue($order_info['order_user_id']);
								$ShopClass->order_del->model->columns_where->getDate()->setValue($del_date);
								$current_del=$ShopClass->order_del->GetItem();
								if ($current_del) {
									$current_del_id=$current_del['delivery_id'];
								}
								else {
									$ShopClass->order_del->CreateModel();
									$ShopClass->order_del->model->columns_update->getUserId()->setValue($order_info['order_user_id']);
									$ShopClass->order_del->model->columns_update->getCityId()->setValue($order_info['order_delivery_city_id']);
									$ShopClass->order_del->model->columns_update->getAddr()->setValue($order_info['order_delivery_addr']);
									$ShopClass->order_del->model->columns_update->getDate()->setValue($del_date);
									$current_del_id=$ShopClass->order_del->Insert();
								}

								if ($current_del_id) {
									$ShopClass->orders->CreateModel();
									$ShopClass->orders->model->columns_update->getDelId()->setValue($current_del_id);
									$ShopClass->orders->model->columns_where->getId()->setValue($order_info['order_id']);
									$ShopClass->orders->Update();
								}
							}
						}


					}

				}
				else {
					$current_del_id=$order_info['order_del_id'];
				}

				$items = $ShopClass->products->GetOrderItems($data_info['order_id']);

				foreach ($items as $item) {
					$ShopClass->order_del_item->CreateModel();
					$ShopClass->order_del_item->model->columns_where->getItemId()->setValue($item['oid_id']);
					$del_item=$ShopClass->order_del_item->GetItem();
					if ($del_item==false and $current_del_id) {
						$ShopClass->order_del_item->CreateModel();
						$ShopClass->order_del_item->model->columns_update->getDelId()->setValue($current_del_id);
						$ShopClass->order_del_item->model->columns_update->getItemId()->setValue($item['oid_id']);
						$ShopClass->order_del_item->Insert();
					}
				}

			}
			if ($array['status']) {
				$ShopClass->orders->CreateModel();
				$ShopClass->orders->model->columns_update->getStatus()->setValue($Main->GPC['status_id']);
				$ShopClass->orders->model->columns_where->getId()->setValue($Main->GPC['id']);

				if ($order_info['order_payment_time']==0 and in_array($Main->GPC['status_id'], $ShopClass->getOrderActiveStatus())) {
					$ShopClass->orders->model->columns_update->getPaymentTime()->setValue(TIMENOW);
				}
				$ShopClass->orders->Update();

				$ShopClass->order_history->CreateModel();
				$ShopClass->order_history->model->columns_update->getOrderStatusId()->setValue($Main->GPC['status_id']);
				$ShopClass->order_history->model->columns_update->getOrderId()->setValue($Main->GPC['id']);
				$ShopClass->order_history->Insert();




				$ShopClass->SendUpdateOrderEmail ($Main->GPC['id'],$Main->GPC['status_id']);
			}

		}
	}
	else {
		$array['status']=false;
		$array['text']='Нет заказа';
	}
	$Main->template->DisplayJson($array);
}

$page_name=' Заказ #'.$data_info['order_id'];
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
				'title'=>'Заказы',
				'link'=>BASE_URL.'/manager/shop/orders/'
			),
			array(
				'title'=>$page_name
			),
		),
		'title'=>$page_name
	)
);


$items = $ShopClass->products->GetOrderItems($data_info['order_id']);

$total=0;
foreach ($items as $item) {
	$total=$total+$item['sil_price']*$item['sil_count'];
}

$total=format_money($total);

$list=array();
$delivery_info=array();
$n_data=array();

$order_comments=array();
$result=$Main->db->query_read("SELECT *
        FROM `shop_chat`
        WHERE chat_order_id=".$Main->db->sql_prepare($data_info['order_id']).'
        ORDER BY chat_id DESC');
while ($result_item = $Main->db->fetch_array($result))
{
	$order_comments[]=$result_item;
}

$Main->template->Display(array(
		'info'=>$data_info,
		'statuses'=>$statuses,
		'payments'=>$payments,
		'delivery'=>$delivery,
		'items'=>$items,
		'total'=>$total,
		'list'=>$n_data,
		'delivery_info'=>$delivery_info,
		'order_comments'=>$order_comments
	)
);
