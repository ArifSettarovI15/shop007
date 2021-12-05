<?php
$Main->user->PagePrivacy('admin');

$photo_input='vendor_logo';
$photo_input2='vendor_bg';

$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
    $Main->input->clean_array_gpc('r', array(
        'vendor_id' => TYPE_UINT
    ));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
    $edit=1;
	$ShopClass->vendors->CreateModel();
	$ShopClass->vendors->model->columns_where->getId()->setValue($Main->GPC['vendor_id']);
	$ShopClass->vendors->model->setSelectField($ShopClass->vendors->model->getTableName().'.*');
	$ShopClass->vendors->model->SetJoinImage('icon',$ShopClass->vendors->model->GetTableItemName('icon'));
	$ShopClass->vendors->model->SetJoinImage('bg',$ShopClass->vendors->model->GetTableItemName('bg'));
	$data_info = $ShopClass->vendors->GetItem(1);

    if ($data_info) {

    }
    else {
        $Main->error->ObjectNotFound();
    }
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
    $Main->input->clean_array_gpc('r', array(
	    'vendor_id' => TYPE_UINT,
        'vendor_name' => TYPE_STR,
        'vendor_url'=>TYPE_STR,
        $photo_input => TYPE_UINT,
	    $photo_input2 => TYPE_UINT,
	    'meta_title'=>TYPE_STR,
	    'meta_desc'=>TYPE_STR,
	    'meta_keywords'=>TYPE_STR,
	    'text'=>TYPE_STR,
	    'vendor_alias'=>TYPE_STR
    ));
    $photo_id=intval($Main->GPC[$photo_input]);
	$photo_id2=intval($Main->GPC[$photo_input2]);
    $error='';
    $array=array();


    if ($Main->GPC['vendor_name']=='') {
        $error='Введите название';
        $array['error_field']='vendor_name';
    }
    elseif ($Main->GPC['vendor_url']=='') {
        $error='Введите url';
        $array['error_field']='vendor_url';
    }
    else{
	    $ShopClass->vendors->CreateModel();
	    $ShopClass->vendors->model->columns_where->getTitle()->setValue($Main->GPC['vendor_name']);
	    $ShopClass->vendors->model->columns_where->getId()->notValue($Main->GPC['vendor_id']);
	    $info = $ShopClass->vendors->GetItem();

        if ($info) {
            $error = 'Такая бренд уже существует';
            $array['error_field'] = 'vendor_name';
        } else {

	        $ShopClass->vendors->CreateModel();
	        $ShopClass->vendors->model->columns_where->getUrl()->setValue($Main->GPC['vendor_url']);
	        $ShopClass->vendors->model->columns_where->getId()->notValue($Main->GPC['vendor_id']);
	        $info = $ShopClass->vendors->GetItem();

            if ($info) {
                $error = 'Такой url уже существует';
                $array['error_field'] = 'vendor_url';
            }
            else {
	            $text_id=$Main->text->SaveText($data_info['vendor_text_id'], $Main->GPC['text']);
	            $letter=mb_strtoupper(mb_substr($Main->GPC['vendor_name'],0,1));

	            $ShopClass->vendors->CreateModel();
	            $ShopClass->vendors->model->columns_update->getTitle()->setValue($Main->GPC['vendor_name']);
	            $ShopClass->vendors->model->columns_update->getUrl()->setValue($Main->GPC['vendor_url']);
	            $ShopClass->vendors->model->columns_update->getPhotoId()->setValue($photo_id);
	            $ShopClass->vendors->model->columns_update->getPhotoId2()->setValue($photo_id2);
	            $ShopClass->vendors->model->columns_update->getTextId()->setValue($text_id);
	            $ShopClass->vendors->model->columns_update->getLetter()->setValue($letter);
	            $ShopClass->vendors->model->columns_update->getAlias()->setValue($Main->GPC['vendor_alias']);
	            $ShopClass->vendors->model->columns_update->getMetaTitle()->setValue($Main->GPC['meta_title']);
	            $ShopClass->vendors->model->columns_update->getMetaKeywords()->setValue($Main->GPC['meta_keywords']);
	            $ShopClass->vendors->model->columns_update->getMetaDesc()->setValue($Main->GPC['meta_desc']);

	            if ($Main->GPC['action'] == 'process_edit') {
		            $id=$Main->GPC['vendor_id'];

		            $ShopClass->vendors->model->columns_where->getId()->setValue($Main->GPC['vendor_id']);
		            $result=$ShopClass->vendors->Update();

		            if ($result ) {
			            $array['status'] = true;
			            $array['text'] = 'Значение успешно обновлено';
		            } else {
			            $array['text'] = 'Ошибка обновления';
		            }

	            } else {
		            $id=$ShopClass->vendors->Insert();
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

$page_name=$a_name.' бренд';
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
                'title'=>'Бренды',
                'link'=>BASE_URL.'/manager/shop/vendors/'
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
            'file_id'=>$data_info['vendor_icon'],
            'icon_url'=>$data_info['vendor_icon_url']
        )
    ),
    'module'=>'shop',
    'show_select_image'=>true,
    'title'=>'Логотипы брендов',
    'folder'=>'vendors',
	'invert'=>true
);
$image_data2=array(
	'input_name'=>$photo_input2,
	'files'=>array(
		array(
			'file_id'=>$data_info['vendor_bg'],
			'icon_url'=>$data_info['vendor_bg_url']
		)
	),
	'module'=>'shop',
	'show_select_image'=>true,
	'title'=>'Фото брендов',
	'folder'=>'vendors_photos',
);

$Main->template->Display(array(
        'info'=>$data_info,
        'edit'=>$edit,
        'image_data1'=>$image_data1,
        'image_data2'=>$image_data2
    )
);
