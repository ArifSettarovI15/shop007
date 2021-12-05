<?php

$Main->user->PagePrivacy();
$error = '';
$basket_item_info = false;
$item_info = [];
$payments = $ShopClass->GetPayments();
$delivery = $ShopClass->GetDeliveryMethods();

$filter_s = [];
$filter_s['key'] = 'contacts';
$filter_s['show_order'] = true;
$contacts = $SettingsClass->GetGroupValues($filter_s);

$statuses = $ShopClass->GetOrderStatus();
$basket_data = $ShopClass->products->GetBasket();
if ($Main->GPC['action'] == 'get_order_modal') {
    $order = $ShopClass->orders->GetLastId();

    $array['status'] = true;
    $array['html'] = $Main->template->Render(
        'frontend/components/modal-7/modal-7.twig',
        ['id' => $order['order_id'] + 1]
    );
    $Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'process_order' or $Main->GPC['action'] == 'process_temp') {
    $Main->input->clean_array_gpc(
        'r',
        [
            'delivery'      => TYPE_STR,
            'delivery_addr' => TYPE_STR,
            'delivery_time' => TYPE_STR,
            'comment'       => TYPE_STR,
            'payment'       => TYPE_STR,
            'name'          => TYPE_STR,
            'phone'         => TYPE_STR,
            'email'         => TYPE_STR,
            'note'          => TYPE_STR,
            'rules'          => TYPE_BOOL,
        ]
    );


    if ($Main->GPC['delivery'] == 'dostavkaplus' and $Main->GPC['delivery_id']) {
        $user_addr = $ShopClass->delivery_user->GetUserAddr($Main->user_info['user_id']);

        if ($user_addr[$Main->GPC['delivery_id']]) {
            $Main->GPC['delivery_city_id'] = $user_addr[$Main->GPC['delivery_id']]['delivery_city'];
            $Main->GPC['delivery_addr'] = $user_addr[$Main->GPC['delivery_id']]['delivery_addr'];
        }
    }

    if ($basket_data['sum'] < 5) {
        $error = 'Выберите товар, нельзя выбрать только украшение!';
    }
    $reg_error = '';
    $new_user = 0;
    $register_data = [];
    $user_id = 0;

    $lastname = $Main->GPC['lastname'];
    $name = $Main->GPC['name'];
    $email = $Main->GPC['email'];
    $phone = $Main->GPC['phone'];

    if ($Main->user_info['user_id'] > 0) {
        $user_id = $Main->user_info['user_id'];
    } else {
        $Main->GPC['action'] = 'process_order';
    }

    if ($Main->GPC['action'] == 'process_order') {
        if ($name == '') {
            $error = 'Введите имя';
        }
        elseif ($phone == '') {
            $error = 'Введите телефон';
        }
        elseif ($Main->GPC['delivery'] == '' or !$delivery[$Main->GPC['delivery']]) {
            $error = 'Выберите способ доставки';
        }
        elseif ($Main->GPC['delivery_addr'] == '' && $Main->GPC['delivery'] != 'pickup') {
            $error = 'Введите адрес доставки';
        }
        elseif ($Main->GPC['payment'] == '' or !$Main->GPC_exists['payment']) {
            $error = 'Выберите способ оплаты';
        }
        elseif ($Main->GPC['rules']==false) {
            $error = 'Вы не приняли условия передачи информации';
        }

        $Main->GPC['phone'] = preg_replace('/[^0-9]/', '', $Main->GPC['phone']);
        if (!preg_match($Main->global_data['phone_reg'], $Main->GPC['phone'])) {
            $error = 'Введите корректный номер телефона';
        }

        if ($Main->GPC['delivery'] == 'pickup') {
            $Main->GPC['delivery_addr'] = "Самовывоз";
        }


    } elseif (count($basket_data['items']) == 0) {
        $error = 'В корзине нет товаров';
    }

    if ($error == '') {
        $items_cost = $basket_data['sum'];

        $Main->template->global_vars['delivery_cities'] = $ShopClass->delivery_cities->getDeliveryCities();
        if ($Main->GPC['delivery'] != 'pickup'){
            $delivery_cost =(int)$Main->template->global_vars['delivery']['payment_price'];
        }
        else{
            $delivery_cost =0;
        }
        $cancel_payment_cost = false;

        $total_cost = $items_cost + $delivery_cost;

        $delivery_city = '';
        $delivery_addr = '';

        if ($error == '') {
            $ShopClass->orders->CreateModel();
            $ShopClass->orders->model->columns_update->getUserId()->setValue($user_id);
            $ShopClass->orders->model->columns_update->getUserLastname()->setValue($lastname);
            $ShopClass->orders->model->columns_update->getUserName()->setValue($name);
            $ShopClass->orders->model->columns_update->getUserPhone()->setValue($phone);
            $ShopClass->orders->model->columns_update->getUserEmail()->setValue($email);


            $ShopClass->orders->model->columns_update->getTime()->setValue(TIMENOW);
            if ($Main->GPC['action'] == 'process_temp') {
                $ShopClass->orders->model->columns_update->getStatus()->setValue(1);
                $ShopClass->orders->model->columns_update->getGroupId()->setValue(1);
            } else {
                if ($Main->GPC['payment'] == 'online') {
                    $st = 4;
                } else {
                    $st = 2;
                }
                $ShopClass->orders->model->columns_update->getStatus()->setValue($st);
                $ShopClass->orders->model->columns_update->getGroupId()->setValue(3);
            }


            $ShopClass->orders->model->columns_update->getPayment()->setValue($Main->GPC['payment']);
            $ShopClass->orders->model->columns_update->getDelivery()->setValue($Main->GPC['delivery']);

            $ShopClass->orders->model->columns_update->getDeliveryAddr()->setValue($Main->GPC['delivery_addr']);
            $ShopClass->orders->model->columns_update->getDeliveryTime()->setValue($Main->GPC['delivery_time']);

            $ShopClass->orders->model->columns_update->getComment()->setValue($Main->GPC['comment']);
            $ShopClass->orders->model->columns_update->getNote()->setValue($Main->GPC['note']);

            $ShopClass->orders->model->columns_update->getItemsCost()->setValue($items_cost);
            $ShopClass->orders->model->columns_update->getTotalCost()->setValue($total_cost);

            $key = '';
            if ($user_id == 0) {
                $key = GenerateName(32, 2);
            }
            $ShopClass->orders->model->columns_update->getKey()->setValue($key);
            $order_id = $ShopClass->orders->Insert();
            if ($order_id) {
                foreach ($basket_data['items'] as $info) {
                    $ShopClass->order_items->CreateModel();
                    $ShopClass->order_items->model->columns_update->getOrderId()->setValue($order_id);
                    $ShopClass->order_items->model->columns_update->getItemId()->setValue($info['basket_item_id']);
                    $ShopClass->order_items->model->columns_update->getTitle()->setValue($info['full_title']);
                    $ShopClass->order_items->model->columns_update->getArticle()->setValue($info['offer_article']);
                    $ShopClass->order_items->model->columns_update->getItemPrice()->setValue($info['basket_price']);
                    $ShopClass->order_items->model->columns_update->getItemCount()->setValue($info['basket_count']);
                    $ShopClass->order_items->Insert();


                    $ShopClass->basket->CreateModel();
                    $ShopClass->basket->model->columns_where->getId()->setValue($info['basket_id']);
                    $ShopClass->basket->Delete();
                }

                $ShopClass->order_history->CreateModel();
                if ($Main->GPC['action'] == 'process_temp') {
                    $ShopClass->order_history->model->columns_update->getOrderStatusId()->setValue(1);
                } else {
                    if ($Main->GPC['payment'] == 'online') {
                        $st = 4;
                    } else {
                        $st = 2;
                    }
                    $ShopClass->order_history->model->columns_update->getOrderStatusId()->setValue($st);
                }
                $ShopClass->order_history->model->columns_update->getOrderId()->setValue($order_id);
                $ShopClass->order_history->Insert();

                $mail_to = $Main->template->global_vars['fields']['about']['email_notify'];

                $from_array = [
                    $Main->config['system']['email_addr'] => $Main->template->global_vars['fields']['about']['about_name'],
                ];
                $to_array = [
                    $mail_to,
                ];

                $user_manager = false;
                if ($Main->user_info['user_manager_id']) {
                    $user_manager = $Main->user->GetUserById($Main->user_info['user_manager_id']);
                }

                if ($user_manager and $user_manager['user_email']) {
                    $to_array[] = $user_manager['user_email'];
                }

                $order_info = $ShopClass->orders->GetItemById($order_id);

                $order_items = $ShopClass->products->GetOrderItems($order_id);
                $total = 0;
                $array['products'] = [];

                foreach ($order_items as $item) {
                    $total = $total + $item['oid_item_price'] * $item['oid_item_count'];
                    $array['products'][] = [
                        'id'       => $item['offer_id'],
                        'name'     => $item['full_title'],
                        'price'    => $item['oid_item_price'],
                        'brand'    => $item['vendor_name'],
                        'category' => $item['cat_title'],
                        'quantity' => $item['oid_item_count'],
                    ];
                }
                $total = format_money($total);

                if ($Main->GPC['action'] == 'process_order') {
                    $content = $Main->template->Render(
                        'shop/order/new_order_email.html.twig',
                        [
                            'title'         => 'Заказ #' . $order_id,
                            'info'          => $order_info,
                            'items'         => $order_items,
                            'order_id'      => $order_id,
                            'payments'      => $payments,
                            //'delivery_cost' => format_money($delivery_cost),
                            'total'         => $total,
                            'total_cost'    => format_money($total_cost),
                            'user'          => 0,
                            'statuses'      => $statuses,
                            'delivery_data' => $delivery,
                        ]
                    );
                    $title = 'Заказ #' . $order_id;
                    $mail_to = $Main->template->global_vars['fields']['info']['email_notify'];
                    $body = $Main->template->Render(
                    'static/email_write.twig',
                        [
                           'type' => 'order',
                           'title' => $title,
                           'info' => $order_info,
                           'items' => $order_items,
                           'order_id' => $order_id,
                           'payments' => $payments,
                           'total' => $total,
                           'total_cost' => format_money($total_cost),
                           'delivery_data'=>$delivery
                        ]
                    );


                    $aa = [$Main->config['system']['email_addr'] => $Main->template->global_vars['fields']['info']['info_name']];

                    $message = (new Swift_Message($title))
                      ->setFrom($aa)
                      ->setTo([$mail_to])
                      ->setBody($body, 'text/html');

                  try {
                      $result = $Main->mailer->send($message);
                  } catch (\Swift_TransportException $e) {
                      $response = $e->getMessage();
                  }


                    $array['order_id'] = $order_id;
                    $array['total_cost'] = $total_cost;
                    $array['complete'] = true;
                    $array['html'] = $Main->template->Render(
                        'frontend/components/modal-8/modal-8.twig',
                        [
                            'content'  => '8-4',
                            'order_id' => $order_id,
                            'items'    => $order_items,
                        ]
                    );
                }
            } else {
                $error = 'Ошибка оформления заказа';
            }
        }
    }

    if ($error != '') {
        $array['status'] = false;
        $array['text'] = $error;
    } else {
        $array['status'] = true;
    }
    $Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'delete' or $Main->GPC['action'] == 'update' or $Main->GPC['action'] == 'add') {
    $Main->input->clean_array_gpc(
        'r',
        [
            'item_id' => TYPE_UINT,
            'count'   => TYPE_UINT,
        ]
    );

    $error = '';

    if ($Main->GPC['item_id'] == 0) {
        $error = 'Товар не найден';
    } else {
        $item_info = $ShopClass->offers->getAsDecoration($Main->GPC['item_id']);

        if (!(int)$item_info['offer_is_decoration']) {
            $item_info = $ShopClass->offers->GetItemById($Main->GPC['item_id']);

        }
        else{
            if($basket_data['total']==0){
                $Main->template->DisplayJson(['status'=>false, 'text'=>"Сначала выберите букет!"]);
            }
            else{
                if ($Main->GPC['action'] != "delete"){
                    $items_count = 0;
                    $decors_count = 0;
                    foreach ($basket_data['items'] as $item){
                        if((int)$item['offer_is_decoration']){
                            $decors_count += $item['basket_count'];
                        }
                        else{
                            $items_count +=$item['basket_count'];
                        }
                    }
                    if ($decors_count >= $items_count and $Main->GPC['count'] and (int)$Main->GPC['count']>=$basket_data['items'][$Main->GPC['item_id']]['basket_count']){
                            $Main->template->DisplayJson(['status'=>false, 'text'=>"Вы превысили лимит украшений, для букета!", 'count'=>(int)$basket_data['items'][$Main->GPC['item_id']]['basket_count']]);
                    }
                    elseif($decors_count >= $items_count and !$Main->GPC['count']){
                        $Main->template->DisplayJson(['status'=>false, 'text'=>"Вы превысили лимит украшений, для букета!", 'count'=>(int)$basket_data['items'][$Main->GPC['item_id']]['basket_count']]);
                    }
                }
            }
        }


        if ($item_info == false) {
            $error = 'Товар не найден';
        }
    }


    $ShopClass->basket->CreateModel();
    if ($Main->user_info['user_id']) {
        $ShopClass->basket->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
    } else {
        $ShopClass->basket->model->columns_where->getSessionhash()->setValue($Main->user_info['sessionhash']);
    }

    $ShopClass->basket->model->columns_where->getItemId()->setValue($Main->GPC['item_id']);
    $basket_item_info = $ShopClass->basket->GetItem();
}

