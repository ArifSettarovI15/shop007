<?php
$Main->user->PagePrivacy();
$Main->input->clean_array_gpc('r', array(
	'vendor_letter'=>TYPE_STR,
	'filters'=>TYPE_ARRAY
));


$breadcrumbs=array();

if ($Main->GPC['cat_url']=='tyres') {
	$page_name='Шины для авто';
	$breadcrumbs[]=array(
		'title'=>'Шины',
		'link'=>BASE_URL.'/tyres/'
	);

}
elseif ($Main->GPC['cat_url']=='wheels') {
	$page_name='Диски для авто';
	$breadcrumbs[]=array(
		'title'=>'Диски',
		'link'=>BASE_URL.'/wheels/'
	);
}

if ($Main->GPC['cat_url']) {


}


$filter_s=array();
$filter_s['show_order']=true;
$filter_s['key']='banners';
$banners=$SettingsClass->GetGroupValues($filter_s);


$breadcrumbs[]=array(
	'title'=>'Марки авто'
);



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

$Main->template->Display(array(
	'list'=>$ShopClass->getCarsUrl(),
	'banners'=>$banners,
	'last_views'=>$last_views
));


