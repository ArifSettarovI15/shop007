<?php

if($Main->GPC['item_url']) {
    $cat = $ShopClass->cats->GetItemByUrl($Main->GPC['cat_url']);
	$ShopClass->products->CreateModel();
	$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
	$ShopClass->products->model->SetJoinAll(false);
	$ShopClass->products->model->columns_where->getStatus()->setValue(true);
	$ShopClass->products->model->columns_where->getUrl()->setValue($Main->GPC['item_url']);
	$ShopClass->products->model->columns_where->getCatId()->setValue($cat['cat_id']);
    $ShopClass->products->model->columns_where->getStatus()->setValue(1);
	$data_info=$ShopClass->products->GetItem(1);
	if (!$data_info){
		$Main->error->PageNotFound();
	}
}
else{
    $Main->error->PageNotFound();
}


$breadcrumbs=array();
$breadcrumbs[]=array(
    'title'=>'Каталог',
    'link'=>BASE_URL.'/catalog/'
);$breadcrumbs[]=array(
    'title'=>$data_info['cat_title'],
    'link'=>BASE_URL.'/'.$data_info['cat_url'].'/'
);


$Main->template->SetPageAttributes(
    array(
        'title'=>$data_info['item_title'],
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>$breadcrumbs,
        'title'=>$data_info['item_title'],
        'page_class'=>'page-catalog'
    )
);


$ShopClass->products->CreateModel();
$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');

$ShopClass->products->model->columns_where->getStatus()->setValue(true);
$ShopClass->products->model->columns_where->getId()->notValue($data_info['item_id']);
$ShopClass->products->model->columns_where->getCatId()->setValue($cat['cat_id']);
$ShopClass->products->model->columns_where->getStatus()->setValue(1);
$ShopClass->products->model->setCount(4);
$similar=$ShopClass->products->GetList();


$array=array('info'=>$data_info,'similar'=>$similar,);
$Main->template->Display($array);