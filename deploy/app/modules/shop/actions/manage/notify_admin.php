<?php
$Main->user->PagePrivacy('admin,manager');

if ($_REQUEST['action']=='get') {

	$ShopClass->notify_admin->CreateModel();
	$ShopClass->notify_admin->model->columns_where->getStatus()->setValue(1);
	$ShopClass->notify_admin->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
	$ShopClass->notify_admin->model->columns_where->getTime()->moreValue(date('Y-m-d H:i:s',(time()-24*3600)));
	$items=$ShopClass->notify_admin->GetList();

	$array['status']=true;
	$array['items']=$items;
	$Main->template->DisplayJson($array);
	exit;
}
if ($_REQUEST['action']=='delete') {
	$Main->input->clean_array_gpc('r', array(
		'id'=>TYPE_STR
	));
	$ShopClass->notify_admin->CreateModel();
	$ShopClass->notify_admin->model->columns_update->getStatus()->setValue(0);
	$ShopClass->notify_admin->model->columns_where->getId()->setValue($Main->GPC['id']);
	$ShopClass->notify_admin->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
	$ShopClass->notify_admin->Update();

	$array['status']=true;
	$Main->template->DisplayJson($array);
	exit;
}
