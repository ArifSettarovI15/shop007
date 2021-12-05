<?php
$Main->user->PagePrivacy('user,admin');
$Main->input->clean_array_gpc('r', array(
	'status' => TYPE_UINT,
	'q' => TYPE_STR,
	'date_start'=>TYPE_STR,
	'date_end'=>TYPE_STR,
	'group_id'=>TYPE_UINT
));


if ($Main->GPC['action'] == 'get_items') {
	$Main->input->clean_array_gpc('r', array(
		'id' => TYPE_UINT
	));

	$del_items = $ShopClass->products->GetDeliveryItems($Main->GPC['id']);

	$array=array(
		'html'=>$Main->template->Render('frontend/components/delivery-info/delivery-info.twig', array(
			'order_items'=>$del_items
		)),
		'del_id'=>$Main->GPC['id'],
		'status'=>true
	);
	$Main->template->DisplayJson($array);
	exit;
}

$ShopClass->order_del->CreateModel();
$ShopClass->order_del->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);

$Paging =new ClassPaging($Main,20,true,false);
$Paging->show_per_page=false;


$Paging->total=$ShopClass->order_del->GetTotal();

$ShopClass->order_del->model->setCount($Paging->per_page);
$ShopClass->order_del->model->setStart($Paging->sql_start);

$Paging->data=array();

$variables['total_closed']=$Paging->total-$variables['total_opened'];

$variables['order_items']=array();
$variables['type']='numbers';

if ($Paging->total) {
	$ShopClass->order_del->model->SetJoinCities();
	$ShopClass->order_del->model->setOrderByWithColumn($ShopClass->order_del->model->columns_where->getId()->getName());
	$ShopClass->order_del->model->setOrderWay('DESC');
	$Paging->data=$ShopClass->order_del->GetList();
}
$page_name='Мои доставки';


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

$variables['show_profile_links']=true;
$variables['insert_filters']=true;

$Paging->Display('frontend/components/delivery-list/delivery-list.twig',$variables);


