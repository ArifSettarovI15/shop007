<?php
$Main->user->PagePrivacy('admin');

$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
	$Main->input->clean_array_gpc('r', array(
		'sprav_id' => TYPE_UINT
	));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
	$edit=1;
	$data_info=$Main->sprav->GetSpravItem(
		array(
			'sprav_id'=>$Main->GPC['sprav_id'],
			'sprav_status'=>-1
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
		'sprav_title' => TYPE_STR,
		'sprav_name'=>TYPE_STR,
		'sprav_label'=>TYPE_STR,
		'sprav_style'=>TYPE_STR,
		'sprav_ext'=>TYPE_STR,
		'sprav_desc'=>TYPE_STR,
		'sprav_data_type'=>TYPE_STR,
		'sprav_code'=>TYPE_STR
	));

	$error='';
	$array=array();
	//$Main->GPC['sprav_name']=translit_url_safe($Main->GPC['sprav_name']);

	if ($Main->GPC['sprav_title']=='') {
		$error='Введите название';
		$array['error_field']='sprav_title';
	}
	elseif ($Main->GPC['sprav_name']=='') {
		$error='Введите селектор';
		$array['error_field']='sprav_name';
	}
	else{

		$info = $Main->sprav->GetSpravItem(
			array(
				'sprav_title'=>$Main->GPC['sprav_title']
			)
		);
		if ($info && $info['sprav_id'] != $Main->GPC['sprav_id']) {
			$error = 'Такой справочник уже существует';
			$array['error_field'] = 'sprav_title';
		} else {
			$info = $Main->sprav->GetSpravItem(
				array(
					'sprav_name'=>$Main->GPC['sprav_name']
				)
			);
			if ($info && $info['sprav_id'] != $Main->GPC['sprav_id']) {
				$error = 'Такой селектор уже существует';
				$array['error_field'] = 'sprav_name';
			} else {
				if ( $Main->GPC['action'] == 'process_edit' ) {
					$Main->sprav->UpdateSpravItem(
						$Main->GPC['sprav_id'],
						$Main->GPC['sprav_title'],
						$Main->GPC['sprav_name'],
						$Main->GPC['sprav_label'],
						$Main->GPC['sprav_style'],
						$Main->GPC['sprav_ext'],
						$Main->GPC['sprav_desc'],
						$Main->GPC['sprav_data_type']
					);
					$sprav_id=$Main->GPC['sprav_id'];

					$array['status'] = true;
					$array['text']   = 'Значение успешно обновлено';

				} else {
					$sprav_id=$Main->sprav->AddSpravItem(
						$Main->GPC['sprav_title'],
						$Main->GPC['sprav_name'],
						$Main->GPC['sprav_label'],
						$Main->GPC['sprav_style'],
						$Main->GPC['sprav_ext'],
						$Main->GPC['sprav_desc'] ,
						$Main->GPC['sprav_data_type']
					);

					$array['text']   = 'Значение успешно добавлено';
					$array['status'] = true;
				}

				$Main->sprav->UpdateSpravCode($sprav_id,$Main->GPC['sprav_code']);
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


$page_name=$a_name.' справочник';
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
				'title'=>$a_name
			),
		),
		'title'=>$page_name
	)
);


$Main->template->Display(array(
		'info'=>$data_info,
		'edit'=>$edit
	)
);
