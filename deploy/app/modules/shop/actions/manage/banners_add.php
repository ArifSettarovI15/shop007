<?php
$Main->user->PagePrivacy('admin');

$photo_input='banner_icon';
$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'id' => TYPE_UINT
	));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;
	$data_info=$ShopClass->banners->GetItemById($Main->GPC['id']);
	if ($data_info) {

	}
	else {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
	$Main->input->clean_array_gpc('r', array(
		'banner_id' => TYPE_UINT,
		'banner_status' => TYPE_BOOL,
		'banner_url' => TYPE_STR,
		'cat_parent_id'=>TYPE_UINT,
		'banner_pos'=>TYPE_UINT,
		$photo_input => TYPE_UINT
	));
	$photo_id=intval($Main->GPC[$photo_input]);
	$error='';
	$array=array();

	if ($Main->GPC['banner_url']=='') {
		$error='Введите url';
		$array['error_field']='banner_url';
	}
	else{

		$ShopClass->banners->CreateModel();
		$ShopClass->banners->model->columns_update->getUrl()->setValue($Main->GPC['banner_url']);
		$ShopClass->banners->model->columns_update->getPhotoId()->setValue($photo_id);
		$ShopClass->banners->model->columns_update->getPos()->setValue($Main->GPC['banner_pos']);
		$ShopClass->banners->model->columns_update->getCatId()->setValue($Main->GPC['cat_parent_id']);

		if ($Main->GPC['action'] == 'process_edit') {
			$id=$Main->GPC['banner_id'];

			$ShopClass->banners->model->columns_where->getId()->setValue($Main->GPC['banner_id']);
			$result=$ShopClass->banners->Update();

			if ($result ) {
				$array['status'] = true;
				$array['text'] = 'Значение успешно обновлено';
			} else {
				$array['text'] = 'Ошибка обновления';
			}

		} else {
			$id=$ShopClass->banners->Insert();
			$array['text'] = 'Значение успешно добавлено';
			$array['status'] = true;
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

$page_name=$a_name.' баннер';
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
				'title'=>'Баннеры',
				'link'=>BASE_URL.'/manager/shop/banners/'
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
			'file_id'=>$data_info['banner_photo_id'],
			'icon_url'=>$data_info['banner_icon_url']
		)
	),
	'module'=>'shop',
	'show_select_image'=>true,
	'title'=>'Фото баннеров',
	'folder'=>'banners'
);


$ShopClass->cats->CreateModel();
$ShopClass->cats->model->setOrderByWithColumn('title');
$ShopClass->cats->model->setOrderWay('ASC');
$cats=$ShopClass->cats->GetList();
$CatsMenu=$ShopClass->cats->MakeTree(0,$cats);

$cats_select= $ShopClass->cats->GetCatsNestedSelect($data_info['banner_cat_id'],$CatsMenu,'');
$cats_select2= $ShopClass->cats->GetCatsNestedSelect($data_info['banner_cat_id'],$CatsMenu);


$Main->template->Display(array(
		'info'=>$data_info,
		'edit'=>$edit,
		'image_data1'=>$image_data1,
		'cats_select'=>$cats_select,
		'cats_select2'=>$cats_select2
	)
);
