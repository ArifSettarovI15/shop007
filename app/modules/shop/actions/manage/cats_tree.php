<?php
$Main->user->PagePrivacy('admin');


$ShopClass->cats->CreateModel();
$ShopClass->cats->model->setSelectField( $ShopClass->cats->model->getTableName() . '.*' );
$ShopClass->cats->model->SetJoinImage( 'icon', $ShopClass->cats->model->GetTableItemName( 'icon' ) );
$ShopClass->cats->model->setOrderByWithColumn( 'sort' );
$ShopClass->cats->model->setOrderWay( 'ASC' );
$cats= $ShopClass->cats->GetList();

$cats = $ShopClass->cats->MakeTree( 0, $cats );

$tree=$ShopClass->cats->MakeUiTree($cats,0);

$Main->template->Display(array(
	'tree'=>$tree
));