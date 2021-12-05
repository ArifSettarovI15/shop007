<?php
$Main->user->PagePrivacy('admin');

$photo_input='city_icon';
$data_info=array();
$edit=0;



if ($Main->GPC['action']=='items_sort') {
	$Main->input->clean_array_gpc('r', array(
		'data_sort' => TYPE_ARRAY_UINT
	));
	$ShopClass->products->UpdateCityItemsSort($Main->GPC['id'],$Main->GPC['data_sort']);

	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}
if ($Main->GPC['action']=='delete_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));

	$ShopClass->products->DeleteCityItem ($Main->GPC['item_id'], $Main->GPC['id']);
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}

if ($Main->GPC['action']=='add_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));
	if ($ShopClass->products->CheckCityItem($Main->GPC['item_id'], $Main->GPC['id'])==false) {
		$ShopClass->products->AddCityItem($Main->GPC['item_id'], $Main->GPC['id']);
	}
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}

if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'id' => TYPE_UINT
	));
}


if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;
	$data_info=$ShopClass->delivery_cities->GetItemById($Main->GPC['id'],1);
	if ($data_info) {

	}
	else {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
	$Main->input->clean_array_gpc('r', array(
		'city_id' => TYPE_UINT,
		'city_status' => TYPE_BOOL,
		'city_title' => TYPE_STR,
		'city_url' => TYPE_STR,
		'city_related'=>TYPE_UINT,
		'cat_parent_id'=>TYPE_UINT,
		'city_price' => TYPE_UINT,
		'short_text'=>TYPE_STR,
		'text'=>TYPE_STR,
		'meta_title'=>TYPE_STR,
		'meta_title2'=>TYPE_STR,
		'meta_keywords'=>TYPE_STR,
		'meta_desc'=>TYPE_STR,
		'city_group_id' => TYPE_UINT,
		$photo_input => TYPE_UINT
	));
	$photo_id=intval($Main->GPC[$photo_input]);
	$error='';
	$array=array();

	if ($Main->GPC['city_title']=='') {
		$error='Введите название';
		$array['error_field']='city_title';
	}
	elseif ($Main->GPC['city_url']=='') {
		$error='Введите url';
		$array['error_field']='city_url';
	}
	else{

		$ShopClass->delivery_cities->CreateModel();
		$ShopClass->delivery_cities->model->columns_where->getTitle()->setValue($Main->GPC['city_title']);
		$ShopClass->delivery_cities->model->columns_where->getId()->notValue($Main->GPC['city_id']);
		$info = $ShopClass->delivery_cities->GetItem();
		if ($info) {
			$error = 'Такой город уже существует';
			$array['error_field'] = 'city_title';
		} else {
			$ShopClass->delivery_cities->CreateModel();
			$ShopClass->delivery_cities->model->columns_where->getUrl()->setValue($Main->GPC['city_url']);
			$ShopClass->delivery_cities->model->columns_where->getId()->notValue($Main->GPC['city_id']);
			$info = $ShopClass->delivery_cities->GetItem();
			if ($info) {
				$error = 'Такой город уже существует';
				$array['error_field'] = 'city_url';
			}
			else {
				$text_id=$Main->text->SaveText($data_info['city_text_id'], $Main->GPC['text']);

				$ShopClass->delivery_cities->CreateModel();
				$ShopClass->delivery_cities->model->columns_update->getTitle()->setValue($Main->GPC['city_title']);
				$ShopClass->delivery_cities->model->columns_update->getUrl()->setValue($Main->GPC['city_url']);
				$ShopClass->delivery_cities->model->columns_update->getRelated()->setValue($Main->GPC['city_related']);
				$ShopClass->delivery_cities->model->columns_update->getCat()->setValue($Main->GPC['cat_parent_id']);
				$ShopClass->delivery_cities->model->columns_update->getPhotoId()->setValue($photo_id);
				$ShopClass->delivery_cities->model->columns_update->getTextId()->setValue($text_id);
				$ShopClass->delivery_cities->model->columns_update->getPrice()->setValue($Main->GPC['city_price']);
				$ShopClass->delivery_cities->model->columns_update->getMetaTitle()->setValue($Main->GPC['meta_title']);
				$ShopClass->delivery_cities->model->columns_update->getMetaTitle2()->setValue($Main->GPC['meta_title2']);
				$ShopClass->delivery_cities->model->columns_update->getMetaKeywords()->setValue($Main->GPC['meta_keywords']);
				$ShopClass->delivery_cities->model->columns_update->getMetaDesc()->setValue($Main->GPC['meta_desc']);
				$ShopClass->delivery_cities->model->columns_update->getCityGroupId()->setValue($Main->GPC['city_group_id']);

				if ($Main->GPC['action'] == 'process_edit') {
					$id=$Main->GPC['city_id'];

					$ShopClass->delivery_cities->model->columns_where->getId()->setValue($Main->GPC['city_id']);
					$result=$ShopClass->delivery_cities->Update();

					if ($result ) {
						$array['status'] = true;
						$array['text'] = 'Значение успешно обновлено';
					} else {
						$array['text'] = 'Ошибка обновления';
					}

				} else {
					$id=$ShopClass->delivery_cities->Insert();
					$array['text'] = 'Значение успешно добавлено';
					$array['status'] = true;
				}
			}

		}
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

$page_name=$a_name.' город';
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
				'title'=>'Города',
				'link'=>BASE_URL.'/manager/shop/delivery/cities/'
			),
			array(
				'title'=>$a_name
			),
		),
		'title'=>$page_name
	)
);

$city_items=array();
if ($data_info['city_id']) {
	$ShopClass->products->CreateModel();
	$ShopClass->products->model->columns_where->getStatus()->setValue(true);
	$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
	$ShopClass->products->model->SetJoinImage('icon',$ShopClass->products->model->GetTableItemName('icon'));
	$ShopClass->products->model->SetJoinCities();
	$ShopClass->products->model->setOrderBy('`sort`');
	$ShopClass->products->model->addWhereCustom(
		$ShopClass->products->SqlWherePrepare('simple','shop_items_cities.city_id',$data_info['city_id'])
	);
	$city_items=$ShopClass->products->GetList();
}

$ShopClass->cats->CreateModel();
$ShopClass->cats->model->columns_where->getStatus()->setValue(true);
$ShopClass->cats->model->setOrderByWithColumn('title');
$ShopClass->cats->model->setOrderWay('ASC');
$cats=$ShopClass->cats->GetList();
$CatsMenu=$ShopClass->cats->MakeTree(0,$cats);
$cats_select= $ShopClass->cats->GetCatsNestedSelect($data_info['city_cat'], $CatsMenu);


$ShopClass->delivery_cities->CreateModel();
$ShopClass->delivery_cities->model->columns_where->getCat()->setValue(0);
$ShopClass->delivery_cities->model->setOrderBy('city_title');
$cities=$ShopClass->delivery_cities->GetList();

$image_data1=array(
	'input_name'=>$photo_input,
	'files'=>array(
		array(
			'file_id'=>$data_info['city_icon'],
			'icon_url'=>$data_info['city_icon_url']
		)
	),
	'module'=>'shop',
	'show_select_image'=>true,
	'title'=>'Фото городов',
	'folder'=>'delivery'
);

$Main->template->Display(array(
		'info'=>$data_info,
		'cats_select'=>$cats_select,
		'edit'=>$edit,
		'image_data1'=>$image_data1,
		'city_items'=>$city_items,
		'cities'=>$cities,
		'groups'=>$ShopClass->days->getGroups()
	)
);
