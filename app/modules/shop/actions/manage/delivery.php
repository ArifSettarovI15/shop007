<?php
$Main->user->PagePrivacy('admin');


if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));

	$city_info=$ShopClass->days->GetItemById($Main->GPC['object_id']);

	$ShopClass->days->CreateModel();
	$ShopClass->days->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$status=$ShopClass->days->Delete();

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Объект успешно удален';
	}
	else {
		$array['text']='Ошибка удаления объекта';
	}
	$Main->template->DisplayJson($array);
}


$variables=array();

$page_name='Города';
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
				'title'=>'Доставка'
			),
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name
	)
);

$Paging =new ClassPaging($Main,1000,false,false);
$Paging->show_per_page=true;


$ShopClass->days->CreateModel();
$list=$ShopClass->days->GetList();
$Main->template->Display(
	array(
		'list'=>$list,
		'days'=>$ShopClass->days->getDays(),
		'time'=>$ShopClass->days->getTime(),
		'groups'=>$ShopClass->days->getGroups()
	)
);

