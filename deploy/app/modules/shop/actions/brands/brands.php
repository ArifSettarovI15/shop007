<?php
$Main->user->PagePrivacy();
$Main->input->clean_array_gpc('r', array(
	'vendor_letter'=>TYPE_STR,
	'filters'=>TYPE_ARRAY
));


$breadcrumbs=array();
$page_name='Бренды';

if ($Main->GPC['brand_url']) {
	$Main->GPC['cat_url']=$Main->GPC['brand_url'];
	$Main->GPC['brand_url']='';
}

if ($Main->GPC['cat_url']) {
	$ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getStatus()->setValue(true);
	$ShopClass->cats->model->columns_where->getUrl()->setValue($Main->GPC['cat_url']);
	$cat_info=$ShopClass->cats->GetItem(1);

	if ($cat_info==false) {
		$Main->error->PageNotFound();
	}
}

if ($Main->GPC['cat_url']=='tyres') {
	$page_name.=' шин';
}
elseif ($Main->GPC['cat_url']=='wheels') {
	$page_name.=' дисков';
}
else {
	$page_name.=' '.mb_strtolower($cat_info['cat_title']);
}

if ($Main->GPC['cat_url']) {
	$ids=array_merge(array($cat_info['cat_id']),$ShopClass->cats->GetAllCatsIds($Main->template->global_vars['menu_cats'],$cat_info['cat_id']));

	$ShopClass->offers->CreateModel();
	if (count($ids)>0) {
		$ShopClass->offers->model->addWhereCustom(
			$ShopClass->offers->SqlWherePrepare('simple','shop_items.item_cat_id',$ids, 'in')
		);
	}

	$ShopClass->offers->model->columns_where->getStatus()->setValue(true);
	$ShopClass->offers->model->addWhereCustom(
		$ShopClass->offers->SqlWherePrepare('simple','shop_items.item_status',1)
	);
	if ($Main->user_info['user_id']) {
		$ShopClass->offers->model->columns_where->getAmountOpt()->notValue(0);
	}
	else {
		$ShopClass->offers->model->columns_where->getAmount()->notValue(0);
	}

	$ShopClass->offers->model->columns_where->getPrice()->moreValue(1);
	$ShopClass->offers->model->SetJoinProducts();
	$ShopClass->offers->model->SetInnerVendors();
	$ShopClass->offers->model->SetJoinImage('bg','shop_vendors.vendor_bg');
	$ShopClass->offers->model->setTablePrimaryKey('vendor_id');
	if ($Main->user_info['user_id']) {
		$ShopClass->offers->model->columns_where->getAmountOpt()->notValue(0);
	}
	else {
		$ShopClass->offers->model->columns_where->getAmount()->notValue(0);
	}
	$ShopClass->offers->model->setOrderBy('vendor_name');
	$vendors=$ShopClass->offers->GetList();
}
else {
	$ShopClass->vendors->CreateModel();
	$ShopClass->vendors->model->setSelectField($ShopClass->vendors->model->getTableName().'.*');
	$ShopClass->vendors->model->columns_where->getStatus()->setValue(true);
	$ShopClass->vendors->model->JoinBg();
	$ShopClass->vendors->model->setOrderByWithColumn($ShopClass->vendors->model->columns_where->getTitle()->getName());
	$vendors=$ShopClass->vendors->GetList();
}


$filter_s=array();
$filter_s['show_order']=true;
$filter_s['key']='banners';
$banners=$SettingsClass->GetGroupValues($filter_s);

$filter_s=array();
$filter_s['key']='page_brands';
$fields=$SettingsClass->GetGroupValues($filter_s);

if ($Main->GPC['cat_url']) {
	$breadcrumbs[]=array(
		'title'=>'Бренды',
		'link'=>BASE_URL.'/brands/'
	);

	$breadcrumbs[]=array(
		'title'=>$cat_info['cat_title']
	);

}
else {
	$breadcrumbs[]=array(
		'title'=>$page_name
	);
}


$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>$page_name,
		'total'=>$total,
		'total_before'=>'Всего',
		'page_class'=>'page-brands'

	)
);

$last_views=$ShopClass->getLastViews();


if ($Main->GPC['cat_url']) {
	$gg=BASE_URL.'/'.$Main->GPC['cat_url'].'/';
}
else {
	$gg=BASE_URL.'/brands/';
}
$Main->template->DisplayCore('shop/brands/brands.twig',array(
	'list'=>$vendors,
	'banners'=>$banners,
	'fields'=>$fields,
	'last_views'=>$last_views,
	'cat_url'=>$gg,
	'short_cat_url'=>$Main->GPC['cat_url']
));