if ($Main->GPC['action'] == 'clean') {
    $text = 'Корзина очищена';
    $ShopClass->basket->CreateModel();
    if ($Main->user_info['user_id']) {
        $ShopClass->basket->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
    } else {
        $ShopClass->basket->model->columns_where->getSessionhash()->setValue($Main->user_info['sessionhash']);
    }
    $ShopClass->basket->Delete();
//		$array['reload'] = true;
//		$Main->template->DisplayJson($array);
}
if ($Main->GPC['action'] == 'delete') {
    if ($error == '' and $basket_item_info) {
        $ShopClass->basket->CreateModel();
        $ShopClass->basket->model->columns_where->getId()->setValue($basket_item_info['basket_id']);
        $ShopClass->basket->Delete();
        $array['text'] = 'Товар удален из корзины';
    }
}
if ($Main->GPC['action'] == 'update') {
    if ($error != '') {
    } elseif ($Main->GPC['count'] <= 0) {
        $error = 'Кол-во товаров неверно';
    } else {
        $ShopClass->basket->CreateModel();
        $ShopClass->basket->model->columns_update->getCount()->setValue($Main->GPC['count']);
        $ShopClass->basket->model->columns_where->getId()->setValue($basket_item_info['basket_id']);
        $res = $ShopClass->basket->Update();
        $text = 'Корзина обновлена';
    }
}
if ($Main->GPC['action'] == 'add') {
    if (!$Main->GPC['count'] or $Main->GPC['count'] == '') {
        $Main->GPC['count'] = 1;
    }
    if ($error != '') {
    } elseif ($basket_item_info) {
        $ShopClass->basket->CreateModel();
        $ShopClass->basket->model->columns_update->getCount()->setValue(
            $basket_item_info['basket_count'] + $Main->GPC['count']
        );
        $ShopClass->basket->model->columns_where->getId()->setValue($basket_item_info['basket_id']);

        $ShopClass->basket->Update();
    } else {
        $ShopClass->basket->CreateModel();
        $ShopClass->basket->model->columns_update->getItemId()->setValue($Main->GPC['item_id']);
        $ShopClass->basket->model->columns_update->getUserId()->setValue($Main->user_info['user_id']);
        $ShopClass->basket->model->columns_update->getSessionhash()->setValue($Main->user_info['sessionhash']);
        $ShopClass->basket->model->columns_update->getCount()->setValue($Main->GPC['count']);
        if ($item_info['offer_price_sale']) {
            $ShopClass->basket->model->columns_update->getPrice()->setValue($item_info['offer_price_sale']);
        } else {
            $ShopClass->basket->model->columns_update->getPrice()->setValue($item_info['offer_price']);
        }
        $ShopClass->basket->Insert();
    }
    $array['text'] = 'Товар добавлен в корзину';
}
if ($Main->GPC['action'] == 'delete' or $Main->GPC['action'] == 'update' or $Main->GPC['action'] == 'add' or $Main->GPC['action'] == 'clean') {
    if ($error != '') {
        $array['status'] = false;
        $array['text'] = $error;
    } else {
        $basket_data = $ShopClass->products->GetBasket();
        $items = $basket_data['items'];

        $array['sum'] = $basket_data['sum'];
        $array['count'] = $basket_data['total'];
        $array['basket_sum_before'] = $basket_data['sum_before'];
        $array['basket_dop'] = $basket_data['basket_dop'];
        $array['sum_f'] = format_money($basket_data['sum']);


        if ($Main->GPC['action'] == 'update' or $Main->GPC['action'] == 'add') {
            $bbb = [];
            foreach ($basket_data['items'] as $item) {
                if ($item['offer_id'] == $Main->GPC['item_id']) {
                    $bbb = $item;
                }
            }

            //$bbb['basket_sub_total']=$bbb['basket_count']*$bbb['basket_price'];

            $also_items = $ShopClass->products->GetAlsoCatItems($item_info['item_cat_id']);

            $array['result3'] = $Main->template->Render(
                'frontend/components/popup-product/popup-product.twig',
                [
                    'item'       => $bbb,
                    'also_items' => $also_items,
                ]
            );

            $array['items_sub_total'] = [];
            foreach ($basket_data['items'] as $item) {
                $array['items_sub_total'][$item['offer_id']] = format_money($item['basket_sub_total']);
            }
        }

        $array['text'] = '';

        $array['count_end'] = getNumEnding(
            $basket_data['total'],
            [
                'товар',
                'товара',
                'товаров',
            ]
        );
        $array['status'] = true;

        if ($Main->GPC['action'] == 'add') {
            $text = 'Товар добавлен в корзину';
            $array['products'] = [
                [
                    'id'       => $item_info['item_id'],
                    'name'     => $item_info['item_title'],
                    'price'    => $item_info['item_price'],
                    'brand'    => $item_info['vendor_name'],
                    'category' => $item_info['cat_title'],
                    'quantity' => $Main->GPC['count'],
                ],
            ];
        } elseif ($Main->GPC['action'] == 'delete') {
            $text = 'Товар удален и корзины';
            $array['products'] = [
                [
                    'id'       => $item_info['item_id'],
                    'name'     => $item_info['item_title'],
                    'category' => $item_info['cat_title'],
                    'quantity' => 1,
                ],
            ];
        }
    }
    $ShopClass->products->GetBasket();
    $items = $Main->template->global_vars['basket_items'];
    $total_price = $Main->template->global_vars['basket_sum'];
    $total_count = $Main->template->global_vars['basket_total'];
    $items = $Main->template->global_vars['basket_items'];
    $html = $Main->template->Render(
        "frontend/components/cart-list/cart-list.twig",
        [
            $Main->template->global_vars['basket_items'],
        ]
    );
    $Main->template->DisplayJson(
        [
            'text'        => $text,
            'status'      => true,
            'html'        => $html,
            'total_price' => $total_price,
            'total_count' => $total_count,
        ]
    );
}


