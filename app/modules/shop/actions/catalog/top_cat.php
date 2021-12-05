<?php

$Main->user->PagePrivacy();
$is_parts = 0;

$Paging = new ClassPaging($Main, 8, false, false);

$Paging->template = 'frontend/components/paging/paging.twig';
$Paging->template2 = 'frontend/components/paging/paging.twig';
$Paging->template3 = 'frontend/components/paging/paging.twig';
if($Main->GPC['do']='get_parts' and $Main->GPC['part_url']!='' and $Main->GPC['cat_url']!='') {
    $cat = $ShopClass->cats->GetItemByUrl($Main->GPC['cat_url']);
    $part = $ShopClass->parts->GetItemByUrl($Main->GPC['part_url']);
    if (!$cat or $cat == '') {
        $Main->error->PageNotFound();
    }
    if (!$part or $part == "") {
        $Main->error->PageNotFound();
    }
    $is_parts = 1;
    $items = $ShopClass->item_parts2->GetItemsByPartId($part['part_id']);
    foreach ($items as $item) {
        $items[$item['sip2_id']] = $item['item_id'];
    }
    $ShopClass->products->CreateModel();
    $ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName() . ".*");
    $ShopClass->products->model->SetJoinImage('icon', $ShopClass->products->model->GetTableItemNameSimple('icon'));
    $ShopClass->products->model->columns_where->getId()->inValues($items);
    $products = $ShopClass->products->GetList();


}


$svids = array();
$min_price = 0;
$max_price = 0;


    $Main->input->clean_array_gpc("r", array(
        'cat_cat' => TYPE_STR,
        'selected_cat' => TYPE_STR,
        'filter_filling' => TYPE_UINT,
        'filter_upakovka' => TYPE_UINT,
        'filter_who' => TYPE_UINT,
        'price_range_from' => TYPE_UINT,
        'price_range_to' => TYPE_UINT,
    ));


    if ($Main->GPC['filter_filling'] AND $Main->GPC['filter_filling']!=''){
        $svids_selected[] = $Main->GPC['filter_filling'];
    }
    if ($Main->GPC['filter_upakovka'] AND $Main->GPC['filter_upakovka']!=''){
        $svids_selected[] = $Main->GPC['filter_upakovka'];
    }
    if ($Main->GPC['filter_who'] AND $Main->GPC['filter_who']!=''){
        $svids_selected[] = $Main->GPC['filter_who'];
    }
    if ($Main->GPC['cat_cat'] != $Main->GPC['selected_cat'] and $Main->GPC_exists['selected_cat'] and $Main->GPC['selected_cat']!='') {

        $Main->GPC['cat_url'] = $Main->GPC['cat_cat'];
        $svids_selected = [];
    }
    if ($Main->GPC['price_range_from'] AND $Main->GPC['price_range_from']!=''){

        $price_from = $Main->GPC['price_range_from'];
    }

    if ($Main->GPC['price_range_to'] AND $Main->GPC['price_range_to']!=''){
        $price_to = $Main->GPC['price_range_to'];
    }

//$svids_selected = [9,2,32];
//$price_from = 2201;
//$price_to = 2201;
/** Если нужно отфилтровать товары $filtered_id получит id товаров подходящих по критериям фильтрации*/

if ($svids_selected){
    $filtered_ids = $ShopClass->products_filters->getFilteredItemIds($svids_selected);
}


$cat_ids_array = $ShopClass->products->getCategories();


