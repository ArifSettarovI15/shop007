<?php
$Main->user->PagePrivacy('user,admin,manager');

$breadcrumbs=array();
$breadcrumbs[]=array(
	'title'=>'Обратная связь'
);

$Main->template->SetPageAttributes(
	array(
		'title'=>'Обратная связь',
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>'Обратная связь',
		'page_class'=>'page-feedback'
	)
);

$Main->template->Display(
	array(
		'show_profile_links'=>true
	));
