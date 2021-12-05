<?php
$Main->user->PagePrivacy('admin');
if ($Main->GPC['action']=='update_status') {
    $Main->input->clean_array_gpc('r', array(
        'object_id'=>TYPE_UINT,
        'value'=>TYPE_BOOL
    ));
    $status=$Main->comments->UpdateCommentStatus($Main->GPC['object_id'],$Main->GPC['value']);
    $array=array();
    $array['status']=$status;
    if ($status) {
        $array['text']='Статус отзыва обновлен';
    }
    else {
        $array['text']='Ошибка';
    }
    $Main->template->DisplayJson($array);
}


$Main->input->clean_array_gpc('r', array(
    'comment_id'=>TYPE_UINT,
    'comment_status'=>TYPE_NUM,
    'date_from'=>TYPE_STR,
    'date_to'=>TYPE_STR,
    'comment_author'=>TYPE_STR,
    'comment_text'=>TYPE_STR
));
$filter_options=array();
$filter_options['comment_id']=$Main->GPC['comment_id'];
$filter_options['comment_status']=$Main->GPC['comment_status'];
$filter_options['date_from']=$Main->GPC['date_from'];
$filter_options['date_to']=$Main->GPC['date_to'];
$filter_options['comment_author']=$Main->GPC['comment_author'];
$filter_options['comment_text']=$Main->GPC['comment_text'];
if ($Main->GPC_exists['comment_status']){
    $filter_options['comment_status']=$Main->GPC['comment_status'];
}
else {
    $filter_options['comment_status']=-1;
}
$filter_options['show_order']=true;

$variables=$filter_options;


$page_name='Отзывы';
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

$Paging =new ClassPaging($Main,20,false,false);
$Paging->show_per_page=true;
$Paging->total=$ShopClass->GetCommentsTotal($filter_options);
$Paging->data=$ShopClass->GetComments($filter_options,$Paging->per_page,$Paging->sql_start);
$Paging->Display('shop/manage/comments_table.html.twig',$variables);