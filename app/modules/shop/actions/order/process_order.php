<?php

$page_name = 'Оформление заказа';

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
        'title'       => 'Оформление заказа',
    ]
);



$Main->template->Display();