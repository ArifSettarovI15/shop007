<?php
$Main->user->PagePrivacy('admin');
$Paging = new ClassPaging($Main,20, false, false );
$ShopClass->offers->CreateModel();
$ShopClass->offers->model->setSelectField($ShopClass->offers->model->getTableName().".*");
$ShopClass->offers->model->SetJoinImage('icon_offer',$ShopClass->offers->model->GetTableItemName('icon'));
$ShopClass->offers->model->columns_where->getIsDecoration()->setValue(1);

$Paging->data=$ShopClass->offers->GetList();

$variables = array();
if ($Main->GPC['action']=='search') {

    $Paging->Display('frontend/components/search-block/search_list_simple.twig',$variables);
}
else {
    $Paging->Display('shop/manage/offers_table.twig',$variables);
}
