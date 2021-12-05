<?php
$Main->user->PagePrivacy('admin');
$photo_input='sprav_icon';


$edit=0;
$data_info=array();
$sprav_info=$Main->sprav->GetSpravItem(
	array(
		'sprav_id'=>$Main->GPC['sprav_id'],
		'svid_status'=>-1
	)
);

if ($sprav_info) {

}
else {
	$Main->error->ObjectNotFound();
}

if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'sprav_id' => TYPE_UINT,
		'svid' => TYPE_UINT
	));
}


if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;
	$data_info=$Main->sprav->GetSpravValue(
		array(
			'svid'=>$Main->GPC['svid'],
			'svid_status'=>-1,
			'with_syn'=>true
		)
	);

	if ($data_info) {

	}
	else {
		$Main->error->ObjectNotFound();
	}
}

if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
	$Main->input->clean_array_gpc('r', array(
		'svid_title' => TYPE_STR,
		'svid_eng'=>TYPE_STR,
		'svid_value'=>TYPE_STR,
		'svid_syn_id'=>TYPE_UINT,
		'svid_svg'=>TYPE_STR,
		$photo_input => TYPE_UINT
	));
	$photo_id=intval($Main->GPC[$photo_input]);
	$error='';
	$array=array();

	if ($Main->GPC['svid_title']=='') {
		$error='Введите значение';
		$array['error_field']='svid_title';
	}
	else{

		$info = $Main->sprav->GetSpravValue(
			array(
				'sprav_id'=>$Main->GPC['sprav_id'],
				'svid_title'=>$Main->GPC['svid_title']
			)
		);

		if ($info && $info['svid'] != $Main->GPC['svid']) {
			$error = 'Такое значение в справочник уже существует';
			$array['error_field'] = 'sprav_value';
		} else {
			$info = $Main->sprav->GetSpravValue(
				array(
					'sprav_id'=>$Main->GPC['sprav_id'],
					'svid_eng'=>$Main->GPC['svid_eng']
				)
			);
			if ($info && $info['svid'] != $Main->GPC['svid'] and $Main->GPC['svid_eng']!='') {
				$error = 'Такое ключ в справочник уже существует';
				$array['error_field'] = 'svid_eng';
			} else {
				if ( $Main->GPC['action'] == 'process_edit' ) {
					$svid=$Main->sprav->UpdateSpravValue(
						$Main->GPC['svid'],
						$Main->GPC['sprav_id'],
						$Main->GPC['svid_title'],
						$Main->GPC['svid_eng'],
						$Main->GPC['svid_value'],
						$Main->GPC['svid_svg'],
						$photo_id);

					$array['status'] = true;
					$array['text']   = 'Значение успешно обновлено';

				} else {
					$svid=$Main->sprav->AddSpravValue(
						$Main->GPC['sprav_id'],
						$Main->GPC['svid_title'],
						$Main->GPC['svid_eng'],
						$Main->GPC['svid_value'],
						$Main->GPC['svid_svg'],
						$photo_id,
						1);

					$array['text']   = 'Значение успешно добавлено';
					$array['status'] = true;
				}



			}

		}
	}

	if ($Main->GPC['svid_syn_id']) {
		$syn_info=$Main->sprav->GetSpravValue(
			array(
				'svid'=>$Main->GPC['svid_syn_id']
			)
		);
		if ($syn_info) {
			$syn=$syn_info['svid_syn_data'];
			$syn[$data_info['svid']]=$data_info['svid_title'];
			$Main->sprav->UpdateSpravValueSynData($syn_info['svid'],serialize($syn));

			$Main->sprav->UpdateSpravValueSyn($data_info['svid'],$Main->GPC['svid_syn_id']);

			$ShopClass->products_filters->CreateModel();
			$ShopClass->products_filters->model->columns_update->getSvid()->setValue($Main->GPC['svid_syn_id']);
			$ShopClass->products_filters->model->columns_where->getSvid()->setValue($data_info['svid']);
			$ShopClass->products_filters->Update();
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

$image_data1=array(
	'input_name'=>$photo_input,
	'files'=>array(
		array(
			'file_id'=>$data_info['svid_icon'],
			'icon_url'=>$data_info['svid_icon_url']
		)
	),
	'module'=>'sprav',
	'show_select_image'=>true,
	'title'=>'Фото',
	'folder'=>'sprav_'.$data_info['sprav_id']
);


$page_name=$a_name.' значение';
$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>'Справочники',
				'link'=>BASE_URL.'/manager/sprav/'
			),
			array(
				'title'=>$sprav_info['sprav_title'],
				'link'=>BASE_URL.'/manager/sprav/'.$sprav_info['sprav_id'].'/view/'
			),
			array(
				'title'=>$a_name
			),
		),
		'title'=>$page_name
	)
);


$filter_options=array();
$filter_options['sprav_id']=$Main->GPC['sprav_id'];
$filter_options['svid_status']=1;
$filter_options['empty_sync']=1;
$filter_options['show_order']=true;
$list=$Main->sprav->GetSpravValues($filter_options,'all');

$Main->template->Display(array(
		'info'=>$data_info,
		'edit'=>$edit,
		'sprav_info'=>$sprav_info,
		'image_data1'=>$image_data1,
		'sync_list'=>$list
	)
);
