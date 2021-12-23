<?php
$Main->user->PagePrivacy('user,admin,manager');

$Main->template->SetPageAttributes(
	array(
		'title'=>$Main->lang->data['users']['change_email'],
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>$Main->lang->data['users']['change_email']
			)
		),
		'title'=>$Main->lang->data['users']['change_email']
	)
);

if ($Main->GPC['hash_id']) {
    $data = $Main->user->SelectUserHash($Main->GPC['hash_id'], 'change_email');
    $Main->user->DeleteUserHash($Main->GPC['hash_id']);

    if ($data['id'] && $data['time'] > TIMENOW) {
        $Main->user->UpdateUserEmail($Main->user_info['user_id'],$data['data']);
        $Main->user_info=$Main->user->GetUserById($Main->user_info["user_id"]);
        $mes = $Main->user->lang['change_email_ok'];
        $message_class = 'message';
    } else {
        $mes = $Main->user->lang['change_email_error'];
        $message_class = 'error';
    }

    $Main->template->Display(
        array(
            'message' => $mes,
            'message_class' => $message_class,
            'page_name' => $Main->lang->data['users']['confirm']
        )
    );
}
$Main->error->AccessDenied();
