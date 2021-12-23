<?php
$Main->user->PagePrivacy();

$breadcrumbs=array();
$breadcrumbs[]=array(
	'title'=>'Контакты'
);

$Main->template->SetPageAttributes(
	array(
		'title'=>'Вакансии',
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>'Вакансии',
		'page_class'=>'page-job'
	)
);

$filter_s=array();
$filter_s['key']='job';
$filter_s['show_order']=true;
$fields=$SettingsClass->GetGroupValues($filter_s);

$filter_s=array();
$filter_s['show_order']=true;
$filter_s['key']='banners';
$banners=$SettingsClass->GetGroupValues($filter_s);

$Main->template->Display(
	array(
		'fields'=>$fields,
		'banners'=>$banners,
		'last_views'=>$ShopClass->getLastViews()
	));
