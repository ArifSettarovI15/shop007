<?php

$Main->user->PagePrivacy('guest');
$change_email_link='';

if ($Main->GPC['action'] == 'process_login') {
    $Main->input->clean_array_gpc('r', array(
        'login' => TYPE_STR,
        'password' => TYPE_NOTRIM,
        'remember' => TYPE_BOOL
    ));

    $error = '';
    $error_desc='';
    $mes='';
    $error_field='';
    $user_info=array();
    $inline=false;
    $expire=false;
    if ($Main->GPC['remember']==false) {
    	$expire=TIMENOW + 60 * 60 * 24;
    }

    if ($Main->GPC['login'] == '') {
        $error = $Main->lang->data['users']['enter_login'];
        $error_field='login';
    }
    elseif ($Main->GPC['password'] == '') {
        $error = $Main->lang->data['users']['enter_password'];
        $error_field='password';
    }
    elseif ($Main->user->CheckStrike($Main->GPC["login"])) {
        $error = $Main->lang->data['users']['strike_error'];
    }
    else {
        $user_info = $Main->user->GetUserByLogin($Main->GPC["login"],false);
        if ($user_info['user_active']) {
	        if (intval($user_info['user_id'])==0
	            OR sha1($user_info['user_salt']. sha1($user_info['user_salt']. sha1($Main->GPC['password']))) != $user_info['user_password']
	        ) {
		        $Main->user->LogStrike($Main->GPC['email']);
		        $error =$Main->lang->data['users']['login_error2'];
		        $error_field='email,password';
	        }
	        else {
		        // $Main->user->DeleteUserSessionByHash($Main->user_info['sessionhash']);
		        //$Main->user->CreateUserSession($Main->user_info['user_id']);
		        $user_info['sessionhash']=$Main->user_info['sessionhash'];
		        $Main->user->UpdateUserSession($Main->user_info['sessionhash'],$user_info['user_id'],$expire);
		        $Main->user_info = $user_info;
		        $Main->template->global_vars['user_info']=$Main->user->PrepareUserTemplate($Main->user_info);
		        $Main->user_profile=$Main->user->GetUserProfile($Main->user_info['user_id']);
		        $Main->template->global_vars['user_profile']=$Main->user_profile;

		        $ShopClass->basket->UpdateUserHash();
//		        $ShopClass->fav->UpdateUserHash();
	        }
        }
        else {
	        $error = 'Ваш аккаунт еще не активирован';
        }
    }

    $reload=false;
    $text='';
    $html='';
    $redirect='';
    if ($error=='') {
        $redirect=BASE_URL;
        $status = true;
        $html= $Main->template->Render('parts/auth.html.twig');
        $reload=true;
    }
    else {
        $status=false;
        if ($inline==true) {
            $text= $Main->template->Render('global/message.html.twig',
                array(
                    'message'=>$error,
                    'message_class'=>'error',
                    'message_desc'=>$error_desc
                )
            );
        }
        else {
            $text=$error;
        }
    }

    $array_json=array(
        'status'=>$status,
        'message_inline'=>$inline,
        'reload'=>$reload,
        'text'=>$text,
        'html'=>$html,
        'error_field'=>$error_field
    );

    $Main->template->DisplayJson($array_json);

}
$Main->error->AccessDenied();

$Main->template->Display(
    array(
    'page_name'=>$Main->lang->data['users']['login_form'])
);
