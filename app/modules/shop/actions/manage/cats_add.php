<?php
$Main->user->PagePrivacy('admin');

$photo_input='cat_icon';
$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
    $Main->input->clean_array_gpc('r', array(
        'id' => TYPE_UINT
    ));
}



if ($Main->GPC['action']=='sort' ) {
	$Main->input->clean_array_gpc('r', array(
		'cat_id' => TYPE_UINT,
		'data_sort'=>TYPE_ARRAY
	));

	$ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getStatus()->setValue(true);
	$ShopClass->cats->model->setOrderByWithColumn('title');
	$ShopClass->cats->model->setOrderWay('ASC');
	$cats=$ShopClass->cats->GetList();
	$CatsMenu=$ShopClass->cats->MakeTree(0,$cats);

	$parent_cats_ids=$ShopClass->cats->GetParentCatsIds($CatsMenu,$Main->GPC['cat_id']);
	$parent_cat_filters=$ShopClass->cats_filters->GetCatAllList($parent_cats_ids);

	$pos=count($parent_cat_filters)+1;

	foreach ($Main->GPC['data_sort'] as $sprav_id) {
		$sprav_id=intval($sprav_id);
		$ShopClass->cats_filters->CreateModel();
		$ShopClass->cats_filters->model->columns_update->getCategoryId()->setValue($Main->GPC['cat_id']);
		$ShopClass->cats_filters->model->columns_update->getSpravId()->setValue($sprav_id);
		$ShopClass->cats_filters->model->columns_update->getSort()->setValue($pos);

		$ShopClass->cats_filters->model->columns_where->getCategoryId()->setValue($Main->GPC['cat_id']);
		$ShopClass->cats_filters->model->columns_where->getSpravId()->setValue($sprav_id);
		$ShopClass->cats_filters->Update();

		$pos++;
	}

	$array['status']=true;
	$array['text']='Обновлено';
	$Main->template->DisplayJson($array);
	exit;
}

if ($Main->GPC['action']=='add_filter' ) {
	$Main->input->clean_array_gpc('r', array(
		'value' => TYPE_UINT
	));

	if ($Main->GPC['id'] and $Main->GPC['value']) {
		$ShopClass->cats_filters->CreateModel();
		$ShopClass->cats_filters->model->columns_where->getCategoryId()->setValue($Main->GPC['id']);
		$ShopClass->cats_filters->model->columns_where->getSpravId()->setValue($Main->GPC['value']);
		$ShopClass->cats_filters->Delete();
	}


	$ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getStatus()->setValue(true);
	$ShopClass->cats->model->setOrderByWithColumn('title');
	$ShopClass->cats->model->setOrderWay('ASC');
	$cats=$ShopClass->cats->GetList();
	$CatsMenu=$ShopClass->cats->MakeTree(0,$cats);

	$parent_cats_ids=$ShopClass->cats->GetParentCatsIds($CatsMenu,$Main->GPC['id']);
	$parent_cat_filters=$ShopClass->cats_filters->GetSpravOptionsList($parent_cats_ids);

	$pos=count($parent_cat_filters)+1;

	$ShopClass->cats_filters->CreateModel();
	$ShopClass->cats_filters->model->columns_update->getCategoryId()->setValue($Main->GPC['id']);
	$ShopClass->cats_filters->model->columns_update->getSpravId()->setValue($Main->GPC['value']);
	$ShopClass->cats_filters->model->columns_update->getSort()->setValue($pos);
	$ShopClass->cats_filters->Insert();

	$list=$ShopClass->cats_filters->GetCatAllList($Main->GPC['id']);

	$array['status']=true;
	$array['text']='Обновлено';
	$array['html']=$Main->template->Render('backend/components/filters_list/filters_list.twig',
		array(
			'list'=>$list
		));
	$Main->template->DisplayJson($array);
	exit;
}
if ($Main->GPC['action']=='del_filter' ) {
	$Main->input->clean_array_gpc('r', array(
		'value' => TYPE_UINT
	));

	if ($Main->GPC['id'] and $Main->GPC['value']) {
		$ShopClass->cats_filters->CreateModel();
		$ShopClass->cats_filters->model->columns_where->getCategoryId()->setValue( $Main->GPC['id'] );
		$ShopClass->cats_filters->model->columns_where->getSpravId()->setValue( $Main->GPC['value'] );
		$ShopClass->cats_filters->Delete();
	}

	$list=$ShopClass->cats_filters->GetCatAllList($Main->GPC['id']);

	$array['status']=true;
	$array['text']='Обновлено';
	$array['html']=$Main->template->Render('backend/components/filters_list/filters_list.twig',
		array(
			'list'=>$list
		));
	$Main->template->DisplayJson($array);
	exit;
}

