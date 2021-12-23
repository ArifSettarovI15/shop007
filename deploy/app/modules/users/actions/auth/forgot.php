<?php
if ($Main->user_info['user_id']>0) {
	SiteRedirect();
}

if ($Main->GPC['action'] == 'process_forgot') {
    $Main->input->clean_array_gpc('r', array(
        'email' => TYPE_STR
    ));
    $Main->GPC['login']=$Main->GPC['email'];
    $error = '';
    $mes='';
    $error_field="";
    $message_desc="";
    $message_class="";
    $inline=false;
    if ($Main->GPC['email']=='') {
        $error=$Main->lang->data['users']['enter_email'];
        $error_field='email';
    }
    elseif (is_valid_email($Main->GPC['email'])==false) {
        $error=$Main->lang->data['users']['enter_correct_email'];
        $error_field='email';
    }
    elseif ($Main->user->CheckForgotStrike($Main->GPC["login"])) {
        $error = $Main->lang->data['users']['forgot_strike'];
    }
    elseif ($Main->user->CheckUserLoginAndEmail($Main->GPC['login'],$Main->GPC['email'])==false) {
        $Main->user->LogStrike($Main->GPC['login']);
        $error=$Main->lang->data['users']['forgot_pare_error'];
        $error_field='login,email';
    }
    else {

        if ($Main->user->ProcessForgot($Main->GPC['login'])) {
            $message_class='message';
            $mes=$Main->lang->SetVars(
                $Main->user->lang['forgot_send'],
                array(
                    $Main->GPC['email']
                )
            );
        }
        else {
            $error=$Main->lang->data['users']['email_send_error_desc'];
            $message_class='error';
        }
    }

    if ($error=='') {
        $status = true;
        $html= $mes;
    }
    else {
        $status=false;
        if ($inline==true) {
	        $text= $Main->template->Render('global/message.html.twig',
                array(
                    'message'=>$error,
                    'message_class'=>'error'
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
        'html'=>$html,
        'text'=>$text,
        'error_field'=>$error_field
    );
    $Main->template->DisplayJson($array_json);
}

$breadcrumbs=array();
$breadcrumbs[]=array(
	'title'=>'Забыли пароль?'
);

$Main->template->SetPageAttributes(
	array(
		'title'=>'Восстановление пароля',
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>'Восстановление пароля'
	)
);

$filter_s=array();
$filter_s['show_order']=true;
$filter_s['key']='banners';
$banners=$SettingsClass->GetGroupValues($filter_s);

$Main->template->Display(
	array(
		'fields'=>$fields,
		'banners'=>$banners
	)
);
