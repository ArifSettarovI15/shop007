<?php
$Main->user->PagePrivacy('admin');
if ($Main->GPC['action']=='update_badge_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL,
		'type_id'=>TYPE_STR
	));

	$status=false;

	$info=$ShopClass->products->GetItemById($Main->GPC['object_id']);

	$ShopClass->products->CreateModel();

	$ShopClass->products->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$info['icons'][$Main->GPC['type_id']]=$Main->GPC['value'];
	$info['icons']=serialize($info['icons']);
	$ShopClass->products->model->columns_update->getIconsDop()->setValue($info['icons']);
	$status=$ShopClass->products->Update();

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Товар обновлен';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}

$photo_input='product_icon';
$photo_input2='product_photos';

$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'id' => TYPE_UINT
	));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;
	$ShopClass->products->CreateModel();
	$ShopClass->products->model->SetJoinVendors();
	$ShopClass->products->model->setSelectField(' `shop_categories`.*');
	$ShopClass->products->model->setJoin(' LEFT JOIN `shop_categories` ON '.$ShopClass->products->model->GetTableItemName('cat_id').'=`shop_categories`.`cat_id`');
	$ShopClass->products->model->JoinImages();
	$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
	$ShopClass->products->model->columns_where->getId()->setValue($Main->GPC['id']);
	$data_info=$ShopClass->products->GetItem(1);

	if ($data_info) {

	}
	else {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['action']=='items_sort') {
	$Main->input->clean_array_gpc('r', array(
		'data_sort' => TYPE_ARRAY_UINT
	));
//	$ShopClass->products->UpdateAlsoItemsSort($Main->GPC['id'],$Main->GPC['data_sort']);

	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}
if ($Main->GPC['action']=='delete_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));

	$ShopClass->products->DeleteAlsoItem ($Main->GPC['id'], $Main->GPC['item_id']);
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}

