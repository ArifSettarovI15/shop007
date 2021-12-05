<?php
$Main->user->PagePrivacy('admin,manager');


if ($Main->user_info['user_role_id']==2) {
	if ( $Main->GPC['action'] == 'update_badge_status' ) {
		$Main->input->clean_array_gpc( 'r', array(
			'object_id' => TYPE_UINT,
			'value'     => TYPE_BOOL,
			'type_id'   => TYPE_STR
		) );

		$status = true;

		if ( $Main->GPC['value'] ) {
			$Main->user->ActivateAccount( $Main->GPC['object_id'] );
		} else {
			$Main->user->DeactivateAccount( $Main->GPC['object_id'] );
		}

		$array           = array();
		$array['status'] = $status;
		if ( $status ) {
			$array['text'] = 'Статус обновлен';
		} else {
			$array['text'] = 'Ошибка';
		}
		$Main->template->DisplayJson( $array );
	}
	if ( $Main->GPC['action'] == 'delete' ) {
		$Main->input->clean_array_gpc( 'r', array(
			'object_id' => TYPE_UINT
		) );
		$status          = $Main->user->DeleteUserById( $Main->GPC['object_id'] );
		$array           = array();
		$array['status'] = $status;
		if ( $status ) {
			$array['text'] = $Main->lang->data['admin_users']['user_deleted_ok'];
		} else {
			$array['text'] = $Main->lang->data['admin_users']['user_deleted_error'];
		}
		$Main->template->DisplayJson( $array );
	}
}

$Main->input->clean_array_gpc('r', array(
    'user_id' => TYPE_UINT,
    'name'=>TYPE_STR,
    'phone'=>TYPE_STR,
    'city'=>TYPE_STR,
    'user_role_id'=>TYPE_UINT,
    'email' => TYPE_STR,
    'date_start'=>TYPE_STR,
    'date_end'=>TYPE_STR,
    'status' => TYPE_NUM,
	'user_manager_id'=>TYPE_NUM
));
$filter_options=array();
$filter_options['order']='name';
$filter_options['user_role_id']=3;
$filter_options['status']=1;
$managers=$Main->user->GetUsers($filter_options,100);


$filter_options=array();
$filter_options['order']=$Main->GPC['sort'];
$filter_options['order_way']=$Main->GPC['sort_way'];
$filter_options['user_id']=$Main->GPC['user_id'];
$filter_options['user_role_id']=$Main->GPC['user_role_id'];
$filter_options['email']=$Main->GPC['email'];
$filter_options['status']=$Main->GPC['status'];
$filter_options['date_start']=$Main->GPC['date_start'];
$filter_options['date_end']=$Main->GPC['date_end'];
$filter_options['name']=$Main->GPC['name'];
$filter_options['phone']=$Main->GPC['phone'];
$filter_options['city']=$Main->GPC['city'];

if ($Main->GPC_exists['status']){
    $filter_options['status']=$Main->GPC['status'];
}
else {
    $filter_options['status']=-1;
}


if ($Main->user_info['user_role_id']==3) {
	$filter_options['user_manager_id']=$Main->user_info['user_id'];
}
else {
	if ($Main->GPC_exists['user_manager_id']){
		$filter_options['user_manager_id']=$Main->GPC['user_manager_id'];
	}
	else {
		$filter_options['user_manager_id']=-1;
	}
}

$UsersPaging =new ClassPaging($Main);
$UsersPaging->data=$Main->user->GetUsers($filter_options,$UsersPaging->per_page,$UsersPaging->sql_start);
$UsersPaging->total=$Main->user->GetUsersTotal($filter_options);
$UsersPaging->Display('users/manage/users_table.html.twig',array(
	'managers'=>$managers
));
