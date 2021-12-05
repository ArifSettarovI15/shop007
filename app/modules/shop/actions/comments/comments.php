<?php
$Main->user->PagePrivacy();

	$Main->input->clean_array_gpc('r', array(
		'sort'=>TYPE_STR
	));

$title='Отзывы о товарах';
$meta_title=$title;
$breadcrumbs=array();

$comments_cat=array();
if ($Main->GPC['cat_url']) {
	$ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getStatus()->setValue(true);
	$ShopClass->cats->model->columns_where->getUrl()->setValue($Main->GPC['cat_url']);

	$comments_cat=$ShopClass->cats->GetItem(1);

	if ($comments_cat==false) {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['page']>1) {
	$breadcrumbs[] = array(
		'title' => $title,
		'link'=>BASE_URL.'/comments/'
	);
	if ($comments_cat) {
		$breadcrumbs[] = array(
			'title' => $comments_cat['cat_title'],
			'link'=>BASE_URL.'/comments/'.$comments_cat['cat_url'].'/'
		);
	}
	$breadcrumbs[] = array(
		'title' => 'Страница '.$Main->GPC['page']
	);
	$meta_title.=': Страница '.$Main->GPC['page'];
}
else {
	if ($comments_cat) {
		$breadcrumbs[] = array(
			'title' => $title,
			'link'=>BASE_URL.'/comments/'
		);
		$breadcrumbs[] = array(
			'title' => $comments_cat['cat_title']
		);
	}
	else {
		$breadcrumbs[] = array(
			'title' => $title
		);
	}

}
if ($comments_cat) {
	$title=$comments_cat['cat_title'].': отзывы о товарах';
	$meta_title=$comments_cat['cat_title'].' - '.$meta_title;
}

$variables=array();
$variables['comments_cat']=$comments_cat;

$Main->template->SetPageAttributes(
	array(
		'title'=>$meta_title,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>$title,
		'page_class'=>'page-comments'
	)
);

$filter_options=array();
$Main->GPC_exists['comment_status']=true;
$filter_options['show_order']=true;
$filter_options['object_name']='shop_item';

$sort='rank';
if ($Main->GPC['sort']=='time') {
	$sort='time';
}
$filter_options['order']=$sort;

$where_cat=0;
if ($comments_cat) {
	$filter_options['cat_id']=$comments_cat['cat_id'];
	$where_cat=$comments_cat['cat_id'];
}

$variables['pop_items']=$ShopClass->products->GetCommentsItems($where_cat,15);


$Paging =new ClassPaging($Main,12,true);
$Paging->data=$ShopClass->GetComments($filter_options,$Paging->per_page,$Paging->sql_start);
$Paging->total=$ShopClass->GetCommentsTotal($filter_options);

$filter_s=array();
$filter_s['show_order']=true;
$filter_s['key']='banners';
$variables['banners']=$SettingsClass->GetGroupValues($filter_s);
$variables['type']='numbers';

$Paging->Display('frontend/components/comments-list/comments-list.twig',$variables);