if ($Main->GPC['action']=='add_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));
	if ($ShopClass->products->CheckAlsoItem($Main->GPC['id'], $Main->GPC['item_id'])==false) {
		$ShopClass->products->AddAlsoItem($Main->GPC['id'], $Main->GPC['item_id']);
	}
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}
if ($Main->GPC['action']=='add_filter_value' ) {
	$Main->input->clean_array_gpc('r', array(
		'value' => TYPE_UINT,
		'sprav_id'=>TYPE_STR,
		'text_value'=>TYPE_STR
	));
	$array['status']=false;
	$array['text']='Ошибка';

	if ($Main->GPC['sprav_id'] and $Main->GPC['sprav_id']!='decor') {

		$ShopClass->products_filters->CreateModel();
		$ShopClass->products_filters->model->columns_where->getItemId()->setValue($Main->GPC['id']);
		$ShopClass->products_filters->model->columns_where->getSpravId()->setValue($Main->GPC['sprav_id']);
		$ShopClass->products_filters->model->columns_where->getSvid()->setValue($Main->GPC['value']);
		$value_data=$ShopClass->products_filters->GetItem();

		$ShopClass->products_filters->CreateModel();
		$ShopClass->products_filters->model->columns_update->getItemId()->setValue($Main->GPC['id']);
		$ShopClass->products_filters->model->columns_update->getSvid()->setValue($Main->GPC['value']);
		$ShopClass->products_filters->model->columns_update->getSpravId()->setValue($Main->GPC['sprav_id']);
		$ShopClass->products_filters->model->columns_update->getValue()->setValue($Main->GPC['text_value']);

		if ($value_data ){
			$ShopClass->products_filters->model->columns_where->getId()->setValue($value_data['sif_id']);
			$ShopClass->products_filters->Update();
		}
		else {
			$ShopClass->products_filters->Insert();
		}



		$list=$ShopClass->products_filters->GetValuesList($Main->GPC['id'],1);
		$list=$list[$Main->GPC['sprav_id']];

		$array['status']=true;
		$array['text']='Обновлено';
		$array['html']=$Main->template->Render('backend/components/filter_values_list/filter_values_list.twig',
			array(
				'list'=>$list
			));
	}
	elseif ($Main->GPC['sprav_id'] and $Main->GPC['sprav_id']=='decor'){

        $ShopClass->item_decor->AddDecor($Main->GPC['id'], $Main->GPC['value']);

        $list=$ShopClass->item_decor->GetDecorList($Main->GPC['id']);
        $array['html']=$Main->template->Render('backend/components/filter_values_list/decorations_list.twig',
                                               array(
                                                   'list'=>$list
                                               ));

        $array['status']=true;
        $array['text']='Обновлено';

    }


	$Main->template->DisplayJson($array);
	exit;
}
if ($Main->GPC['action']=='del_filter_value' ) {
	$Main->input->clean_array_gpc('r', array(
		'sprav_id' => TYPE_STR,
		'value'=>TYPE_UINT
	));
	$array['status']=false;
	$array['text']='Ошибка';
	if ($Main->GPC['sprav_id'] and $Main->GPC['sprav_id']!='decor') {
		$ShopClass->products_filters->CreateModel();
		$ShopClass->products_filters->model->columns_where->getId()->setValue($Main->GPC['value']);
		$ShopClass->products_filters->Delete();

		$list=$ShopClass->products_filters->GetValuesList($Main->GPC['id'],1);
		$list=$list[$Main->GPC['sprav_id']];

		$array['status']=true;
		$array['text']='Обновлено';
		$array['html']=$Main->template->Render('backend/components/filter_values_list/filter_values_list.twig',
			array(
				'list'=>$list
			));
	}
	elseif ($Main->GPC['sprav_id'] and $Main->GPC['sprav_id']=='decor'){
        $ShopClass->item_decor->CreateModel();
        $ShopClass->item_decor->model->columns_where->getId()->setValue($Main->GPC['value']);
        $ShopClass->item_decor->Delete();
        $list=$ShopClass->item_decor->GetDecorList($Main->GPC['id']);
        $array['html']=$Main->template->Render('backend/components/filter_values_list/decorations_list.twig',
                                               array(
                                                   'list'=>$list
                                               ));

        $array['status']=true;
        $array['text']='Обновлено';
    }

	$Main->template->DisplayJson($array);
	exit;
}
if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT,
		'brand_id'=>TYPE_UINT,
		'cat_parent_id'=>TYPE_UINT,
		'item_url'=>TYPE_STR,
		'collection_id'=>TYPE_UINT,
		'item_title' => TYPE_STR,
		'item_short_title' => TYPE_STR,
		'item_short_text'=>TYPE_STR,
		'text'=>TYPE_STR,
		'composition'=>TYPE_STR,
		'video'=>TYPE_STR,
		'item_price_step'=>TYPE_UNUM,
		'item_weight'=>TYPE_UNUM,
		'item_length'=>TYPE_UNUM,
		'item_width'=>TYPE_UNUM,
		'item_height'=>TYPE_UNUM,
		'meta_title'=>TYPE_STR,
		'meta_keywords'=>TYPE_STR,
		'meta_desc'=>TYPE_STR,
		'item_amount'=>TYPE_UINT,
		'item_price_val'=>TYPE_UINT,
		'item_price_val_name'=>TYPE_STR,
		'item_price_per'=>TYPE_STR,
		'item_price_before'=>TYPE_UINT,
		'item_setup_price'=>TYPE_STR,
		'item_is_model'=>TYPE_BOOL,
		'item_sale_percent'=>TYPE_UNUM,
		$photo_input => TYPE_UINT,
		$photo_input2 => TYPE_ARRAY_UINT
	));

    if($Main->GPC['item_title']==''){
        $Main->template->DisplayJson(['status'=>false, 'text'=>"Введите название товара!"]);
    }
    if($Main->GPC['item_url']==''){
        $Main->template->DisplayJson(['status'=>false, 'text'=>"Введите url товара!"]);
    }
    if($Main->GPC['cat_parent_id']==0){
        $Main->template->DisplayJson(['status'=>false, 'text'=>"Выберите категорию товара!"]);
    }
	$photo_id=intval($Main->GPC[$photo_input]);
	$photos=$Main->GPC[$photo_input2];

	$error='';
	$array=array();

	$check_article=false;


	$check_url=false;
	if ($Main->GPC['item_url']) {
		$ShopClass->products->CreateModel();
		$ShopClass->products->model->columns_where->getUrl()->setValue($Main->GPC['item_url']);
		$ShopClass->products->model->columns_where->getId()->notValue($Main->GPC['item_id']);
		$check_url=$ShopClass->products->GetItem();
	}


	if ($Main->GPC['item_title']=='' and $Main->GPC['item_short_title']=='') {
		$error='Введите название или краткое название';
		$array['error_field']='item_title,item_short_title';
	}
	elseif ($check_url) {
		$error='Товар с таким utl уже существует';
		$array['error_field']='item_url';
	}
	else{
		$text_id=$Main->text->SaveText($data_info['item_text_id'], $Main->GPC['text']);
		$composition_id=$Main->text->SaveText($data_info['item_composition_id'], $Main->GPC['composition']);
		$video_id=$Main->text->SaveText($data_info['item_video_id'], $Main->GPC['video']);

		$rub_price=$Main->GPC['item_price_val'];
		if ($Main->GPC['item_price_val_name']!='rub') {
			$cur=$ShopClass->getCurValue($Main->GPC['item_price_val_name']);
			if ($cur) {
				$rub_price = ceil( $Main->GPC['item_price_val'] * $cur / 50 ) * 50;
			}
		}

		$ShopClass->products->CreateModel();
		$ShopClass->products->model->columns_update->getTitle()->setValue($Main->GPC['item_title']);
		$ShopClass->products->model->columns_update->getShortTitle()->setValue($Main->GPC['item_short_title']);
		$ShopClass->products->model->columns_update->getShortText()->setValue($Main->GPC['item_short_text']);
		$ShopClass->products->model->columns_update->getTextId()->setValue($text_id);
		$ShopClass->products->model->columns_update->getCompositionId()->setValue($composition_id);
		$ShopClass->products->model->columns_update->getVideoId()->setValue($video_id);
		$ShopClass->products->model->columns_update->getPhotoId()->setValue($photo_id);
		$ShopClass->products->model->columns_update->getMetaTitle()->setValue($Main->GPC['meta_title']);
		$ShopClass->products->model->columns_update->getMetaKeywords()->setValue($Main->GPC['meta_keywords']);
		$ShopClass->products->model->columns_update->getMetaDesc()->setValue($Main->GPC['meta_desc']);
		$ShopClass->products->model->columns_update->getisModel()->setValue($Main->GPC['item_is_model']);
		$ShopClass->products->model->columns_update->getVendorId()->setValue($Main->GPC['brand_id']);
		$ShopClass->products->model->columns_update->getCatId()->setValue($Main->GPC['cat_parent_id']);
		$ShopClass->products->model->columns_update->getUrl()->setValue($Main->GPC['item_url']);
		$ShopClass->products->model->columns_update->getSalePercent()->setValue($Main->GPC['item_sale_percent']);

		if ($Main->GPC['action'] == 'process_edit') {
			$id=$Main->GPC['item_id'];

			$ShopClass->products->model->columns_where->getId()->setValue($Main->GPC['item_id']);
			$result=$ShopClass->products->Update();

			if ($result ) {
				$array['status'] = true;
				$array['text'] = 'Значение успешно обновлено';
			} else {
				$array['text'] = 'Ошибка обновления';
			}

		} else {
			$id=$ShopClass->products->Insert();
			$array['text'] = 'Значение успешно добавлено';
			$array['status'] = true;
			$array['redirect'] = '/manager/shop/products/edit/'.$id.'/';
		}
		$ShopClass->products->AddProductPhotos($id,$photos);
		$ShopClass->setDopPhotos($id);
	}


	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}
	else {
		$array['status']=true;
	}
	$Main->template->DisplayJson($array);
}

