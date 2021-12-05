<?php
$Main->user->PagePrivacy('admin');

if ($Main->GPC['action']=='update') {
    $Main->input->clean_array_gpc('r', array(
        'id'=>TYPE_UINT,
        'postav_up'=>TYPE_UINT,
        'postav_name'=>TYPE_STR,
        'postav_feed'=>TYPE_STR
    ));

    $status=$ShopClass->postav->UpdatePostav(
    	$Main->GPC['id'],
	    $Main->GPC['postav_up'],
	    $Main->GPC['postav_name'],
	    $Main->GPC['postav_feed']
    );

    $array=array();
    $array['status']=$status;
    if ($status) {
        $array['text']='Поставщик обновлен';
    }
    else {
        $array['text']='Ошибка';
    }
    $Main->template->DisplayJson($array);
}

$page_name='Поставщики';
$Main->template->SetPageAttributes(
    array(
        'title'=>$page_name,
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>array(
            array(
                'title'=>'Магазин',
                'link'=>BASE_URL.'/manager/shop/'
            ),
            array(
                'title'=>$page_name
            )
        ),
        'title'=>$page_name
    )
);

$list=$ShopClass->postav->GetPostavList();

$Main->template->Display(
    array(
        'list'=>$list
    )
);
