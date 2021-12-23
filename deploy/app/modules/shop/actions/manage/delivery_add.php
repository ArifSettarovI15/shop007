<?php
$Main->user->PagePrivacy('admin');

$data_info=array();
$edit=0;


if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'id' => TYPE_UINT
	));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;
	$data_info=$ShopClass->days->GetItemById($Main->GPC['id'],1);
	if ($data_info) {

	}
	else {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
	$Main->input->clean_array_gpc('r', array(
		'delivery_id' => TYPE_UINT,
		'city_group_id' => TYPE_UINT,
		'delivery_go_day' => TYPE_UINT,
		'delivery_priem_day' => TYPE_UINT,
		'delivery_priem_time' => TYPE_UINT
	));

	$error='';
	$array=array();

	if ($Main->GPC['city_group_id']==0) {
		$error='Введите группу';
		$array['error_field']='city_group_id';
	}
	else{



			$ShopClass->days->CreateModel();
			$ShopClass->days->model->columns_update->getCityId()->setValue($Main->GPC['city_group_id']);
		$ShopClass->days->model->columns_update->getGoDay()->setValue($Main->GPC['delivery_go_day']);
		$ShopClass->days->model->columns_update->getPriemDay()->setValue($Main->GPC['delivery_priem_day']);
		$ShopClass->days->model->columns_update->getPriemTime()->setValue($Main->GPC['delivery_priem_time']);


			if ($Main->GPC['action'] == 'process_edit') {
				$id=$Main->GPC['city_id'];

				$ShopClass->days->model->columns_where->getId()->setValue($Main->GPC['delivery_id']);
				$result=$ShopClass->days->Update();

				if ($result ) {
					$array['status'] = true;
					$array['text'] = 'Значение успешно обновлено';
				} else {
					$array['text'] = 'Ошибка обновления';
				}

			} else {
				$id=$ShopClass->days->Insert();
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
				'title'=>'Доставка',
				'link'=>BASE_URL.'/manager/shop/delivery/'
			),
			array(
				'title'=>$a_name
			),
		),
		'title'=>$page_name
	)
);

$Main->template->Display(array(
		'info'=>$data_info,
		'days'=>$ShopClass->days->getDays(),
		'time'=>$ShopClass->days->getTime(),
		'cities'=>$cities,
		'groups'=>$ShopClass->days->getGroups(),
		'edit'=>$edit
	)
);
