<?php
$Main->user->PagePrivacy('admin');
if ($Main->GPC['action']=='sort_table') {
	$Main->input->clean_array_gpc('r', array(
		'data_sort' => TYPE_ARRAY_UINT
	));

	$pos=0;
	$ShopClass->parts->CreateModel();

	foreach ($Main->GPC['data_sort'] as $line_key) {
		$ShopClass->parts->model->columns_where->getId()->setValue($line_key);
		$ShopClass->parts->model->columns_update->getSort()->setValue($pos);
		$ShopClass->parts->Update();
		$pos++;
	}

	$array['status']=true;
	$array['text']='Позиции обновлены';
	$Main->template->DisplayJson($array);
}
if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));

	$collection_info=$ShopClass->parts->GetItemById($Main->GPC['object_id']);

	$ShopClass->parts->CreateModel();
	$ShopClass->parts->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$status=$ShopClass->parts->Delete();

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


if ($Main->GPC['action']=='update_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL
	));

	$collection_info=$ShopClass->parts->GetItemById($Main->GPC['object_id']);

	$ShopClass->parts->CreateModel();
	$ShopClass->parts->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$ShopClass->parts->model->columns_update->getStatus()->setValue($Main->GPC['value']);

	$status=$ShopClass->parts->Update();

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Статус выборки обновлен';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}




/////////////////////////////////

$page_name='Выборки';
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
				'title'=>'Категории',
				'link'=>BASE_URL.'/manager/shop/cats/'
			),
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name
	)
);

$Main->input->clean_array_gpc('r', array(
	'cat_parent_id' => TYPE_INT
));

$ShopClass->cats->CreateModel();
$ShopClass->cats->model->setOrderByWithColumn('title');
$ShopClass->cats->model->setOrderWay('ASC');
$cats=$ShopClass->cats->GetList();
$CatsMenu=$ShopClass->cats->MakeTree(0,$cats);

$cats_all=array(
	$Main->GPC['cat_parent_id']
);
//All child cats
$cats_all=array_merge($cats_all,$ShopClass->cats->GetAllCatsIds($CatsMenu,$Main->GPC['cat_parent_id']));


$variables['cats_select']= $ShopClass->cats->GetCatsNestedSelect(0,$CatsMenu,'');


$Paging =new ClassPaging($Main,20,false,false);
$Paging->show_per_page=true;

$ShopClass->parts->CreateModel();
$ShopClass->parts->model->columns_where->getCatId()->inValues($cats_all);
$Paging->total=$ShopClass->parts->GetTotal();

$ShopClass->parts->model->setSelectField($ShopClass->parts->model->getTableName().'.*');
$ShopClass->parts->model->setCount($Paging->per_page);
$ShopClass->parts->model->setStart($Paging->sql_start);
$ShopClass->parts->model->setOrderByWithColumn('sort');

$Paging->data=$ShopClass->parts->GetList();
$Paging->Display('shop/manage/parts_table.twig',$variables);
