<?php
$Main->user->PagePrivacy();
$Main->template->DisplayJson("!21212");
$ShopClass->vendors->CreateModel();
$ShopClass->vendors->model->columns_where->getStatus()->setValue(true);
$ShopClass->vendors->model->columns_where->getUrl()->setValue($Main->GPC['brand_url']);
$ShopClass->vendors->model->setSelectField($ShopClass->vendors->model->getTableName().'.*');
$ShopClass->vendors->model->SetJoinImage('icon',$ShopClass->vendors->model->GetTableItemName('icon'));
$ShopClass->vendors->model->SetJoinImage('bg',$ShopClass->vendors->model->GetTableItemName('bg'));
$data_info=$ShopClass->vendors->GetItem(1);

if ($data_info==false) {

	require_once ROOT_DIR.'/app/modules/shop/actions/brands/brands.php';
	exit;
}


$breadcrumbs=array();
$breadcrumbs[]=array(
	'title'=>'Бренды',
	'link'=>BASE_URL.'/brands/'
);
$breadcrumbs[]=array(
	'title'=>$data_info['vendor_name']
);


$page_name=$data_info['vendor_name'];
$meta_title='Каталог '.$data_info['vendor_name'].', купить товары '.$data_info['vendor_name'].' в Симферополе и Крыму';
$meta_keywords='каталог '.$data_info['vendor_name'].', товары '.$data_info['vendor_name'].', '.$data_info['vendor_name'].' симферополь , '.$data_info['vendor_name'].' крым';
$meta_desc='В интернет-магазине "Крым Сервис Ойл" Вы можете купить товары '.$data_info['vendor_name'].' с доставкой по Крыму. Каталог '.$data_info['vendor_name'].'. Наличие товаров '.$data_info['vendor_name'].' на складах в Симферополе, Евпатории и т.д.';

if ($data_info['vendor_meta_title']) {
	$meta_title=$data_info['vendor_meta_title'];
}
if ($data_info['vendor_meta_keywords']) {
	$meta_keywords=$data_info['vendor_meta_keywords'];
}
if ($data_info['vendor_meta_desc']) {
	$meta_desc=$data_info['vendor_meta_desc'];
}
if ($Main->template->global_vars['seo_text']=='') {
	$Main->template->global_vars['seo_text']='
<p>В данном разделе вы можете найти каталог товаров '.$data_info['vendor_name'].' в Симферополе с доставкой по Крыму. Наличие в магазинах и складах в Симферополе, Евпатории и т.д. В случае трудностей с подбором товара, Вы можете обратиться к нашему менеджеру. Он сможет проконсультировать и помочь в подборе оптимальных для Вас вариант.</p>';
}


$Main->template->SetPageAttributes(
	array(
		'title'=>$meta_title,
		'keywords'=>$meta_keywords,
		'desc'=>$meta_desc
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>$page_name,
		'page_class'=>'page-vendor'
	)
);


$ShopClass->products->CreateModel();
$ShopClass->products->model->setSelectField(' `shop_items`.*');
$ShopClass->products->model->SetJoinAll ();
$ShopClass->products->model->columns_where->getVendorId()->setValue($data_info['vendor_id']);
$ShopClass->products->model->addWhereCustom("`shop_vendors`.vendor_status=1");
$ShopClass->products->model->addWhereCustom("cat_status=1");

$ShopClass->products->model->setCount(25);
$ShopClass->products->model->setOrderByWithColumn($ShopClass->products->model->columns_where->getViews()->getName());
$ShopClass->products->model->setOrderWay('DESC');
$ShopClass->products->model->columns_where->getAmount()->notValue(0);
$hit_items=$ShopClass->products->GetList();
shuffle($hit_items);
$hit_items=array_slice($hit_items,0,8);


// Cats
$ShopClass->vendors->CreateModel();
$ShopClass->vendors->model->columns_where->getStatus()->setValue(true);
$ShopClass->vendors->model->columns_where->getId()->setValue($data_info['vendor_id']);
$ShopClass->vendors->model->setSelectField(
	'cat_id,cat_title,cat_url, count(item_id) as cat_count'
);
$ShopClass->vendors->model->setTablePrimaryKey('');
$ShopClass->vendors->model->setGroupCustom('item_cat_id' );
$ShopClass->vendors->model->innerProducts();
$ShopClass->vendors->model->setOrderBy('cat_title');
$ShopClass->vendors->model->addWhereCustom('cat_status=1');
$ShopClass->vendors->model->addWhereCustom('item_status=1');
$ShopClass->vendors->model->addWhereCustom('item_amount!=0');
$ShopClass->vendors->model->addWhereCustom('item_price!=0');
$cats=$ShopClass->vendors->GetList();


$filter_s=array();
$filter_s['show_order']=true;
$filter_s['key']='banners';
$banners=$SettingsClass->GetGroupValues($filter_s);

$Main->template->Display(
	array(
		'vendor_info'=>$data_info,
		'hit_items'=>$hit_items,
		'cats'=>$cats,
		'banners'=>$banners,
		'last_views'=>$ShopClass->getLastViews()
	));
