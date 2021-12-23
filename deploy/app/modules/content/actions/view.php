<?php

/**
 * @var $Main
 * @var $ContentClass
 * @var $SettingsClass
 * @var $BBParser
 */
$Main->user->PagePrivacy();

$content = $ContentClass->GetContentByUrl($Main->GPC['content_url'], 1, 1);


if ($content == false or $content['content_status'] == 0) {
    $Main->error->PageNotFound();
}

$ContentClass->UpdateContentViews($content['content_id']);

if ($Main->GPC['content_type'] != 'blog') {
    if ($content['content_type'] != 'pages' and $content['content_type'] != $Main->GPC['content_type']) {
        $Main->error->PageNotFound();
    }
}

$meta_title_last_part = '';
if ($content['content_type'] == 'news') {
    $news_cat = $ContentClass->GetNewsCat($content['content_cat']);
    $meta_title_last_part = ' - ' . $news_cat['title'] . ' - Новости';
}

$meta_title = $content['content_title'] . $meta_title_last_part;
if ($content['head_title'] != '') {
    $meta_title = $content['head_title'] . $meta_title_last_part;
}
$meta_desc = '';
if ($content['content_short']) {
    $meta_desc = CutHeadText($content['content_short']);
} elseif ($content['head_desc']) {
    $meta_desc = CutHeadText($content['head_desc']);
}
if ($content['head_desc'] != '') {
    $meta_desc = $content['head_desc'];
}

$breadcrumbs = [];
$cats = [];

$slides = [];


if ($content['content_type'] == 'news') {
    $breadcrumbs[] = [
        'title' => 'Новости',
        'link'  => BASE_URL . '/news/',
    ];
}
elseif($content['content_type'] != 'pages'){
    $breadcrumbs[] = [
        'title' => 'Статьи',
        'link'  => BASE_URL . '/articles/',
    ];
}
$index = 60;
$tt= $content['content_title'];
$Main->template->SetPageAttributes(
    [
        'title'     => $meta_title,
        'dekorator' => 'article',
        'keywords'  => $content['head_keywords'],
        'desc'      => $meta_desc,
    ],
    [
        'breadcrumbs'  => $breadcrumbs,
        'title'        => $tt,
        'content_type' => $content['content_type'],
        'date'         => $content['content_time'],
        'views'        => $content['content_views'],
        'active'=> $content['content_url']
    ]
);

$content['content_text'] = $BBParser->replaceTags($content['content_text']);
//print_r($content['content_text']);exit;
$filter_options = [];
$filter_options['order'] = 'date';
$filter_options['not_type'] = 'pages';
$filter_options['notId'] = $content['content_id'];
$filter_options['show_order'] = true;
$filter_options['content_cat'] = $news_cat['id'];
$filter_options['skip_date'] = true;
$news = $ContentClass->GetContentList($filter_options);

$filter_options = [];
$filter_options['order'] = 'date';
$filter_options['content_type'] = $content['content_type'];
$filter_options['notId'] = $content['content_id'];
$filter_options['show_order'] = true;
$filter_options['content_cat'] = $news_cat['id'];
$filter_options['skip_date'] = true;
$see_also = $ContentClass->GetContentList($filter_options, 4);

$fields = [];

$filter_s = [];
$filter_s['show_order'] = true;
$filter_s['key'] = $content['content_url'];
$fields = $SettingsClass->GetGroupValues($filter_s);

$badges = [];
$badges['news'] = 'Новость';
$badges['useful'] = 'Полезное';


if ($content['content_template']) {
    $Main->template->DisplayCore(
        'content/custom_pages/' . $content['content_template'],
        [
            'info'         => $content,
            'badges'       => $badges,
            'header_image' => 'blog',
            'media'        => $Main->files->GetFileIdsItems('news_media2', $content['content_id']),
            'blog_items'   => $news,
            'fields'       => $fields,
            'news'         => $ContentClass->getLastNews(),
        ]
    );
} else {
    $Main->template->Display(
        [
            'header_image' => 'blog',
            'info'         => $content,

            'content_url'  => $Main->GPC['content_url'],
            'badges'       => $badges,
            'see_also'     => $see_also,
            'media'        => $Main->files->GetFileIdsItems('news_media2', $content['content_id']),
            'articles'   => $news,
            'fields'       => $fields,
            'news'         => $ContentClass->getLastNews(),
        ]
    );
}
