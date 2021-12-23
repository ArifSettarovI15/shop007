<?php
$Main->user->PagePrivacy('admin');
if ($Main->GPC['action']=='sort_table') {
	$Main->input->clean_array_gpc('r', array(
		'data_sort' => TYPE_ARRAY_UINT
	));

	$pos=0;
	$ShopClass->cats->CreateModel();

	foreach ($Main->GPC['data_sort'] as $line_key) {
		$Main->sprav->UpdateSpravSort($line_key, $pos);
		$pos++;
	}
	//sprav_sort

	$array['status']=true;
	$array['text']='Позиции обновлены';
	$Main->template->DisplayJson($array);
}

if ($Main->GPC['action']=='update_badge_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL,
		'type_id'=>TYPE_STR
	));
	$status=false;

	$info=$Main->sprav->GetSpravItem(array(
		'sprav_id'=>$Main->GPC['object_id']
	));

	if (
		$info &&
		($Main->GPC['type_id']=='top' OR  $Main->GPC['type_id']=='main' OR $Main->GPC['type_id']=='status' OR $Main->GPC['type_id']=='filter' OR $Main->GPC['type_id']=='option' or $Main->GPC['type_id']=='object_id')) {
		$status=$Main->sprav->UpdateSpravItemBadge($Main->GPC['type_id'],$Main->GPC['object_id'],$Main->GPC['value']);
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

	$status=$Main->sprav->DeleteSpravItem(array(
		'sprav_id'=>$Main->GPC['object_id']
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
	'sprav_title' => TYPE_STR,
	'sprav_id' => TYPE_UINT,
	'sprav_status' => TYPE_NUM
));

$filter_options=array();
$filter_options['sprav_title_like']=$Main->GPC['sprav_title'];
$filter_options['sprav_id']=$Main->GPC['sprav_id'];


if ($Main->GPC_exists['sprav_status']) {
	$filter_options['sprav_status']=$Main->GPC['sprav_status'];
}
$variables=$filter_options;

$page_name='Справочники';
$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>$page_name
			)
		),
		'title'=>$page_name
	)
);
$filter_options['order']='sort';
$filter_options['show_order']=true;

$Paging =new ClassPaging($Main,20,false,false);
$Paging->show_per_page=true;
$Paging->data=$Main->sprav->GetSprav($filter_options,$Paging->per_page,$Paging->sql_start);
$Paging->total=$Main->sprav->GetSpravTotal($filter_options);
$Paging->Display('sprav/manage/sprav_table.twig',$variables);
