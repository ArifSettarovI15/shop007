<?php
$Main->user->PagePrivacy('admin');
$error='';
$data_info=array();
$edit=0;
if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
    $Main->input->clean_array_gpc('r', array(
        'id' => TYPE_UINT
    ));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {
    $edit=1;
    $data_info=$ShopClass->postav->GetPostav($Main->GPC['id']);
    if ($data_info) {

    }
    else {
        $Main->error->ObjectNotFound();
    }
}

if ($Main->GPC['action']=='process_add'  OR  $Main->GPC['action']=='process_edit') {
    $Main->input->clean_array_gpc('r', array(
        'postav_id' => TYPE_UINT,
        'postav_name' => TYPE_STR,
        'vendor' => TYPE_STR,
        'article' => TYPE_STR,
        'o_article'=> TYPE_STR,
        'o_article_sep' => TYPE_STR,
        'price'=>TYPE_STR,
        'amount'=>TYPE_STR,
        'desc'=>TYPE_STR,
        'desc2'=>TYPE_STR
    ));

    if ($Main->GPC['postav_name']=='') {
        $error='Введите поставщика';
        $array['error_field']='postav_name';
    }
    elseif ($Main->GPC['vendor']=='') {
        $error='Введите производителя';
        $array['error_field']='vendor';
    }
    elseif ($Main->GPC['article']=='') {
        $error='Введите артикул';
        $array['error_field']='article';
    }
    elseif ($Main->GPC['price']=='') {
        $error='Введите цену';
        $array['error_field']='price';
    }
    elseif ($Main->GPC['amount']=='') {
        $error='Введите кол-во';
        $array['error_field']='amount';
    }
    else{
        $postav_data=array(
            'vendor'=>$Main->GPC['vendor'],
            'article'=>$Main->GPC['article'],
            'o_article'=>$Main->GPC['o_article'],
            'o_article_sep'=>$Main->GPC['o_article_sep'],
            'price'=>$Main->GPC['price'],
            'amount'=>$Main->GPC['amount'],
            'desc'=>$Main->GPC['desc'],
            'desc2'=>$Main->GPC['desc2']
        );
        $postav_data=serialize($postav_data);
        if ($Main->GPC['action'] == 'process_edit') {
            if ($ShopClass->UpdatePostavInfo($Main->GPC['postav_id'],$postav_data)) {
                $array['status'] = true;
                $array['text'] = 'Значение успешно обновлено';
            } else {
                $array['text'] = 'Ошибка обновления';
            }

        } else {
            $ShopClass->AddPostav($Main->GPC['postav_name'], 1,$postav_data);

            $array['text'] = 'Значение успешно добавлено';
            $array['status'] = true;
        }
    }


    if ($error!='') {
        $array['status']=false;
        $array['text']=$error;
    }
    else {
        $array['status']=true;
    }
    $Main->template->DisplayJson($array);
}

if ($edit==1) {
    $a_name='Редактировать';
}
else {
    $a_name='Добавить';
}

$page_name=$a_name.' поставщика';
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
                'title'=>'Поставщики',
                'link'=>BASE_URL.'/manager/shop/suppliers/'
            ),
            array(
                'title'=>$a_name
            ),
        ),
        'title'=>$page_name
    )
);

$Main->template->Display(array(
        'info'=>$data_info,
        'edit'=>$edit
    )
);