if ($edit==1) {
	$a_name='Редактировать';
}
else {
	$a_name='Добавить';
}

$page_name=$a_name.' товар';
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
				'title'=>'Товары',
				'link'=>BASE_URL.'/manager/shop/products/'
			),
			array(
				'title'=>$a_name
			),
		),
		'title'=>$page_name
	)
);

$image_data1=array(
	'input_name'=>$photo_input,
	'files'=>array(
		array(
			'file_id'=>$data_info['item_icon'],
			'icon_url'=>$data_info['item_icon_url']
		)
	),
	'module'=>'shop',
	'show_select_image'=>true,
	'title'=>'Фото товаров',
	'folder'=>'products'
);
$image_data2=array(
	'input_name'=>$photo_input2,
	'files'=>$Main->files->GetFileIdsItems('product_photos', $data_info['item_id']),
	'module'=>'shop',
	// 'show_select_image'=>true,
	'title'=>'Медиа товаров',
	'folder'=>'product_photos',
	'multiple'=>true,
	'sort_name'=>'product_photos'
);


$ShopClass->cats->CreateModel();
$ShopClass->cats->model->columns_where->getStatus()->setValue(true);
$ShopClass->cats->model->setOrderByWithColumn('title');
$ShopClass->cats->model->setOrderWay('ASC');
$cats=$ShopClass->cats->GetList();
$CatsMenu=$ShopClass->cats->MakeTree(0,$cats);

