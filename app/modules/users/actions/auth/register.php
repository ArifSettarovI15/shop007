<?php
$user_info=array();
$user_profile=array();
$edit_user=0;
$current_user_id=0;
$is_admin_panel=0;
$page_name=$Main->lang->data['users']['register'];

$role_id=1;
$activated_account=0;
$confirm_email=false;
if ($Main->user_info['user_id']>0) {
	SiteRedirect();
}

if ($Main->GPC['action'] == 'process_register') {
    $Main->input->clean_array_gpc('r', array(
	    'lastname' => TYPE_STR,
	    'name' => TYPE_STR,
        'email' => TYPE_STR,
	    'phone' => TYPE_STR,
	    'password' => TYPE_NOCLEAN,
	    'password2' => TYPE_NOCLEAN,
	    'company'=>TYPE_STR,
	    'city'=>TYPE_STR,
	    'inn'=>TYPE_STR,
	    'kpp'=>TYPE_STR,
	    'ogrn'=>TYPE_STR,
	    'site'=>TYPE_STR
    ));

    $Main->GPC['login']=$Main->GPC['email'];

    $profile_data=array(
        'profile_name'=>$Main->GPC['name'],
        'profile_lastname'=>$Main->GPC['lastname'],
        'profile_phone'=>$Main->GPC['phone'],
        'profile_company'=>$Main->GPC['company'],
        'profile_city'=>$Main->GPC['city'],
        'profile_inn'=>$Main->GPC['inn'],
        'profile_kpp'=>$Main->GPC['kpp'],
        'profile_ogrn'=>$Main->GPC['ogrn'],
        'profile_site'=>$Main->GPC['site']
    );

    $register_data = $Main->user->SaveUser(
        $current_user_id,
        $Main->GPC['login'],
        $Main->GPC['password'],
        $Main->GPC['password2'],
        $Main->GPC['email'],
        $profile_data,
        $confirm_email,
        $activated_account,
        $role_id
    );

    $Main->template->DisplayJson($register_data['response']);
}

$filter_s=array();
$filter_s['key']='reg';
$filter_s['show_order']=true;
$fields=$SettingsClass->GetGroupValues($filter_s);


$breadcrumbs=array();
$breadcrumbs[]=array(
	'title'=>'Регистрация'
);

$Main->template->SetPageAttributes(
	array(
		'title'=>'Регистрация',
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>'Регистрация'
	)
);

$filter_s=array();
$filter_s['show_order']=true;
$filter_s['key']='banners';
$banners=$SettingsClass->GetGroupValues($filter_s);

$Main->template->Display(
	array(
		'fields'=>$fields,
		'last_views'=>$ShopClass->getLastViews(),
		'banners'=>$banners
	)
);
