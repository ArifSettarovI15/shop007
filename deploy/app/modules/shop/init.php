<?php

require_once 'models/shop.php';

$ShopClass =new ShopClass($Main);
$Main->shop=$ShopClass;
$Main->template->global_vars['fav_items'] = array();
$Main->template->global_vars['fav_list']  = array();


//cats
//
//$Main->cache->init();
//$Main->template->global_vars['menu_cats']=$Main->cache->get('TopCatsGlobal');
//if ($Main->template->global_vars['menu_cats']) {
//	$Main->template->global_vars['menu_cats'] = unserialize( $Main->template->global_vars['menu_cats'] );
//}
//else {
	$ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getStatus()->setValue( true );
	$ShopClass->cats->model->setSelectField( $ShopClass->cats->model->getTableName() . '.*' );
//	$ShopClass->cats->model->SetJoinImage('icon',$ShopClass->cats->model->GetTableItemName('icon'));
//	$ShopClass->cats->model->setOrderByWithColumn( 'sort' );
	$ShopClass->cats->model->setOrderWay( 'ASC' );
	$top_cats                                 = $ShopClass->cats->GetList();
	$top_cats                                 = $ShopClass->cats->MakeTree( 0, $top_cats );
	$Main->template->global_vars['menu_cats'] = $top_cats;
//	$Main->cache->set('TopCatsGlobal', serialize($Main->template->global_vars['menu_cats']),48);
//}



//$Main->template->global_vars['delivery_cities'] = $ShopClass->delivery_cities->getDeliveryCities();
//$user_cities=array();
//if ($Main->user_info['user_id']) {
//	$user_cities=$ShopClass->delivery_user->GetUserAddr($Main->user_info['user_id']);
//}
//
//$Main->input->clean_array_gpc('c', array(
//	'geo_city'=>TYPE_UINT
//));

//$Main->template->global_vars['geo_delivery']=false;
//$simf_delivery=false;
//foreach ($Main->template->global_vars['delivery_cities'] as $item) {
//
//	if ($Main->GPC['geo_city'] and $Main->GPC['geo_city']==$item['city_id']) {
//		$Main->template->global_vars['geo_delivery']=$item;
//	}
//	elseif(count($user_cities)>0 and array_values($user_cities)[0]['delivery_city']==$item['city_id']) {
//		$Main->template->global_vars['geo_delivery']=$item;
//	}
//	if ($item['city_id']==4) {
//		$simf_delivery=$item;
//	}
//}

//if ($Main->template->global_vars['geo_delivery']==false) {
//	$Main->template->global_vars['geo_delivery']=$simf_delivery;
//}
//
//if ($Main->GPC['ajax']) {
//
//}
//elseif (preg_match_all('#manager#', $_SERVER['REQUEST_URI'], $matches)==false) {
//	//Basket
//	$ShopClass->products->GetBasket();
//
//	$ShopClass->products->SetGlobalFav();
//	$ShopClass->fav->SetGlobalFav();
//
//
//
//
//	$ShopClass->vendors->CreateModel();
//	$ShopClass->vendors->model->columns_where->getStatus()->setValue(true);
//	$ShopClass->vendors->model->setOrderByWithColumn($ShopClass->vendors->model->columns_where->getTitle()->getName());
//	$Main->template->global_vars['vendors'] = $ShopClass->vendors->GetList();
//
//
//	/*if ($Main->user_profile['profile_notify']) {
//		$ShopClass->notify_data->CreateModel();
//		$ShopClass->notify_data->model->columns_where->getUserId()->inValues(array(0,$Main->user_info['user_id']));
//		$ShopClass->notify_data->model->setOrderByWithColumn('id');
//		$ShopClass->notify_data->model->setOrderWay('DESC');
//		$Main->template->global_vars['profile_notify_data']=$ShopClass->notify_data->GetItem();
//	}*/
//
//	if ($Main->user_info['user_id']) {
//		$Main->template->global_vars['user_balance']=$ShopClass->orders->getUnpaidSum( $Main->user_info['user_id'] );
//	}
//}
