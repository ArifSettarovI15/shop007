<?php
$Main->user->PagePrivacy();

$breadcrumbs=array();
$breadcrumbs[]=array(
	'title'=>'Компания',
	'link'=>BASE_URL.'/o-kompanii.html'
);
$breadcrumbs[]=array(
	'title'=>'О магазине'
);

$Main->template->SetPageAttributes(
	array(
		'title'=>'О магазине',
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>'О магазине'
	)
);

$filter_s=array();
$filter_s['key']='company';
$filter_s['show_order']=true;
$fields=$SettingsClass->GetGroupValues($filter_s);

$filter_s=array();
$filter_s['key']='contacts';
$filter_s['show_order']=true;
$fields2=$SettingsClass->GetGroupValues($filter_s);

$Main->template->Display(
	array(
		'adv'=>$ShopClass->getAdv(),
		'fields'=>$fields,
		'contacts'=>$fields2
	));
