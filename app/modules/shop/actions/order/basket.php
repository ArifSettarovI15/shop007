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
if ($Main->GPC['action'] == 'process_order') {
    $Main->input->clean_array_gpc(
        'r',
        [
            'delivery_type' => TYPE_UINT,
            'name' => TYPE_STR,
            'address' => TYPE_STR,

        ]
    );
    $delivery_price = 0;
    if ($Main->GPC['delivery_type'] == 2) {
        $delivery_price = 500;
    }
    $items_data = [];
    foreach ($Main->template->global_vars['basket_items'] as $item){
        $items_data[] = [
            "ItemCount" => (int)$item['basket_count'],
            "ItemSum" => (int)$item['basket_count'] * $item['item_price'],
            "Price"=>$item['item_price'],
            "ProductName" =>$item['item_title'],
            "StockProductId"=>$item['item_id'],

        ];
    }
    $array = [
        "DeliveryInfo" => [
            "Address" => $Main->GPC['address'],
            "DeliveryType" => $Main->GPC['delivery_type'],
            "Price" => $delivery_price,
            "RecipientInfo" => $Main->GPC['name'],
        ],
        "IsReserved" => false,
        "NdsPositionType" => 1,
        "Number" => time(),
        "OrderDate"=>date('d-m-YTH:i:sZ', time()),
        "OrderState"=>1,
        "OrderType"=>1,
        "PaymentType"=>2,

    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://restapi.moedelo.org/stockorders/api/v1/CustomerOrder',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'md-api-key: 51a76ae4-9fe9-44dc-8206-021012504a20'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

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
            'count' => TYPE_UINT,
        ]
    );

    $error = '';

    if ($Main->GPC['item_id'] == 0) {
        $error = 'Товар не найден';
    } else {
        $item_info = $ShopClass->products->GetItemById($Main->GPC['item_id']);


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
                    'item' => $bbb,
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
                    'id' => $item_info['item_id'],
                    'name' => $item_info['item_title'],
                    'price' => $item_info['item_price'],
                    'brand' => $item_info['vendor_name'],
                    'category' => $item_info['cat_title'],
                    'quantity' => $Main->GPC['count'],
                ],
            ];
        } elseif ($Main->GPC['action'] == 'delete') {
            $text = 'Товар удален и корзины';
            $array['products'] = [
                [
                    'id' => $item_info['item_id'],
                    'name' => $item_info['item_title'],
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
        "frontend/components/basket/basket.twig",
        [
            'items' => $Main->template->global_vars['basket_items'],
        ]
    );
    $Main->template->DisplayJson(
        [
            'text' => $text,
            'status' => true,
            'html' => $html,
            'total_price' => $total_price,
            'total_count' => $total_count,
            'items_count' => $Main->template->global_vars['basket_items_count'],
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
        'title' => $page_name,
        'keywords' => '',
        'desc' => '',
    ],
    [
        'breadcrumbs' => [
            [
                'title' => $page_name,
            ],
        ],
        'title' => 'Корзина',
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


$Main->template->Display(
    [
        'items' => $items,
        'payments' => $payments,
        'delivery' => $delivery,
        'order' => $Main->GPC['order'],
        'contacts' => $contacts,
        'cdek_cities' => $ShopClass->delivery_cities->getCdekCities(),
        'banners' => $banners,
        'show_profile_links' => true,
        'user_addr' => $user_addr,
        'cities' => $cities,
    ]
);
