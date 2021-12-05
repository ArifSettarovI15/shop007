<?php
$Main->user->PagePrivacy();
$photo_input2='product_photos';
$is_modal=false;
if ($Main->GPC['action'] == "get_modal"){
    $Main->input->clean_array_gpc('r', array('item_url'=>TYPE_STR));
    $is_modal=true;
}

if($Main->GPC['item_url']) {

	$ShopClass->products->CreateModel();
	$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
	$ShopClass->products->model->SetJoinAll(false);
	$ShopClass->products->model->columns_where->getStatus()->setValue(true);
	$ShopClass->products->model->columns_where->getUrl()->setValue($Main->GPC['item_url']);
    $ShopClass->products->model->columns_where->getStatus()->setValue(1);
	$data_info=$ShopClass->products->GetItem(1);
	if (!$data_info){
		$Main->error->PageNotFound();
	}

    $offers = array();
    $ShopClass->offers->CreateModel();
    $ShopClass->offers->model->setSelectField($ShopClass->offers->model->getTableName().".offer_id, ".
                                              $ShopClass->offers->model->getTableName().".offer_price, ".
                                              $ShopClass->offers->model->getTableName().".offer_price_sale, ".
                                              $ShopClass->offers->model->getTableName().".offer_key, ".
                                              $ShopClass->offers->model->getTableName().".offer_diam, ".
                                              $ShopClass->offers->model->getTableName().".offer_weight, ".
                                              $ShopClass->offers->model->getTableName().".offer_icon, ".
                                              $ShopClass->offers->model->getTableName().".offer_sort");
    $ShopClass->offers->model->columns_where->getItemId()->setValue($data_info['item_id']);
    $ShopClass->offers->model->columns_where->getStatus()->setValue(1);
    $ShopClass->offers->model->SetJoinImage('icon','shop_offers.offer_icon');
    $ShopClass->offers->model->setOrderBy('offer_sort');
    $data_info['offers'] = $ShopClass->offers->GetList();
    $data_info['decorations'] = $ShopClass->item_decor->GetDecorIdsList($data_info['item_id']);




    $filter_values = $ShopClass->products_filters->GetValuesList($data_info['item_id']);
}
else{
    $Main->error->PageNotFound();
}

foreach ($filter_values as $value){
    $values =$value;
    foreach ($values as $item){
        $data_info['filters'][$item['sprav_name']][]=$item['svid_title'];
    }

}

$Paging =new ClassPaging($Main,3,true);
$Paging->template = 'frontend/components/paging/paging.twig';
$Paging->template2 = 'frontend/components/paging/paging.twig';
$Paging->template3 = 'frontend/components/paging/paging.twig';

if ($data_info['item_cat_id']){
    $ShopClass->products->CreateModel();
    $ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().".*");
    $ShopClass->products->model->SetJoinImage('icon',$ShopClass->products->model->GetTableItemName('icon'));
    $ShopClass->products->model->SetJoinCats();
    $ShopClass->products->model->SetJoinMinPriceOffer();
    $ShopClass->products->model->columns_where->getCatId()->setValue($data_info['item_cat_id']);
    $ShopClass->products->model->columns_where->getId()->notValue($data_info['item_id']);
    $ShopClass->products->model->columns_where->getOffersTotal()->notValue(0);
    $ShopClass->products->model->columns_where->getStatus()->setValue(1);
    $similar =$ShopClass->products->GetList();

    $ShopClass->reviews->CreateModel();
    $ShopClass->reviews->model->setSelectField($ShopClass->reviews->model->getTableName().".*");
    $ShopClass->reviews->model->columns_where->getItemId()->setValue($data_info['item_id']);
    $ShopClass->reviews->model->columns_where->getStatus()->setValue(1);
    $ShopClass->reviews->model->setOrderBy('review_id DESC');
    $ShopClass->reviews->model->setStart($Paging->sql_start);
    $ShopClass->reviews->model->setCount($Paging->per_page);
    $reviews['feeds'] = $ShopClass->reviews->GetList();
    $Paging->data = $reviews['feeds'];
    $Paging->total = $ShopClass->reviews->GetTotal();

    $ShopClass->reviews->CreateModel();
    $ShopClass->reviews->model->setSelectField($ShopClass->reviews->model->getTableName().".review_id, ".$ShopClass->reviews->model->getTableName().".review_rating");
    $ShopClass->reviews->model->columns_where->getItemId()->setValue($data_info['item_id']);
    $ShopClass->reviews->model->columns_where->getStatus()->setValue(1);
    $reviews_rats = $ShopClass->reviews->GetList();

    $reviews['reviews_total'] = $ShopClass->reviews->GetTotal();

    $reviews_sum = array();
    foreach ($reviews_rats as $rate){
        $reviews_sum[] = $rate['review_rating'];
    }
    if ($reviews['reviews_total']){
        $reviews['reviews_sum'] = array_sum($reviews_sum)/(int)$reviews['reviews_total'];
    }


    $ShopClass->parts->CreateModel();
    $ShopClass->parts->model->setSelectField($ShopClass->parts->model->getTableName().".part_id, ".$ShopClass->parts->model->getTableName().".part_title");
    $ShopClass->parts->model->columns_where->getStatus()->setValue(true);
    $ShopClass->parts->model->columns_where->getCatId()->setValue($item['cat_id']);
    $ShopClass->parts->model->setOrderBy('part_sort');
    $parts=$ShopClass->parts->GetList();
}