$items = $Main->template->global_vars['basket_items'];

$page_name = 'Корзина';
if ($Main->GPC['order']) {
    $page_name = 'Оформление заказа';
}
$Main->template->SetPageAttributes(
    [
        'title'    => $page_name,
        'keywords' => '',
        'desc'     => '',
    ],
    [
        'breadcrumbs' => [
            [
                'title' => $page_name,
            ],
        ],
        'title'       => '',
    ]
);


$filter_s = [];
$filter_s['show_order'] = true;
$filter_s['key'] = 'banners';
$banners = $SettingsClass->GetGroupValues($filter_s);

$ShopClass->delivery_cities->CreateModel();
$ShopClass->delivery_cities->model->columns_where->getCat()->setValue(0);
$ShopClass->delivery_cities->model->setOrderBy('city_title');
$cities = $ShopClass->delivery_cities->GetList();

$user_addr = array_values($ShopClass->delivery_user->GetUserAddr($Main->user_info['user_id']));
$Main->error->PageNotFound();
$Main->template->Display(
    [
        'items'              => $items,
        'payments'           => $payments,
        'delivery'           => $delivery,
        'order'              => $Main->GPC['order'],
        'contacts'           => $contacts,
        'cdek_cities'        => $ShopClass->delivery_cities->getCdekCities(),
        'banners'            => $banners,
        'show_profile_links' => true,
        'user_addr'          => $user_addr,
        'cities'             => $cities,
    ]
);
