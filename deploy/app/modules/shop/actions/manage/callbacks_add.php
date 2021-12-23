<?php
/**@var $Main */

/**@var $ShopClass */
$Main->user->PagePrivacy('admin');
$array = [];
$text = '';
$data_info = '';
$edit = 0;

if ($Main->GPC['do'] == 'edit') {
    $edit = 1;
    $data_info = $ShopClass->callbacks->GetItemById($Main->GPC['id']);
    $ShopClass->callbacks->CreateModel();
    $ShopClass->callbacks->model->columns_where->getId()->setValue($Main->GPC['id']);
    $ShopClass->callbacks->model->columns_update->getStatus()->setValue(true);
    $ShopClass->callbacks->Update();
}

if (in_array($Main->GPC['action'], ['process_add', 'process_edit'])) {
    $Main->input->clean_array_gpc(
        'r',
        [
            'callback_name'  => TYPE_STR,
            'callback_phone' => TYPE_STR,
        ]
    );

    $ShopClass->callbacks->CreateModel();
    if ($Main->GPC['action'] == "process_edit") {
        $ShopClass->callbacks->model->columns_where->getId()->setValue($Main->GPC['id']);
    }

    $ShopClass->callbacks->model->columns_update->getName()->setValue($Main->GPC['callback_name']);
    $ShopClass->callbacks->model->columns_update->getPhone()->setValue($Main->GPC['callback_phone']);


    if ($Main->GPC['action'] == 'process_add') {
        $ShopClass->callbacks->Insert();
        $text = "Новая заявка успешно создана!";
    } elseif ($Main->GPC['action'] == 'process_edit') {
        $ShopClass->callbacks->Update();
        $text = "Заявка успешно обновлена!";
    } else {
        $Main->error->PageNotFound();
    }
    $Main->template->DisplayJson(['status' => true, 'text' => $text]);
    exit;
}
if ($edit) {
    $str = 'Редактирование ';
} else {
    $str = 'Создание ';
}
$page_name = $str . 'заявки';
$Main->template->SetPageAttributes(
    [
        'title'    => $page_name,
        'keywords' => '',
        'desc'     => '',
    ],
    [
        'breadcrumbs' => [
            [
                'title' => "Заявки",
                'link'  => BASE_URL . '/manager/shop/callbacks/',
            ],
            [
                'title' => $page_name,
            ],
        ],
        'title'       => $page_name,
    ]
);

$array['info'] = $data_info;
$array['edit'] = $edit;

$Main->template->Display($array);