$breadcrumbs=array();
$breadcrumbs[]=array(
    'title'=>'Каталог',
    'link'=>BASE_URL.'/catalog/'
);$breadcrumbs[]=array(
    'title'=>$data_info['cat_title'],
    'link'=>BASE_URL.'/'.$data_info['cat_url'].'/'
);


$Main->template->SetPageAttributes(
    array(
        'title'=>$data_info['item_title'],
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>$breadcrumbs,
        'title'=>$data_info['item_title'],
        'page_class'=>'page-catalog'
    )
);


$image_data_reviews = array(
    'input_name'=>'review_icon',
    'files'=>$Main->files->GetFileIdsItems('product_photos', $data_info['item_id']),
    'module'=>'reviews',
    // 'show_select_image'=>true,
    'title'=>'Медиа отзывов',
    'folder'=>'reviews_photos',
    'multiple'=>true,
    'sort_name'=>'reviews_photos'
);

$image_data2 = array(
    'input_name'=>$photo_input2,
    'files'=>$Main->files->GetFileIdsItems('product_photos', $data_info['item_id']),
    'module'=>'shop',
    // 'show_select_image'=>true,
    'title'=>'Медиа товаров',
    'folder'=>'product_photos',
    'multiple'=>true,
    'sort_name'=>'product_photos'
);
$main_photo = array('item_icon_url' => $data_info['item_icon_url']);
array_unshift($image_data2['files'],$main_photo );


$viewed = explode(',', json_decode($_COOKIE['last_viewed']));
if (!in_array($data_info['item_id'], $viewed)){
    if (isset($_COOKIE['last_viewed'])){
        if ($data_info['item_id'])
        setcookie('last_viewed', json_encode(json_decode($_COOKIE['last_viewed']).','.$data_info['item_id']),  time()+3600*24*7, '/');
    }
    else{
        if ($data_info['item_id'])
        setcookie('last_viewed', json_encode($data_info['item_id']), time()+3600*24*7, '/');
    }
}

$array=array(
	'info'=>$data_info,
	'similar'=>$similar,
	'parts'=>$parts,
	'last_viewed'=>$ShopClass->products->getLastViews(),
	'reviews'=>$reviews,
	'image_data2'=>$image_data2,
);


if ($Main->GPC['page'] and $Main->GPC['page']!=0 and $Main->GPC['page']!=''){
    $Paging->Display('frontend/components/product-feeds/feeds_list.twig',['status'=>true, 'product'=>true]);
}

if ($is_modal){
    $data['status'] = true;
    $data['html'] = $Main->template->Render('frontend/components/modal-5/modal-5.twig', $array);

    $Main->template->DisplayJson(
        $data
    );
}
else{
    $Paging->Display('shop/product/view.twig',$array);
}



