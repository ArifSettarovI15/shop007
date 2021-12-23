<?php
$Main->user->PagePrivacy('guest,user,admin');
if ($Main->user_info['user_active']==1){
    SiteRedirect();
}

$page_name='Активация аккаунта';

$breadcrumbs[]=array(
	'title'=>$page_name
);
$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>$page_name
	)
);
$Main->template->Display();
exit;
if ($Main->GPC['hash_id']) {
    $data = $Main->user->SelectUserHash($Main->GPC['hash_id'], 'confirm');
    $Main->user->DeleteUserHash($Main->GPC['hash_id']);

    if ($data['id'] && $data['time'] > TIMENOW) {
        $Main->user->ActivateAccount($data['user_id']);
        $mes = $Main->user->lang['confirm_ok'];
        $message_class = 'message';
    } else {
        $mes = $Main->user->lang['confirm_error'];
        $message_class = 'error';
    }

    $Main->template->Display(
        array(
            'message' => $mes,
            'message_class' => $message_class,
            'page_name' => $Main->lang->data['users']['confirm'],
            'show_login_form'=>1
        )
    );
}
elseif ( $Main->user_info['user_id'] && $Main->user_info['user_active']==0) {
    $inline=true;
    $confirm_status=$Main->user->CheckUserConfirm($Main->user_info['user_id']);
    if ($confirm_status=='none' OR $confirm_status=='expired') {
        $Main->user->ProcessConfirmAccount($Main->user_info['user_id']);
        $error = $Main->lang->SetVars($Main->lang->data['users']['confirm_resend'],array($Main->user_info['user_email']));
    }
    else {
        $error = $Main->lang->SetVars($Main->lang->data['users']['confirm_wait'],array($Main->user_info['user_email']));
    }
    $error_desc= $Main->lang->SetVars(
        $Main->lang->data['users']['confirm_change_email'],
        array($Main->settings_values['links']['new_email']));

    $Main->template->Display(
        array(
            'message' => $error,
            'message_desc'=>$error_desc,
            'message_class' => 'error',
            'page_name' => $Main->lang->data['users']['confirm']
        )
    );
}
else {
    $Main->error->PageNotFound();
}
