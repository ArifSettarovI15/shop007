<?php
$Main->user->PagePrivacy();

$page_name='Вы недавно смотрели';

$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name
	)
);
$list=$ShopClass->getLastViews(100);
$Main->template->Display(
	array(
		'list'=>$list,
		'adv'=>$ShopClass->getAdv()
	)
);


