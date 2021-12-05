<?php
$Main->user->PagePrivacy();

$breadcrumbs=1;

$Main->template->SetPageAttributes(
	array(
		'title'=>'Каталог букетов',
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>'Каталог букетов',
		'page_class'=>'page-catalog'
	)
);

$ShopClass->cats->CreateModel();
$ShopClass->cats->model->columns_where->getStatus()->setValue( true );
$ShopClass->cats->model->setSelectField( $ShopClass->cats->model->getTableName() . '.*' );
$ShopClass->cats->model->SetJoinImage('icon',$ShopClass->cats->model->GetTableItemName('icon'));
$ShopClass->cats->model->columns_where->getStatus()->setValue(1);
$categories = $ShopClass->cats->GetList();

if (!$categories or $categories==''){
    $Main->error->PageNotFound();
}

$Main->template->Display(
	array(
		'categories'=>$categories,

	));