if ($Main->GPC['action']=='add_aks' ) {
    $Main->input->clean_array_gpc('r', array(
        'value' => TYPE_UINT
    ));

	$ShopClass->cats_aks->CreateModel();
	$ShopClass->cats_aks->model->columns_where->getCatId()->setValue($Main->GPC['id']);
	$ShopClass->cats_aks->model->columns_where->getAlsoId()->setValue($Main->GPC['value']);
	$ShopClass->cats_aks->Delete();


	$ShopClass->cats_aks->CreateModel();
	$ShopClass->cats_aks->model->columns_update->getCatId()->setValue($Main->GPC['id']);
	$ShopClass->cats_aks->model->columns_update->getAlsoId()->setValue($Main->GPC['value']);
	$ShopClass->cats_aks->Insert();

    $aks=$ShopClass->cats_aks->GetAksList($Main->GPC['id']);

    $array['status']=true;
    $array['text']='Обновлено';
    $array['html']=$Main->template->Render('backend/components/aks_list/aks_list.twig',
	    array(
	    	'list'=>$aks
	    ));
    $Main->template->DisplayJson($array);
    exit;
}
if ($Main->GPC['action']=='del_aks' ) {
    $Main->input->clean_array_gpc('r', array(
        'value' => TYPE_UINT
    ));

	$ShopClass->cats_aks->CreateModel();
	$ShopClass->cats_aks->model->columns_where->getCatId()->setValue($Main->GPC['id']);
	$ShopClass->cats_aks->model->columns_where->getAlsoId()->setValue($Main->GPC['value']);
	$ShopClass->cats_aks->Delete();

	$aks=$ShopClass->cats_aks->GetAksList($Main->GPC['id']);

    $html=$Main->template->Render('backend/components/aks_list/aks_list.twig',
	    array(
		    'list'=>$aks
	    ));

    $array['status']=true;
    $array['text']='Обновлено';
    $array['html']=$html;
    $Main->template->DisplayJson($array);
    exit;
}
if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
    $edit=1;
    $data_info=$ShopClass->cats->GetItemById($Main->GPC['id'],1);
    if ($data_info) {

    }
    else {
        $Main->error->ObjectNotFound();
    }
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
    $Main->input->clean_array_gpc('r', array(
	    'cat_id' => TYPE_UINT,
	    'cat_status' => TYPE_BOOL,
        'cat_title' => TYPE_STR,
	    'cat_code' => TYPE_STR,
        'cat_short_title'=>TYPE_STR,
        'cat_url' => TYPE_STR,
	    'cat_parent_id'=>TYPE_UINT,
	    'short_text'=>TYPE_STR,
        'text'=>TYPE_STR,
        'meta_title'=>TYPE_STR,
        'meta_title2'=>TYPE_STR,
        'meta_keywords'=>TYPE_STR,
        'meta_desc'=>TYPE_STR,
        'cat_1c_title'=>TYPE_STR,
        'delivery_cities'=>TYPE_ARRAY,
        $photo_input => TYPE_UINT
    ));
    $photo_id=intval($Main->GPC[$photo_input]);
    $error='';
    $array=array();

    $parent_cat_info=$ShopClass->cats->GetItemById($Main->GPC['cat_parent_id']);
    $cat_url=$Main->GPC['cat_url'];
    if ($parent_cat_info) {
        $cat_url=$parent_cat_info['cat_url'].'/'.$Main->GPC['cat_url'];
    }



    if ($Main->GPC['cat_title']=='') {
        $error='Введите название';
        $array['error_field']='cat_title';
    }
    elseif ($Main->GPC['cat_url']=='') {
        $error='Введите url';
        $array['error_field']='cat_url';
    }
    else{
		if ($Main->GPC['cat_short_title']=='') {
			$Main->GPC['cat_short_title']=$Main->GPC['cat_title'];
		}

	    $ShopClass->cats->CreateModel();
	    $ShopClass->cats->model->columns_where->getTitle()->setValue($Main->GPC['cat_title']);
	    $ShopClass->cats->model->columns_where->getId()->notValue($Main->GPC['cat_id']);
	    $ShopClass->cats->model->columns_where->getParentId()->setValue($Main->GPC['cat_parent_id']);
        $info = $ShopClass->cats->GetItem();
        if ($info) {
            $error = 'Такая категория уже существует';
            $array['error_field'] = 'cat_title';
        } else {
	        $ShopClass->cats->CreateModel();
	        $ShopClass->cats->model->columns_where->getUrl()->setValue($cat_url);
	        $ShopClass->cats->model->columns_where->getId()->notValue($Main->GPC['cat_id']);
	        $ShopClass->cats->model->columns_where->getParentId()->setValue($Main->GPC['cat_parent_id']);
	        $info = $ShopClass->cats->GetItem();
            if ($info) {
                $error = 'Такой url уже существует';
                $array['error_field'] = 'cat_url';
            }
            else {
                $text_id=$Main->text->SaveText($data_info['cat_text_id'], $Main->GPC['text']);

	            $ShopClass->cats->CreateModel();
	            $ShopClass->cats->model->columns_update->getTitle()->setValue($Main->GPC['cat_title']);
	            $ShopClass->cats->model->columns_update->getShortTitle()->setValue($Main->GPC['cat_short_title']);
	            $ShopClass->cats->model->columns_update->getUrl()->setValue($cat_url);
	            $ShopClass->cats->model->columns_update->getPhotoId()->setValue($photo_id);
	            $ShopClass->cats->model->columns_update->getTextId()->setValue($text_id);
	            $ShopClass->cats->model->columns_update->getCode()->setValue($Main->GPC['cat_code']);
	            $ShopClass->cats->model->columns_update->getParentId()->setValue($Main->GPC['cat_parent_id']);
	            $ShopClass->cats->model->columns_update->getMetaTitle()->setValue($Main->GPC['meta_title']);
	            $ShopClass->cats->model->columns_update->getMetaTitle2()->setValue($Main->GPC['meta_title2']);
	            $ShopClass->cats->model->columns_update->getMetaKeywords()->setValue($Main->GPC['meta_keywords']);
	            $ShopClass->cats->model->columns_update->getMetaDesc()->setValue($Main->GPC['meta_desc']);
//	            $ShopClass->cats->model->columns_update->getCat1cTitle()->setValue($Main->GPC['cat_1c_title']);

                if ($Main->GPC['action'] == 'process_edit') {
                    $id=$Main->GPC['cat_id'];

	                $ShopClass->cats->model->columns_where->getId()->setValue($Main->GPC['cat_id']);
	                $result=$ShopClass->cats->Update();

                    if ($result ) {
                        $array['status'] = true;
                        $array['text'] = 'Значение успешно обновлено';
                    } else {
                        $array['text'] = 'Ошибка обновления';
                    }

                } else {
	                $id=$ShopClass->cats->Insert();
                    $array['text'] = 'Значение успешно добавлено';
                    $array['status'] = true;
                }

                $ShopClass->cats->UpdateLink($id);
                $ShopClass->cats->UpdateChildLinks($id);
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

$page_name=$a_name.' категорию';
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
            'file_id'=>$data_info['cat_icon'],
            'icon_url'=>$data_info['cat_icon_url']
        )
    ),
    'module'=>'shop',
    'show_select_image'=>true,
    'title'=>'Фото категорий',
    'folder'=>'cats'
);