$photo_input2='product_photos';
if ($Main->GPC['cat_url'] and $Main->GPC['cat_url']!=''){
    if ($Main->GPC['cat_url']!='all'){
        $cat = $ShopClass->cats->GetItemByUrl($Main->GPC['cat_url']);
    }
    if ($Main->GPC['cat_url']!='all') {
        if (!$cat or $cat == '') {
            $Main->error->PageNotFound();
        }
    }

    /**Товары бля вывода фильтраванные*/
    if (!$is_parts){
        $ShopClass->products->CreateModel();
        $ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().".*");
        $ShopClass->products->model->SetJoinImage('icon', $ShopClass->products->model->GetTableItemNameSimple('icon'));
        $ShopClass->products->model->SetJoin("LEFT JOIN shop_offers ON offer_item_id=item_id AND offer_is_decoration=0");
        if ($cat){
            $ShopClass->products->model->columns_where->getCatId()->setValue($cat['cat_id']);
        }
        elseif ($price_from and !$price_to){
            $ShopClass->products->model->addWhereCustom("offer_price >= ".$Main->db->sql_prepare($price_from));
        }
        elseif ($price_to and !$price_from){
            $ShopClass->products->model->addWhereCustom("offer_price <= ".$Main->db->sql_prepare($price_from));
        }
        elseif ($price_to and $price_from){
            $ShopClass->products->model->addWhereCustom("offer_price BETWEEN ".$Main->db->sql_prepare($price_from)." AND ".$Main->db->sql_prepare($price_to));
        }else {
            $ShopClass->products->model->addWhereCustom("offer_price > 10");
        }



        $ShopClass->products->model->columns_where->getOffersTotal()->notValue(0);
        if ($svids_selected and count($svids_selected)>0){ /** Выбирает только отфильтрованные товары, ИНАЧЕ все в категории*/
            if (count($filtered_ids)<1){
                $filtered_ids[] = 0;
            }
            $ShopClass->products->model->columns_where->getId()->inValues($filtered_ids);
        }
        $ShopClass->products->model->setStart($Paging->sql_start);
        $ShopClass->products->model->setCount($Paging->per_page);
        $Paging->total= $ShopClass->products->GetTotal();
        $products = $ShopClass->products->GetList();

        /**------*/
        $ShopClass->products->CreateModel();
        $ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().".item_id");
        $ShopClass->products->model->SetJoinImage('icon', $ShopClass->products->model->GetTableItemNameSimple('icon'));
        if ($cat){
            $ShopClass->products->model->columns_where->getCatId()->setValue($cat['cat_id']);
        }
        $ShopClass->products->model->columns_where->getOffersTotal()->notValue(0);
        if ($svids_selected and count($svids_selected)>0){ /** Выбирает только отфильтрованные товары, ИНАЧЕ все в категории*/
            if (count($filtered_ids)<1){
                $filtered_ids[] = 0;
            }
            $ShopClass->products->model->columns_where->getId()->inValues($filtered_ids);
        }
        $total_products = $ShopClass->products->GetList();

    }

    /**Получение id всех фильтров у выбранных товаров*/
        /**Получение id-товаров*/
    $ShopClass->products->CreateModel();
    $ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().".item_id");
    if ($Main->GPC['cat_url']!='all') {
        $ShopClass->products->model->columns_where->getCatId()->setValue($cat['cat_id']);
    }
    $products_ids = $ShopClass->products->GetList();
        /**------*/
        /**Удаление лишнего*/
    foreach ($products_ids as $item){
        $products_ids[$item['item_id']]=$item['item_id'];
    }
        /**------*/
        /**Получение id-шников фильтров и удаление лишнего (в цикле)*/
    $ShopClass->products_filters->CreateModel();
    $ShopClass->products_filters->model->setSelectField($ShopClass->products_filters->model->getTableName().".sif_id, ".$ShopClass->products_filters->model->getTableName().".sif_svid");
    $ShopClass->products_filters->model->columns_where->getItemId()->inValues($products_ids);
    $ShopClass->products_filters->model->setGroupBy('sif_svid');
    $svids = $ShopClass->products_filters->GetList();

    foreach ($svids as $svid){
        $svids[$svid['sif_id']]=$svid['sif_svid'];
    }
        /**------*/
    /**------*/

    /**К объекту каждого товара добавляются его офферы*/
    $offers = array();


    foreach ($products as $product){
        $ShopClass->offers->CreateModel();
        $products[$product['item_id']]['cat_url']=$ShopClass->cats->GetUrlById($product['item_cat_id']);
        $ShopClass->offers->model->setSelectField($ShopClass->offers->model->getTableName().".offer_id, ".
                                                            $ShopClass->offers->model->getTableName().".offer_price, ".
                                                            $ShopClass->offers->model->getTableName().".offer_price_sale, ".
                                                            $ShopClass->offers->model->getTableName().".offer_key, ".
                                                            $ShopClass->offers->model->getTableName().".offer_diam, ".
                                                            $ShopClass->offers->model->getTableName().".offer_weight, ".
                                                            $ShopClass->offers->model->getTableName().".offer_icon, ".
                                                            $ShopClass->offers->model->getTableName().".offer_sort");
        $ShopClass->offers->model->columns_where->getItemId()->setValue($product['item_id']);
        $ShopClass->offers->model->SetJoinImage('icon','shop_offers.offer_icon');

            /**Фильтрует офферы по цене выведет те которые соответсвуют*/
        if ($price_from and !$price_to){
            $ShopClass->offers->model->columns_where->getPrice()->moreValue($price_from);
        }
        if ($price_to and !$price_from){
            $ShopClass->offers->model->columns_where->getPrice()->lessValue($price_to);
        }
        if ($price_to and $price_from){
            $ShopClass->offers->model->columns_where->getPrice()->rangeValue($price_from,$price_to);
        }
            /**------*/

        $ShopClass->offers->model->setOrderBy('offer_sort');

        $products[$product['item_id']]['offers'] = $ShopClass->offers->GetList();

        /**------*/

        /**Массив фотографий товара*/
        $image_data2 = array(
            'input_name'=>$photo_input2,
            'files'=>$Main->files->GetFileIdsItems('product_photos', $product['item_id']),
            'module'=>'shop',
            'show_select_image'=>true,
            'title'=>'Медиа товаров',
            'folder'=>'product_photos',
            'multiple'=>true,
            'sort_name'=>'product_photos'
        );
        $main_photo = array('item_icon_url' => $product['item_icon_url']);

            /**В начало массива добавляется главная фотография товара*/
        array_unshift($image_data2['files'],$main_photo );
        $products[$product['item_id']]['images'] = $image_data2;
        /**----------*/

    }

    foreach ($total_products as $product){
        $ShopClass->offers->CreateModel();
        $ShopClass->offers->model->setSelectField($ShopClass->offers->model->getTableName().".offer_id, ".
                                                  $ShopClass->offers->model->getTableName().".offer_price, ".
                                                  $ShopClass->offers->model->getTableName().".offer_price_sale");
        $ShopClass->offers->model->columns_where->getItemId()->setValue($product['item_id']);

        if ($price_from and !$price_to){
            $ShopClass->offers->model->columns_where->getPrice()->moreValue($price_from);
        }
        if ($price_to and !$price_from){
            $ShopClass->offers->model->columns_where->getPrice()->lessValue($price_to);
        }
        if ($price_to and $price_from){
            $ShopClass->offers->model->columns_where->getPrice()->rangeValue($price_from,$price_to);
        }

        $total_products[$product['item_id']]['offers'] = $ShopClass->offers->GetList();


    }

    foreach ($total_products as $k=>$product){
        if (!count($product['offers'])){
            unset($total_products[$k]);
        }
    }
    $Paging->total = count($total_products);
    foreach ($products as $k=>$product){
        if (!count($product['offers'])){
            unset($products[$k]);
        }
    }

    $Paging->data = $products;

    /**Категории для вывода в фильтрах*/
    $ShopClass->cats->CreateModel();
    $ShopClass->cats->model->setSelectField($ShopClass->cats->model->getTableName().".*");
    $ShopClass->cats->model->columns_where->getStatus()->setValue(1);
    if ($Main->GPC['cat_url']!='all') {
        $ShopClass->cats->model->columns_where->getId()->inValues($cat_ids_array);
    }
    $categories = $ShopClass->cats->GetList();


    /**Получение фильтров по массиву id-шников*/
    $sprav_filters=array();
	$sprav_filters_values=array();
	$all_cats=array();
	if ($cat or $Main->GPC['cat_url']) {
        if ($cat){
            $all_cats=$ShopClass->cats->GetParentAllCatsIds($cat['cat_id'],$Main->template->global_vars['menu_cats']);
            $sprav_filters=$ShopClass->cats_filters->GetSpravFiltersList($all_cats);
        }
        else{
            $sprav_filters=$ShopClass->cats_filters->GetSpravFiltersList($cat_ids_array);
        }
		$spravs=array();

		if ($sprav_filters) {
			foreach ($sprav_filters as $sp) {
				$spravs[$sp['sprav_id']]=$sp['sprav_id'];

                $sprav_filters[$sp['sprav_id']]['filters']=$Main->sprav->getSpravIdValues( $sp['sprav_id'], array(
                    'spravs'=>$spravs,
                    'group_array'=>'sprav_id',
                    'svids'=>$svids,
                    'order'=>'title',
                    'show_order'=>true
                ));

			}

		}
	}

    $ShopClass->parts->CreateModel();
	$ShopClass->parts->model->setSelectField($ShopClass->parts->model->getTableName().".part_id, ".$ShopClass->parts->model->getTableName().".part_title");
    $ShopClass->parts->model->columns_where->getStatus()->setValue(true);
    $ShopClass->parts->model->columns_where->getCatId()->setValue($cat['cat_id']);
    $ShopClass->parts->model->setOrderBy('part_sort');
    $parts=$ShopClass->parts->GetList();
}
else{
    $Main->error->PageNotFound();
}
if (!$cat and $Main->GPC['cat_url']!='all'){
    $Main->error->PageNotFound();
}



