<?php
$Main->user->PagePrivacy('admin');

$sprav_info=$Main->sprav->GetSpravItem(
	array(
		'sprav_id'=>$Main->GPC['sprav_id']
	)
);
if ($sprav_info) {

}
else {
	$Main->error->ObjectNotFound();
}

if ($Main->GPC['action']=='update_badge_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL,
		'type_id'=>TYPE_STR
	));
	$status=false;

	$info=$Main->sprav->GetSpravValue(array(
		'svid'=>$Main->GPC['object_id'],
		'svid_status'=>-1
	));

	if (
		$info &&
		($Main->GPC['type_id']=='status')) {
		$status=$Main->sprav->UpdateSpravValueBadge($Main->GPC['type_id'],$Main->GPC['object_id'],$Main->GPC['value']);
	}


	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Значение обновлено';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}

if ($Main->GPC['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'object_id' => TYPE_UINT
	));

	$status=$Main->sprav->DeleteSpravValue(array(
		'svid'=>$Main->GPC['object_id']
	));
	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Объект успешно удален';
	}
	else {
		$array['text']='Ошибка удаления объекта';
	}
	$Main->template->DisplayJson($array);

}
$Main->input->clean_array_gpc('r', array(
	'svid' => TYPE_UNUM,
	'svid_title' => TYPE_STR,
	'svid_status' => TYPE_NUM
));

$filter_options=array();
$filter_options['svid']=$Main->GPC['svid'];
$filter_options['svid_title_like']=$Main->GPC['svid_title'];
$filter_options['sprav_id']=$Main->GPC['sprav_id'];
$filter_options['empty_sync']=1;

if ($Main->GPC_exists['svid_status']) {
	$filter_options['svid_status']=$Main->GPC['svid_status'];
}

$variables=$filter_options;

$page_name=$sprav_info['sprav_title'];
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
				'title'=>$sprav_info['sprav_title']
			)
		),
		'title'=>$page_name
	)
);

$variables['sprav']=$sprav_info;
$filter_options['show_order']=true;
$filter_options['join_image']=true;
$filter_options['svid_status']=-1;
$Paging =new ClassPaging($Main,20,false,false);
$Paging->show_per_page=true;

$Paging->data=$Main->sprav->GetSpravValues($filter_options,$Paging->per_page,$Paging->sql_start);
$Paging->total=$Main->sprav->GetSpravValuesTotal($filter_options);

$Paging->Display('sprav/manage/sprav_values_table.twig',$variables);
