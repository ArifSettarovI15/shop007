<?php
$Main->user->PagePrivacy('admin');
$cat_info=$ShopClass->cats->GetItemById($Main->GPC['cat_id']);
if ($cat_info==false) {
	$Main->error->PageNotFound();
}

$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'part_id' => TYPE_UINT
	));
}
if ($Main->GPC['action']=='delete_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));

	$ShopClass->products->DeleteParts2Item ($Main->GPC['part_id'], $Main->GPC['item_id']);
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}

if ($Main->GPC['action']=='add_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));
	if ($ShopClass->products->CheckParts2Item($Main->GPC['part_id'], $Main->GPC['item_id'])==false) {
		$ShopClass->products->AddParts2Item($Main->GPC['part_id'], $Main->GPC['item_id']);
	}
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}

if ($Main->GPC['action']=='add_filter_value' ) {
	$Main->input->clean_array_gpc('r', array(
		'value' => TYPE_UINT,
		'sprav_id'=>TYPE_UINT,
		'text_value'=>TYPE_STR,
		'key'=>TYPE_STR,
		'title'=>TYPE_STR
	));
	$array['status']=false;
	$array['text']='Ошибка';
	if ($Main->GPC['title']) {
		$Main->GPC['text_value']=$Main->GPC['title'];
	}
	if ($Main->GPC['sprav_id'] or $Main->GPC['key']) {

		$ShopClass->item_parts->CreateModel();
		$ShopClass->item_parts->model->columns_where->getItemId()->setValue($Main->GPC['part_id']);
		$ShopClass->item_parts->model->columns_where->getSpravId()->setValue($Main->GPC['sprav_id']);
		$ShopClass->item_parts->model->columns_where->getSvid()->setValue($Main->GPC['value']);
		$ShopClass->item_parts->model->columns_where->getKey()->setValue($Main->GPC['key']);
		$value_data=$ShopClass->item_parts->GetItem();

		$ShopClass->item_parts->CreateModel();
		$ShopClass->item_parts->model->columns_update->getItemId()->setValue($Main->GPC['part_id']);
		$ShopClass->item_parts->model->columns_update->getSvid()->setValue($Main->GPC['value']);
		$ShopClass->item_parts->model->columns_update->getSpravId()->setValue($Main->GPC['sprav_id']);
		$ShopClass->item_parts->model->columns_update->getValue()->setValue($Main->GPC['text_value']);
		$ShopClass->item_parts->model->columns_update->getKey()->setValue($Main->GPC['key']);

		if ($value_data ){
			$ShopClass->item_parts->model->columns_where->getId()->setValue($value_data['sif_id']);
			$ShopClass->item_parts->Update();
		}
		else {
			$ShopClass->item_parts->Insert();
		}


		if ($Main->GPC['sprav_id']) {
			$list=$ShopClass->item_parts->GetValuesList($Main->GPC['part_id'],1);
			$list=$list[$Main->GPC['sprav_id']];
		}
		else {
			$list=$ShopClass->item_parts->GetValuesList2($Main->GPC['part_id']);
			$list=$list[$Main->GPC['key']];
		}

		$array['status']=true;
		$array['text']='Обновлено';
		$array['html']=$Main->template->Render('backend/components/filter_values_list/filter_values_list.twig',
			array(
				'list'=>$list
			));
	}


	$Main->template->DisplayJson($array);
	exit;
}
if ($Main->GPC['action']=='del_filter_value' ) {
	$Main->input->clean_array_gpc('r', array(
		'sprav_id' => TYPE_UINT,
		'value'=>TYPE_UINT,
		'key'=>TYPE_STR
	));
	$array['status']=false;
	$array['text']='Ошибка';
	if ($Main->GPC['sprav_id'] or $Main->GPC['key']) {
		$ShopClass->item_parts->CreateModel();
		$ShopClass->item_parts->model->columns_where->getId()->setValue($Main->GPC['value']);
		$ShopClass->item_parts->Delete();


		if ($Main->GPC['sprav_id']) {
			$list=$ShopClass->item_parts->GetValuesList($Main->GPC['part_id'],1);
			$list=$list[$Main->GPC['sprav_id']];
		}
		else {
			$list=$ShopClass->item_parts->GetValuesList2($Main->GPC['part_id']);
			$list=$list[$Main->GPC['key']];
		}


		$array['status']=true;
		$array['text']='Обновлено';
		$array['html']=$Main->template->Render('backend/components/filter_values_list/filter_values_list.twig',
			array(
				'list'=>$list
			));
	}

	$Main->template->DisplayJson($array);
	exit;
}
if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;

	$data_info=$ShopClass->parts->GetItemById($Main->GPC['part_id'],1);
	$cat_info=$ShopClass->cats->GetItemById($data_info['part_cat_id']);
	if ($data_info==false) {
		$Main->error->PageNotFound();
	}
	if ($data_info) {

	}
	else {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
	$Main->input->clean_array_gpc('r', array(
		'part_id' => TYPE_UINT,
		'cat_parent_id' => TYPE_UINT,
		'part_title' => TYPE_STR,
		'part_short_title' => TYPE_STR,
		'part_url' => TYPE_STR,
		'text'=>TYPE_STR,
		'meta_title'=>TYPE_STR,
		'meta_keywords'=>TYPE_STR,
		'meta_desc'=>TYPE_STR,
		'part_sale' => TYPE_UINT,
		'part_sale_min' => TYPE_STR,
		'part_sale_max' => TYPE_STR
	));

	$error='';
	$array=array();

	if ($Main->GPC['part_title']=='') {
		$error='Введите название';
		$array['error_field']='part_title';
	}
	elseif ($Main->GPC['part_url']=='') {
		$error='Введите url';
		$array['error_field']='part_url';
	}
	elseif ($Main->GPC['cat_parent_id']==0) {
		$error='Выберите категорию';
		$array['error_field']='cat_parent_id';
	}
	else{
		$ShopClass->parts->CreateModel();
		$ShopClass->parts->model->columns_where->getUrl()->setValue($Main->GPC['part_url']);
		$ShopClass->parts->model->columns_where->getCatId()->setValue($Main->GPC['cat_parent_id']);
		$ShopClass->parts->model->columns_where->getId()->notValue($Main->GPC['part_id']);
		$ShopClass->parts->model->deleteOrderBy();
		$info = $ShopClass->parts->GetItem();


		if ($Main->GPC['part_sale_min']) {
			$Main->GPC['part_sale_min']=strtotime($Main->GPC['part_sale_min'].' 00:00:00');
		}
		if ($Main->GPC['part_sale_max']) {
			$Main->GPC['part_sale_max']=strtotime($Main->GPC['part_sale_max'].' 23:59:59');
		}
		if ($info) {
			$error = 'Такой url уже существует';
			$array['error_field'] = 'part_url';
		}
		else {
			$text_id=$Main->text->SaveText($data_info['part_text_id'], $Main->GPC['text']);

			$ShopClass->parts->CreateModel();
			$ShopClass->parts->model->columns_update->getTitle()->setValue($Main->GPC['part_title']);
			$ShopClass->parts->model->columns_update->getShortTitle()->setValue($Main->GPC['part_short_title']);
			$ShopClass->parts->model->columns_update->getUrl()->setValue($Main->GPC['part_url']);
			$ShopClass->parts->model->columns_update->getTextId()->setValue($text_id);
			$ShopClass->parts->model->columns_update->getCatId()->setValue($Main->GPC['cat_parent_id']);
			$ShopClass->parts->model->columns_update->getMetaTitle()->setValue($Main->GPC['meta_title']);
			$ShopClass->parts->model->columns_update->getMetaKeywords()->setValue($Main->GPC['meta_keywords']);
			$ShopClass->parts->model->columns_update->getMetaDesc()->setValue($Main->GPC['meta_desc']);

			if ($Main->GPC['action'] == 'process_edit') {
				$id=$Main->GPC['part_id'];
				$ShopClass->parts->model->columns_where->getId()->setValue($Main->GPC['part_id']);
				$result=$ShopClass->parts->Update();

				if ($result ) {
					$array['status'] = true;
					$array['text'] = 'Значение успешно обновлено';
				} else {
					$array['text'] = 'Ошибка обновления';
				}

			} else {
				$ShopClass->parts->model->columns_update->getStatus()->setValue(0);
				$id=$ShopClass->parts->Insert();
				$array['text'] = 'Значение успешно добавлено';
				$array['status'] = true;
			}
		}
	}


	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}
	else {
		$array['status']=true;
		$array['redirect']=BASE_URL.'/manager/shop/parts/edit/'.$id.'/';
	}
	$Main->template->DisplayJson($array);
}