$breadcrumbs=array();
$breadcrumbs[]=array(
    'title'=>'Каталог',
    'link'=>BASE_URL.'/catalog/'
);
if ($Main->GPC['cat_url'] == 'all'){
    $page_title = "Все товары";
}
else{
    $page_title = $cat['cat_title'];
}
$Main->template->SetPageAttributes(
    array(
        'title'=>$page_title,
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>$breadcrumbs,
        'title'=>$page_title,
        'page_class'=>'page-catalog'
    )
);

$page_title = $cat['cat_title'];
$Paging->Display('shop/catalog/products_table.twig',array(
    'cat'=>$cat,
    'status'=>true,
    'categories'=>$categories,
    'filters'=>$sprav_filters,
    'filters_html'=>$Main->template->Render('frontend/components/catalog-filters/catalog-filters-data.twig',
                                            array('filters' => $sprav_filters,
                                                  'svids_selected'=>$svids_selected,
                                                  'categories'=>$categories,
                                                  'max_price'=>$max_price,
                                                  'price_from'=>$Main->GPC['price_range_from'],
                                                  'price_to'=>$Main->GPC['price_range_to'],
                                                  'cat'=>$cat)),
    'svids_selected'=>$svids_selected,
    'filters_values'=>$sprav_filters_values,
    'last_viewed'=>$ShopClass->products->getLastViews(),
    'parts'=>$parts,
    'page_title'=>$page_title,
));