//
//$top_cat=false;
//$show_4=false;
//$child_items=array();
//$current_item_id=$data_info['item_id'];
//if ($data_info['item_has_child'] or $data_info['item_parent_id']) {
//	$ShopClass->products->CreateModel();
//	$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
//	$ShopClass->products->model->SetJoinAll(false);
//	$ShopClass->products->model->columns_where->getOffersTotal()->notValue(0);
//	$ShopClass->products->model->columns_where->getPrice()->notValue(0);
//	$ShopClass->products->model->columns_where->getAmount()->notValue(0);
//	$ShopClass->products->model->columns_where->getStatus()->setValue(true);
//	if ($data_info['item_has_child']) {
//		$ShopClass->products->model->columns_where->getParentId()->setValue($data_info['item_id']);
//	}
//	else {
//		$ShopClass->products->model->columns_where->getParentId()->setValue($data_info['item_parent_id']);
//	}
//
//	$child_items=$ShopClass->products->GetList();
//
//	if ($data_info['item_has_child']) {
//		foreach ($child_items as $p) {
//			$sub_items[]=$p['item_id'];
//		}
//	}
//	if (count($child_items)>0) {
//		if ($data_info['item_has_child']) {
//			$current_item_id=array_values($child_items)[0]['item_id'];
//		}
//		else {
//			$current_item_id=$data_info['item_id'];
//		}
//	}
//
//}



//if($data_info['item_id']) {
//	$ShopClass->offers->CreateModel();
//	$ShopClass->offers->model->setSelectField($ShopClass->offers->model->getTableName().".*");
//	$ShopClass->offers->model->columns_where->getStatus()->setValue(true);
//	$ShopClass->offers->model->columns_where->getItemId()->setValue($data_info['item_id']);
//	$offer_info=$ShopClass->offers->GetList();
//}
//
//
//
//
//if ($offer_info) {
//	$item_filter_values=$ShopClass->offers_filters->GetValuesListF($offer_info,1);
//}
//else {
//	$item_filter_values=$ShopClass->products_filters->GetValuesListF($data_info,1, $sub_items);
//}

