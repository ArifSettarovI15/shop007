<?php
$Main->user->PagePrivacy('admin,manager');
SiteRedirect('/manager/shop/orders/');
$page_name='Панель управления';
$Main->template->SetPageAttributes(
    array(
        'title'=>$page_name,
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>array(

        ),
        'title'=>$page_name
    )
);

$Main->template->Display(

);

