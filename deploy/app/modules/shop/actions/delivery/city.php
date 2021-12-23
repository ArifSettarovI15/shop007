<?php
$Main->user->PagePrivacy();

$city=$ShopClass->delivery_cities->GetItemByUrl($Main->GPC['city_url'], true);
if ($city) {

}
else {
	$Main->error->ObjectNotFound();
}

$breadcrumbs=array();
$breadcrumbs[]=array(
	'title'=>'Доставка',
	'link'=>BASE_URL.'/oplata_i_dostavka.html'
);
$breadcrumbs[]=array(
	'title'=>$city['city_title']
);

if ($city['city_related']) {
	$meta_title=$city['city_title'];
	$h1_title=$city['city_title'];
}
else {
	$meta_title=$city['city_title'];
	$h1_title=$city['city_title'];
}


if ($city['city_head_title']) {
	$meta_title=$city['city_head_title'];
	$h1_title=$city['city_head_title'];
}
$Main->template->SetPageAttributes(
	array(
		'title'=>$meta_title,
		'keywords'=>$city['city_head_keywords'],
		'desc'=>$city['city_head_desc']
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>$h1_title

	)
);

$ShopClass->products->CreateModel();
$ShopClass->products->model->columns_where->getStatus()->setValue(true);
$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
$ShopClass->products->model->SetJoinImage('icon',$ShopClass->products->model->GetTableItemName('icon'));
$ShopClass->products->model->SetJoinCities();
$ShopClass->products->model->setOrderBy('`sort`');
$ShopClass->products->model->addWhereCustom(
	$ShopClass->products->SqlWherePrepare('simple','shop_items_cities.city_id',$city['city_id'])
);
$city_items=$ShopClass->products->GetList();

$Main->template->Display(
	array(
		'city'=>$city,
		'cats_price'=>$cats_price,
		'city_items'=>$city_items,
		'adv'=>$ShopClass->getAdv()
	)
);