//if ($Main->GPC['action']=='get_similar') {
//
//	$similar_items=array();
//	$ShopClass->products->CreateModel();
//	$ShopClass->products->model->setTablePrimaryKey('');
//	$ShopClass->products->model->columns_where->getStatus()->setValue(true);
//	$ShopClass->products->model->columns_where->getCatId()->setValue( $data_info['item_cat_id'] );
//	$ShopClass->products->model->columns_where->getPhotoId()->notValue( 0 );
//	$ShopClass->products->model->columns_where->getOffersTotal()->notValue( 0 );
//	$ShopClass->products->model->columns_where->getPrice()->notValue( 0 );
//	$ShopClass->products->model->columns_where->getAmount()->notValue( 0 );
//
//	$min_price=$data_info['item_price']-1500;
//	$max_price=$data_info['item_price']+1500;
//	if ($offer_info) {
//		$min_price=$offer_info['offer_price']-1500;
//		$max_price=$offer_info['offer_price']+1500;
//	}
////$ShopClass->products->model->columns_where->getPrice()->rangeValue( $min_price, $max_price);
//
//	$ShopClass->products->model->SetJoinAll(false);
//	if ($Main->user_info['user_id']>0) {
//		$ShopClass->products->model->addWhereCustom(' `shop_offers`.'.$Main->shop->getUserGroupOfferPrice().'!=0');
//	}
//
//
//	$sprav_filters=array();
//	$all_cats=array();
//	if ($data_info['item_cat_id']) {
//		$cc_id=$data_info['item_cat_id'];
//		$all_cats=$ShopClass->cats->GetParentAllCatsIds($cc_id,$CatsMenu);
//		$sprav_filters=$ShopClass->cats_filters->GetSpravFiltersList($all_cats);
//	}
//
//
//	$filters_inners_array=array();
//	foreach ($sprav_filters as $filter) {
//
//
//		if ( in_array( $filter['sprav_id'], $filters_inners_array ) == false and $filter['sprav_status'] and $filter['sprav_filter'] and $filter['sprav_similar'] and
//		                                                                                                                                 isset($item_filter_values[$filter['sprav_title']])) {
//			if (is_array($item_filter_values[$filter['sprav_title']]['values']) and count($item_filter_values[$filter['sprav_title']]['values'])>0) {
//
//				$filter_isset = true;
//			}
//
//		}
//	}
//
//	$ShopClass->products->model->setJoin('  INNER JOIN `shop_offers` ON `shop_items`.`item_id`= `shop_offers`.`offer_item_id`');
//
//	foreach ($sprav_filters as $filter) {
//		if ( in_array( $filter['sprav_id'], $filters_inners_array ) == false and $filter['sprav_status'] and $filter['sprav_filter'] and $filter['sprav_similar'] and
//		                                                                                                                                 isset($item_filter_values[$filter['sprav_title']])) {
//			if (is_array($item_filter_values[$filter['sprav_title']]['values']) and count($item_filter_values[$filter['sprav_title']]['values'])>0) {
//				$filters_inners_array[] = $filter['sprav_id'];
//
//				$filter_isset = true;
//				if ( $filter['sprav_object_id'] == 0 ) {
//					$ShopClass->products->model->SetJoinFilters( $filter['sprav_id'] );
//				} else {
//					$ShopClass->products->model->SetJoinItemFilters( $filter['sprav_id'] );
//				}
//
//				$sql_query = $ShopClass->products->SqlWherePrepare( 'simple', 'filters_data_' . $filter['sprav_id'] . '.`sif_svid`', $item_filter_values[$filter['sprav_title']]['values'], 'in' );
//				if ( $sql_query ) {
//
//					if ( $filter['sprav_object_id'] == 0 ) {
//						$show_offers = true;
//					}
//					$ShopClass->products->model->addWhereCustom( $sql_query );
//				}
//
//			}
//
//		}
//	}
//
//	if ($show_offers) {
//		$ShopClass->products->model->addWhereCustom(' shop_offers.offer_amount>0 ');
//		$ShopClass->products->model->SetJoinImage('icon_offer','shop_offers.offer_icon');
//	}
//
//	if ($show_offers) {
//		$ShopClass->products->model->setTablePrimaryKey('');
//		$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*,shop_offers.*');
//		$ShopClass->products->model->setOrderByWithColumn('shop_offers.offer_sort');
//		$ShopClass->products->model->setOrderWay('DESC');
//	}
//	else {
//		$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
//		$ShopClass->products->model->setOrderByWithColumn($ShopClass->products->model->columns_where->getSort()->getName());
//	}
//	$ShopClass->products->model->columns_where->getId()->notValue( $data_info['item_id'] );
//	$ShopClass->products->model->setCount(20);
//
//	$similar_items=$ShopClass->products->GetList();
//
//	$array['html'] = $Main->template->Render('frontend/components/similar/similar.twig',
//		array(
//			'items' => $similar_items
//		)
//	);
//	if ($error!='') {
//		$array['status']=false;
//		$array['text']=$error;
//	}
//	else {
//		$array['status']=true;
//	}
//	$Main->template->DisplayJson($array);
//}


//All parent cats
//
//$cats=array();
//$cats_all=array(
//	$data_info['cat_id']
//);
//
//$CatsMenu=$Main->template->global_vars['menu_cats'];
//
//$parent_cats=$ShopClass->cats->GetParentCats($CatsMenu,$data_info['cat_id']);
//$parent_cats=array_reverse($parent_cats);


//foreach ($parent_cats as $cat){
//	if ($top_cat==false) {
//		$top_cat=$cat['cat_id'];
//	}
//	$breadcrumbs[]=array(
//		'title'=>$cat['cat_title'],
//		'link'=>$cat['full_cat_url']
//	);
//
//}
//if ($data_info['item_cat_id']) {
//	$breadcrumbs[]=array(
//		'title'=>$data_info['cat_title'],
//		'link'=>$data_info['cat_full_url']
//	);
//}
//if ($data_info['item_vendor_id']) {
//	$breadcrumbs[]=array(
//		'title'=>$data_info['vendor_name'],
//		'link'=>$data_info['cat_vendor_full_url']
//	);
//}
//
//if ($data_info['item_parent_id']) {
//	$parent_info=$ShopClass->products->GetItemById($data_info['item_parent_id']);
//	$breadcrumbs[]=array(
//		'title'=>$parent_info['item_title'],
//		'link'=>$parent_info['item_full_url']
//	);
//}
//
//if ($data_info['item_cat_id']==1 or $data_info['item_cat_id']==2) {
//	$show_4=true;
//}
