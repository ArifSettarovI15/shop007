<?php
$Main->user->PagePrivacy('admin');

if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));

	$cat_info=$ShopClass->cats->GetItemById($Main->GPC['object_id']);

	$ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$status=$ShopClass->cats->Delete();

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


/////////////////////////////////


$variables=array();

$page_name='Уведомления';
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

$ShopClass->notify_data->CreateModel();
$ShopClass->notify_data->model->columns_where->getUserId()->setValue(0);
$ShopClass->notify_data->model->innerList();
$Paging->total=$ShopClass->notify_data->GetTotal();

$ShopClass->notify_data->model->setCount($Paging->per_page);
$ShopClass->notify_data->model->setStart($Paging->sql_start);
$ShopClass->notify_data->model->setOrderByWithColumn('id');
$ShopClass->notify_data->model->setOrderWay('DESC');

$Paging->data=$ShopClass->notify_data->GetList();
$Paging->Display('shop/manage/notify_table.twig',$variables);