if ($edit==1) {
	$a_name='Редактировать';
}
else {
	$a_name='Добавить';
}

$page_name=$a_name.' выборку';
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
				'title'=>$cat_info['cat_title']
			),
			array(
				'title'=>'Выборки',
				'link'=>BASE_URL.'/manager/shop/parts/'
			),
			array(
				'title'=>$a_name
			),
		),
		'title'=>$page_name
	)
);

if ($data_info) {
	$ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getStatus()->setValue(true);
	$ShopClass->cats->model->setOrderByWithColumn('title');
	$ShopClass->cats->model->setOrderWay('ASC');
	$cats=$ShopClass->cats->GetList();
	$CatsMenu=$ShopClass->cats->MakeTree(0,$cats);

	$all_cats=$ShopClass->cats->GetParentAllCatsIds($data_info['part_cat_id'],$CatsMenu);
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

	$item_filter_values=$ShopClass->item_parts->GetValuesList($data_info['part_id']);
	$item_filter_values2=$ShopClass->item_parts->GetValuesList2($data_info['part_id']);
}

$ShopClass->cats->CreateModel();
$ShopClass->cats->model->setOrderByWithColumn('title');
$ShopClass->cats->model->setOrderWay('ASC');
$cats=$ShopClass->cats->GetList();
$CatsMenu=$ShopClass->cats->MakeTree(0,$cats);

$cats_select= $ShopClass->cats->GetCatsNestedSelect($data_info['part_cat_id'],$CatsMenu,'');

$ShopClass->vendors->CreateModel();
$ShopClass->vendors->model->columns_where->getStatus()->setValue(true);
$ShopClass->vendors->model->setSelectField($ShopClass->vendors->model->getTableName().'.*');
$ShopClass->vendors->model->setOrderByWithColumn($ShopClass->vendors->model->columns_where->getTitle()->getName());
$brands=$ShopClass->vendors->GetList();

$vendors=array();
if (isset($item_filter_values2['brands'])) {
	foreach ($item_filter_values2['brands'] as $b) {
		$vendors[]=$b['sif_svid'];
	}
}



$also_items=array();
if ($data_info) {
	$also_items=$ShopClass->products->GetParts2Items($data_info['part_id']);
}

$Main->template->Display(array(
		'info'=>$data_info,
		'cat_info'=>$cat_info,
		'edit'=>$edit,
		'vendor_id'=>$vendor_info['vendor_id'],
		'sprav_filters'=>$sprav_filters,
		'filter_values'=>$filter_values,
		'item_filter_values'=>$item_filter_values,
		'item_filter_values2'=>$item_filter_values2,
		'cats_select'=>$cats_select,
		'brands'=>$brands,
		'also_items'=>$also_items
	)
);
