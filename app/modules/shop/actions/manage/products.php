<?php
$Main->user->PagePrivacy('admin');
$Main->input->clean_array_gpc('r', array(
	'item_status' => TYPE_NUM,
	'badge' => TYPE_STR,
	'order' => TYPE_STR,
	'item_icon_isset'=>TYPE_NUM,
	'item_vendor_id'=>TYPE_INT,
	'item_title'=>TYPE_STR,
	'q'=>TYPE_STR,
	'cat_parent_id'=>TYPE_INT,
	'item_price_min'=>TYPE_INT,
	'item_price_max'=>TYPE_INT,
	'item_amount_min'=>TYPE_INT,
	'item_amount_max'=>TYPE_INT,
	'price_change'=>TYPE_INT,
	'badge_change'=>TYPE_STR,
	'price_type'=>TYPE_STR,
	'price_sprav'=>TYPE_UINT,
	'price_sprav2'=>TYPE_UINT,
	'price_sprav_way'=>TYPE_UINT,
	'with_childs'=>TYPE_UINT,
	'ids'=>TYPE_ARRAY
));

if ($Main->GPC['action']=='change_item_values') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT,
		'title' => TYPE_STR,
		'short_title' => TYPE_STR
	));



	if ($Main->GPC['title']) {
		if ($Main->GPC['short_title']) {
			$url=translit_url_safe($Main->GPC['short_title']);
		}

		if ($url) {
			$ShopClass->products->CreateModel();
			$ShopClass->products->model->columns_where->getUrl()->setValue($url);
			$ShopClass->products->model->columns_where->getId()->notValue($Main->GPC['item_id']);
			$check_url=$ShopClass->products->GetItem();
		}



		$ShopClass->products->CreateModel();
		$ShopClass->products->model->columns_update->getTitle()->setValue($Main->GPC['title']);
		if ($url and $check_url==false) {
			$ShopClass->products->model->columns_update->getUrl()->setValue($url);
		}
		if ($Main->GPC['short_title']) {
			$ShopClass->products->model->columns_update->getShortTitle()->setValue( $Main->GPC['short_title'] );
		}
		$ShopClass->products->model->columns_where->getId()->setValue($Main->GPC['item_id']);

		$status=$ShopClass->products->Update();
	}


	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Объект успешно обновлен';
	}
	else {
		$array['text']='Ошибка обновления объекта';
	}
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));
	$array=array();
	$ShopClass->offers->CreateModel();
	$ShopClass->offers->model->columns_where->getItemId()->setValue($Main->GPC['object_id']);
	$items=$ShopClass->offers->GetItemSimple();

	if ($items) {
		$status=false;
		$array['text']='Товар не может быть удален, у него есть офферы';
	}
	else {
		$ShopClass->products->CreateModel();
		$ShopClass->products->model->columns_where->getId()->setValue($Main->GPC['object_id']);
		$status=$ShopClass->products->Delete();
	}




	$array['status']=$status;
	if ($status) {
		$array['text']='Объект успешно удален';
	}

	$Main->template->DisplayJson($array);
}

if ($Main->GPC['action']=='update_badge_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL,
		'type_id'=>TYPE_STR
	));

	$status=false;

	$ShopClass->products->CreateModel();
	$ShopClass->products->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$info=$ShopClass->products->GetItem();

	if ($Main->GPC['type_id']=='status' or
	    $Main->GPC['type_id']=='new' or
	    $Main->GPC['type_id']=='sale' or
	    $Main->GPC['type_id']=='hit'
	) {
		$ShopClass->products->CreateModel();
		$ShopClass->products->model->columns_where->getId()->setValue($Main->GPC['object_id']);
		if ($Main->GPC['type_id']=='status') {
			$ShopClass->products->model->columns_update->getStatus()->setValue($Main->GPC['value']);
		}
		elseif ($Main->GPC['type_id']=='new') {
			$ShopClass->products->model->columns_update->getNew()->setValue($Main->GPC['value']);
			$info['item_new']=intval($Main->GPC['value']);
		}
		elseif ($Main->GPC['type_id']=='sale') {
			$ShopClass->products->model->columns_update->getSale()->setValue($Main->GPC['value']);
			$info['item_sale']=intval($Main->GPC['value']);
		}
		elseif ($Main->GPC['type_id']=='hit') {
			$ShopClass->products->model->columns_update->getHit()->setValue($Main->GPC['value']);
			$info['item_hit']=intval($Main->GPC['value']);
		}
		if ($info['item_hit']==1 or $info['item_sale']==1 OR $info['item_new']==1 OR $info['item_recommend']==1 OR $info['item_promo']==1 OR $info['item_hit_month']==1){
			$v=1;
		}
		else {
			$v=0;
		}

		$ShopClass->products->model->columns_update->getBadge()->setValue($v);
		$status=$ShopClass->products->Update();

	}

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Товар обновлен';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}

/////////////////////////////////


if ($Main->GPC['order']=='') {
	$Main->GPC['order']='date';
	if ($Main->GPC['action']=='search') {
		$Main->GPC['order']='sort';
	}
}



if ($Main->GPC['badge']=='new') {
	$Main->GPC['item_new']=true;
}
elseif ($Main->GPC['badge']=='sale') {
	$Main->GPC['item_sale']=true;
}
elseif ($Main->GPC['badge']=='hit') {
	$Main->GPC['item_hit']=true;
}
elseif ($Main->GPC['badge']=='tag') {
	$Main->GPC['item_tag']=true;
}

$variables=array();

