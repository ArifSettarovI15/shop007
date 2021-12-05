<?php
$Main->user->PagePrivacy('user,admin,manager');
$Main->user->LogOut($Main->user_info['user_id']);

if ($Main->GPC['ajax']) {
    $html= $Main->template->Render('parts/auth.html.twig');
    $array_json = array(
        'status' => true,
        //'reload'=>true
       // 'html'=>$html
    );

    $Main->template->DisplayJson($array_json);
}
else {
    SiteRedirect();
}