$aks=array();
$cat_filters=array();
if ($data_info['cat_id']) {
	$aks=$ShopClass->cats_aks->GetAksList($data_info['cat_id']);
	$cat_filters=$ShopClass->cats_filters->GetCatAllList($data_info['cat_id']);
}


$filters=$Main->sprav->GetSprav(
	array(
		'sprav_status'=>1,
		'sprav_option'=>1,
		'show_order'=>true
	),
	100
);


$ShopClass->cats->CreateModel();
$ShopClass->cats->model->setOrderByWithColumn('title');
$ShopClass->cats->model->setOrderWay('ASC');
$cats=$ShopClass->cats->GetList();
$CatsMenu=$ShopClass->cats->MakeTree(0,$cats);

$parent_cat_filters_ids=array();
$parent_cat_filters=array();
$parent_cats_ids=$ShopClass->cats->GetParentCatsIds($CatsMenu,$data_info['cat_id']);
if ($parent_cats_ids) {
	$parent_cat_filters=$ShopClass->cats_filters->GetCatAllList($parent_cats_ids);


	foreach ($parent_cat_filters as $id) {
		$parent_cat_filters_ids[]=$id['sprav_id'];
	}

}

$cats_select= $ShopClass->cats->GetCatsNestedSelect($data_info['cat_id'],$CatsMenu,'',$data_info['cat_id']);
$cats_select2= $ShopClass->cats->GetCatsNestedSelect(0,$CatsMenu);

$delivery_cities=$ShopClass->delivery_cities->getDeliveryCities(true);



$Main->template->Display(array(
        'info'=>$data_info,
        'edit'=>$edit,
        'image_data1'=>$image_data1,
        'cats_select'=>$cats_select,
        'cats_select2'=>$cats_select2,
		'cat_filters'=>$cat_filters,
        'filters'=>$filters,
		'parent_cat_filters'=>$parent_cat_filters,
		'parent_cat_filters_ids'=>$parent_cat_filters_ids,
		'delivery_cities'=>$delivery_cities,
		'aks'=>$aks
    )
);
