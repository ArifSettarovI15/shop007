<?php
$Main->user->PagePrivacy();
$Main->input->clean_array_gpc('r', array(
    'filters'=>TYPE_ARRAY
));
$news_cat=array();
if ($Main->GPC['news_cat_url']) {
    $news_cat=$ContentClass->GetNewsCatByUrl($Main->GPC['news_cat_url']);

    if ($news_cat) {
    }
    else {
        $Main->error->PageNotFound();
    }

}
$page_name='Статьи';
$meta_title='Статьи';
if ($Main->GPC['content_type']=='news') {
    $page_name='Новости';
    $meta_title='Новости';
}
$last_b=$page_name;



$breadcrumbs=1;




if ($news_cat) {
    $page_name=$news_cat['title'];
    $meta_title=$news_cat['title'].' - '.$meta_title;
}


$keywords='';
$desc='';
if ($news_cat['meta_desc']!='') {
    $desc=$news_cat['meta_desc'];
}
if ($news_cat['meta_keywords']!='') {
    $keywords=$news_cat['meta_keywords'];
}

if ($Main->GPC['page']) {
    $keywords.=', cтраница '.$Main->GPC['page'];
    $desc.=', cтраница '.$Main->GPC['page'];
}

$Main->input->clean_array_gpc('r', array(
    'order' => TYPE_STR
));
if ($Main->GPC['content_type']=='news' or $Main->GPC['content_type']=='articles') {
    $cats = $ContentClass->GetNewsCats($Main->GPC['content_type']);
}

$filter_options=array();
$filter_options['order']='date';
$filter_options['content_type']=$Main->GPC['content_type'];
$filter_options['not_type']='pages';
$filter_options['show_order']=true;
$filter_options['content_cat']=$news_cat['id'];
$filter_options['skip_date']=true;
$variables=$filter_options;

$variables['content_type']=$Main->GPC['content_type'];
$variables['cats']=$cats;
$variables['news_cat']=$news_cat;
$variables['type']='numbers';


$Paging =new ClassPaging($Main,8,true);

$Paging->template = 'frontend/components/paging/paging.twig';
$Paging->template2 = 'frontend/components/paging/paging.twig';
$Paging->template3 = 'frontend/components/paging/paging.twig';

$Paging->data=$ContentClass->GetContentList($filter_options,$Paging->per_page,$Paging->sql_start);
$Paging->total=$ContentClass->GetContentListTotal($filter_options);

$filter_options=array();
$filter_options['order']='date';
$filter_options['content_type']=$Main->GPC['content_type'];
$filter_options['show_order']=true;
$filter_options['content_cat']=$news_cat['id'];
$filter_options['skip_date']=true;



$Main->template->SetPageAttributes(
    array(
        'title'=>$meta_title,
        'dekorator'=>'blog buro',
        'keywords'=>$keywords,
        'desc'=>$desc
    ),
    array(
        'breadcrumbs'=>$breadcrumbs,
        'title'=>$page_name,
        'total'=>$Paging->total,
        'total_before'=>'Всего'

    )
);
$badges = array();
$badges['news']='Новость';
$badges['useful']='Полезное';

$variables['badges']=$badges;
$variables['status']=true;
$variables['header_image']='blog';
$Paging->Display('frontend/components/news-item/list.twig',$variables);
