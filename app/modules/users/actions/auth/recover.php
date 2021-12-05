<?php

if ($Main->user_info['user_id']>0) {
	SiteRedirect();
}

$mes='';
$error='';
$error_desc='';
$mes_desc='';
$error_field='';
if ($Main->GPC['action'] == 'process_recover') {
    $Main->input->clean_array_gpc('r', array(
        'password' => TYPE_NOCLEAN,
        'password2' => TYPE_NOCLEAN
    ));
    $data=$Main->user->SelectUserHash($Main->GPC['hash_id'],'forgot');
    $inline=false;
    if (intval($data['id'])==0 OR $data['time']<TIMENOW){
        $error_desc=$Main->lang->SetVars(
            $Main->user->lang['recover_error_desc'],
            array(
                $Main->settings_values['links']['forgot']
            )
        );
        $error=$Main->template->Render('global/message.html.twig',
            array(
                'message'=>$Main->user->lang['recover_error'],
                'message_class'=>'error',
                'message_desc'=>$error_desc
            )
        );
        $inline=true;
    }
    elseif ($Main->GPC['password']=='') {
        $error=$Main->user->lang['enter_password'];
        $error_field='password';
    }
    elseif ($Main->GPC['password2']=='') {
        $error=$Main->user->lang['enter_password2'];
        $error_field='password2';
    }
    elseif ($Main->GPC['password2']!=$Main->GPC['password']) {
        $error=$Main->user->lang['password_different'];
        $error_field='password,password2';
    }

    if ($error=='') {
        $Main->user->UpdateUserPassword($data["user_id"], $Main->GPC['password']);
        $Main->user->DeleteForgotHash($data["user_id"]);
        $html = $Main->template->Render('frontend/components/register-response/recover-response.twig');
        $status=true;
        $inline=true;
    }
    else {
        $text=$error;
        $status=false;
    }


    $array_json=array(
        'status'=>$status,
        'message_inline'=>$inline,
        'text'=>$text,
        'html'=>$html,
        'error_field'=>$error_field
    );
    $Main->template->DisplayJson($array_json);
}

$data=$Main->user->SelectUserHash($Main->GPC['hash_id'],'forgot');

if ($data['id'] && $data['time']>TIMENOW){
    $mes=$Main->user->lang['recover_set_password'];
}
else{
    $error=$Main->user->lang['recover_error'];
    $error_desc=$Main->lang->SetVars(
        $Main->user->lang['recover_error_desc'],
        array(
            $Main->settings_values['links']['forgot']
        )
    );
}

if ($error=='') {
    $message=$mes;
    $message_class='message';
    $message_desc=$mes_desc;
}
else {
    $message=$error;
    $message_class='error';
    $message_desc=$error_desc;
}

$Main->template->SetPageAttributes(
    array(
        'title'=>'Восстановление пароля',
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>array(
            array(
                'title'=>'Восстановление пароля'
            )
        ),
        'title'=>'Восстановление пароля'
    )
);

$filter_s=array();
$filter_s['show_order']=true;
$filter_s['key']='banners';
$banners=$SettingsClass->GetGroupValues($filter_s);


$Main->template->Display(
    array(
        'error'=>$error,
        'message' => $message,
        'message_desc'=>$message_desc,
        'message_class'=>$message_class,
        'banners'=>$banners,
        'page_name'=>$Main->lang->data['users']['recover']
    )
);