$ShopClass->cats->CreateModel();
$ShopClass->cats->model->columns_where->getStatus()->setValue(true);
$ShopClass->cats->model->setOrderByWithColumn('title');
$ShopClass->cats->model->setOrderWay('ASC');
$CatsMenu=$ShopClass->cats->GetList();
$CatsMenu=$ShopClass->cats->MakeTree(0,$CatsMenu);
$variables['cats_select']=$ShopClass->cats->MakeSelect($CatsMenu,0,0);


$ShopClass->vendors->CreateModel();
$ShopClass->vendors->model->columns_where->getStatus()->setValue(true);
$ShopClass->vendors->model->setOrderByWithColumn('name');
$variables['vendors']=$ShopClass->vendors->GetList();

$page_name='Товары';
$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>'Магазин',
				'link'=>BASE_URL.'/manager/shop/'
			),
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name
	)
);

$Paging =new ClassPaging($Main,20,false,false);
$Paging->show_per_page=true;

$ShopClass->products->CreateModel();
$ShopClass->products->model->setSelectFields(array('shop_items.*'));

if ($Main->GPC_exists['item_status']){
	if ($Main->GPC['item_status']!=-1) {
		$ShopClass->products->model->columns_where->getStatus()->setValue($Main->GPC['item_status']);
		$variables['item_status']=$Main->GPC['item_status'];
	}
}
else {
	$variables['item_status']=1;
	$ShopClass->products->model->columns_where->getStatus()->setValue(1);
}

if ($Main->GPC['item_new']){
	$ShopClass->products->model->columns_where->getNew()->setValue($Main->GPC['item_new']);
}

if ($Main->GPC['item_sale']){
	$ShopClass->products->model->columns_where->getSale()->setValue($Main->GPC['item_sale']);
}
if ($Main->GPC['item_hit']){
	$ShopClass->products->model->columns_where->getHit()->setValue($Main->GPC['item_hit']);
}
if ($Main->GPC_exists['item_icon_isset'] and $Main->GPC['item_icon_isset']==1){
	$ShopClass->products->model->columns_where->getPhotoId()->notValue(0);
}
elseif ($Main->GPC_exists['item_icon_isset'] and $Main->GPC['item_icon_isset']==0){
	$ShopClass->products->model->columns_where->getPhotoId()->setValue(0);
}



if ($Main->GPC['item_vendor_id']>0){
	$ShopClass->products->model->columns_where->getVendorId()->setValue($Main->GPC['item_vendor_id']);
}
elseif ($Main->GPC['item_vendor_id']==-1){
	$ShopClass->products->model->columns_where->getVendorId()->setValue(0);
}

if ($Main->GPC['item_title']!=''){
	$ShopClass->products->model->columns_where->getTitle()->setValue($Main->GPC['item_title']);
	$ShopClass->products->model->columns_where->getTitle()->setSearch(true);
}
if ($Main->GPC['q']!=''){
	$ShopClass->products->model->setJoin('  LEft JOIN `shop_offers` ON `shop_items`.`item_id`= `shop_offers`.`offer_item_id` ');
	$ShopClass->products->model->setGroupBy('`shop_items`.`item_id`');

	if ($Main->GPC['action']=='search') {
		$ShopClass->products->MakeSearchSql2($Main->GPC['q']);
	}
	else {
		$ShopClass->products->MakeSearchSql($Main->GPC['q']);
	}
}

if ($Main->GPC['cat_parent_id']>0){
	$cats=array();
	$cats[]=$Main->GPC['cat_parent_id'];

		$c=$ShopClass->cats->GetAllCatsIds($CatsMenu,$Main->GPC['cat_parent_id']);
		$cats=array_merge($cats,$c);


	if (count($cats)>1 and intval($Main->GPC['with_childs'])==0) {
		$ShopClass->products->model->columns_where->getCatId()->inValues($cats);
	}
	else {
		$ShopClass->products->model->columns_where->getCatId()->setValue($Main->GPC['cat_parent_id']);
	}
}

if ($Main->GPC['cat_parent_id']==-2) {
	$ShopClass->products->model->columns_where->getCatId()->setValue(0);
}

if ($Main->GPC_exists['item_price_min'] or $Main->GPC_exists['item_price_max']){
	$ShopClass->products->model->columns_where->getPrice()->rangeValue($Main->GPC['item_price_min'],$Main->GPC['item_price_max']);
}
if ($Main->GPC_exists['item_amount_min'] or $Main->GPC_exists['item_amount_max']){
	$ShopClass->products->model->columns_where->getAmount()->rangeValue($Main->GPC['item_amount_min'],$Main->GPC['item_amount_max']);
}
else {
	$ShopClass->products->model->columns_where->getAmount()->rangeValue(0,$Main->GPC['item_amount_max']);
	$variables['item_amount_min']=0;
}

$ShopClass->products->model->SetJoinVendors();
$ShopClass->products->model->SetJoinCats2();
$ShopClass->products->model->JoinImages();


$Paging->total=$ShopClass->products->GetTotal();

$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');

if ($Main->GPC['action']=='search') {
	$ShopClass->products->model->setCount(24);
}
else {
	$ShopClass->products->model->setCount($Paging->per_page);
}

$ShopClass->products->model->setStart($Paging->sql_start);

$key=$ShopClass->products->SetOrder($Main->GPC['order']);
$variables['order']=$key;


$Paging->data=$ShopClass->products->GetList();

$variables['sprav']=$Main->sprav->GetSprav(array(
	'show_order'=>true
),1000);

if ($Main->GPC['action']=='search') {
	$Paging->Display('frontend/components/search-block/search_list_simple.twig',$variables);
}
else {
	$Paging->Display('shop/manage/products_table.html.twig',$variables);
}