$item_filter_values=array();
$filter_values=array();
$all_cats=array();
$sprav_filters=array();
$sprav_ids=array();
$parent_cats=array();
$top_cat=false;
if ($data_info) {
	$all_cats=$ShopClass->cats->GetParentAllCatsIds($data_info['item_cat_id'],$CatsMenu);
	$sprav_filters=$ShopClass->cats_filters->GetSpravOptionsList($all_cats, true);

	$sprav_ids=array();
	foreach ($sprav_filters as $sprav) {
		$sprav_ids[]=$sprav['sprav_id'];
	}


	$filter_values=$Main->sprav->GetSpravValues(array(
		'svid_status'=>1,
		'spravs'=>$sprav_ids,
		'group_array'=>'sprav_id',
		'hide_join'=>true
	));

	$item_filter_values=$ShopClass->products_filters->GetValuesList($data_info['item_id']);
	$parent_cats=$ShopClass->cats->GetParentCats($CatsMenu,$data_info['item_cat_id']);
	$parent_cats=array_reverse($parent_cats);
	foreach ($parent_cats as $cat){
		if ($top_cat==false) {
			$top_cat=$cat['cat_id'];
		}
	}
}


$ShopClass->vendors->CreateModel();
$ShopClass->vendors->model->columns_where->getStatus()->setValue(true);
$ShopClass->vendors->model->setSelectField($ShopClass->vendors->model->getTableName().'.*');
$ShopClass->vendors->model->setOrderByWithColumn($ShopClass->vendors->model->columns_where->getTitle()->getName());
$brands=$ShopClass->vendors->GetList();


$cats_select= $ShopClass->cats->GetCatsNestedSelect($data_info['cat_id'], $CatsMenu);
if ($data_info['cat_id']>0) {
	$cats_select.=$ShopClass->cats->MakeSelect($CatsMenu, 0, $data_info['cat_id']);
}
$also_items=array();
if ($data_info['item_id']) {
	$also_items=$ShopClass->products->GetAlsoItems($data_info['item_id']);
}


$Main->template->Display(array(
		'info'=>$data_info,
		'edit'=>$edit,
		'image_data1'=>$image_data1,
		'image_data2'=>$image_data2,
		'brands'=>$brands,
		'decorations'=>$ShopClass->offers->getDecorations(),
		'decorations_list'=>$ShopClass->item_decor->GetDecorList($Main->GPC['id']),
		'sprav_filters'=>$sprav_filters,
		'filter_values'=>$filter_values,
		'item_filter_values'=>$item_filter_values,
		'parent_cats'=>$parent_cats,
		'cats_select'=>$cats_select,
		'also_items'=>$also_items
	)
);
